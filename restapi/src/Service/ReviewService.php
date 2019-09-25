<?php declare(strict_types=1);

namespace App\Service;

use App\Exception\ReviewException;
use App\Repository\ReviewRepository;
use App\Service\UserService;
use stdClass;

class ReviewService extends BaseService
{
    /**
     * @var ReviewRepository
     */
    protected $reviewRepository;
    protected $userService;

    public function __construct(ReviewRepository $reviewRepository, UserService $userService)
    {
        $this->reviewRepository = $reviewRepository;
        $this->userService = $userService;
    }

    public function getAllReviews(): array
    {
        return $this->getReviewRepository()->getAllReviews();
    }

    protected function getReviewRepository(): ReviewRepository
    {
        return $this->reviewRepository;
    }

    public function getReviews(int $user_id): array
    {
        return $this->getReviewRepository()->getReviews($user_id);
    }

    public function getReview(int $review_id, int $userId)
    {
        return $this->checkAndGetReview($review_id, $userId);
    }

    protected function checkAndGetReview(int $review_id, int $user_id)
    {
        return $this->getReviewRepository()->checkAndGetReview($review_id, $user_id);
    }

    public function createReview(array $input)
    {
        var_dump($input);
        $data = $input["decoded"];
        $checkUser = $this->validateCurrentUser($data['sub']);
        if (empty($checkUser)) {
            throw new ReviewException('Invalid User.', 400);
        } else {
            $review = new stdClass();
            $data = json_decode(json_encode($input), false);
//        if (empty($data->q_a)) {
//            throw new ReviewException('The field "q_a" is required.', 400);
//        }
            $review->q_a = self::validateReviewAnswers($data->q_a);
//        $review->description = null;
//        if (isset($data->description)) {
//            $review->description = $data->description;
//        }
//        if (isset($data->geo_tag)) {
//            $review->geo_tag = self::validateReviewGeoTag($data->geo_tag);
//        }
            $review->user_id = $data['sub'];

            return $this->getReviewRepository()->createReview($review);

        }
    }

//    public function searchTasks($tasksName, int $userId, $status): array
//    {
//        if ($status !== null) {
//            $status = (int) $status;
//        }
//
//        return $this->getReviewRepository()->searchReviews($tasksName, $userId, $status);
//    }

    protected function validateCurrentUser(String $sub)
    {
        return $this->userService->getUserByGoogleId($sub);
    }

    public function updateReview(array $input, int $review_id)
    {
        $review = $this->checkAndGetReview($review_id, (int)$input['decoded']->sub);
        $data = json_decode(json_encode($input), false);
        if (!isset($data->q_a) && !isset($data->q_a)) {
            throw new ReviewException('Enter the data to update the task.', 400);
        }
        if (isset($data->q_a)) {
            $review->q_a = self::validateReviewAnswers($data->q_a);
        }
        $review->user_id = $data->decoded->sub;

        return $this->getReviewRepository()->updateReview($review);
    }

    public function deleteReview(int $taskId, int $userId): string
    {
        $this->checkAndGetReview($taskId, $userId);

        return $this->getReviewRepository()->deleteReview($taskId, $userId);
    }
}
