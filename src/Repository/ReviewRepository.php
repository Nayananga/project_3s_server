<?php declare (strict_types=1);

namespace App\Repository;

use App\Exception\ReviewException;
use PDO;

class ReviewRepository extends BaseRepository
{
    public function __construct(PDO $database)
    {
        $this->database = $database;
    }

    public function checkUserByGoogleId(string $google_id)
    {
        $query = 'SELECT `google_id`, `email`, `nickname` FROM `user` WHERE `google_id` = :google_id';
        $statement = $this->database->prepare($query);
        $statement->bindParam('google_id', $google_id);
        $statement->execute();
        $user = $statement->fetchObject();
        return $user;

    }

    public function getReviews(String $user_id): array
    {
        $query = 'SELECT * FROM reviews WHERE user_id = :user_id ORDER BY id';
        $statement = $this->getDb()->prepare($query);
        $statement->bindParam('user_id', $user_id);
        $statement->execute();

        return $statement->fetchAll();
    }

    public function getAllReviews(): array
    {
        $query = 'SELECT * FROM reviews ORDER BY id';
        $statement = $this->getDb()->prepare($query);
        $statement->execute();

        return $statement->fetchAll();
    }

    public function createReview($review)
    {
        $query = '
            INSERT INTO reviews (user_id, qa, geo_tag, device_signature)
            VALUES (:user_id, :qa, :geo_tag, :device_signature)
        ';
        $statement = $this->getDb()->prepare($query);
        $statement->bindParam('user_id', $review->user_id);
        $statement->bindParam('qa', $review->qa);
        $statement->bindParam('geo_tag', $review->geo_tag);
        $statement->bindParam('device_signature', $review->device_signature);
        $statement->execute();
        $id = $this->getDb()->lastInsertId();

        return $this->checkAndGetReview($id);

    }

    public function checkAndGetReview(String $review_id)
    {
        $query = 'SELECT `id`, `user_id` FROM reviews WHERE `id` = :id';
        $statement = $this->getDb()->prepare($query);
        $statement->bindParam('id', $review_id);
        $statement->execute();
        $review = $statement->fetchObject();

        if (empty($review)) {
            throw new ReviewException('Review not found.', 404);
        }

        return $review;
    }

    # TODO: Discuss about update reviews

    public function updateReview($review)
    {
        $query = '
            UPDATE reviews
            SET `qa`=:qa
            WHERE id=:id AND user_id = :user_id
        ';
        $statement = $this->getDb()->prepare($query);
        $statement->bindParam('id', $review->id);
        $statement->bindParam('qa', $review->qa);
        $statement->bindParam('user_id', $review->user_id);
        $statement->execute();

        return $this->checkAndGetReview($review->id);
    }

    public function deleteReview(String $review_id, String $user_id): string
    {
        $query = 'DELETE FROM reviews WHERE id = :id AND user_id = :user_id';
        $statement = $this->getDb()->prepare($query);
        $statement->bindParam('id', $review_id);
        $statement->bindParam('user_id', $user_id);
        $statement->execute();

        return 'The task was deleted.';
    }

    # TODO: Discuss about searching reviews, best option is to search  by date

//    public function searchReviews($tasksName, int $userId, $status): array
    //    {
    //        $query = $this->getSearchTasksQuery($status);
    //        $name = '%' . $tasksName . '%';
    //        $statement = $this->getDb()->prepare($query);
    //        $statement->bindParam('name', $name);
    //        $statement->bindParam('userId', $userId);
    //        if ($status === 0 || $status === 1) {
    //            $statement->bindParam('status', $status);
    //        }
    //        $statement->execute();
    //
    //        return $statement->fetchAll();
    //    }
    //
    //    private function getSearchTasksQuery($status)
    //    {
    //        $statusQuery = '';
    //        if ($status === 0 || $status === 1) {
    //            $statusQuery = 'AND status = :status';
    //        }
    //        $query = "
    //            SELECT * FROM tasks
    //            WHERE name LIKE :name AND userId = :userId $statusQuery
    //            ORDER BY id
    //        ";
    //
    //        return $query;
    //    }
}
