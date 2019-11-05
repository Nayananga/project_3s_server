<?php declare (strict_types=1);

namespace App\Service;

use App\Exception\ReviewException;
use App\Repository\ReviewRepository;
use stdClass;

class ReviewService
{
    /**
     * @var ReviewRepository
     */
    protected $reviewRepository;

    public function __construct(ReviewRepository $reviewRepository)
    {
        $this->reviewRepository = $reviewRepository;
    }

    public function getReview(String $review_id, String $google_id)
    {
        return $this->checkAndGetReview($review_id, $google_id);
    }

    protected function checkAndGetReview(String $review_id, String $google_id)
    {
        return $this->getReviewRepository()->checkAndGetReview($review_id, $google_id);
    }

    protected function getReviewRepository(): ReviewRepository
    {
        return $this->reviewRepository;
    }

    public function getReviewsByUser(String $google_id): array
    {
        return $this->getReviewRepository()->getReviewsByUser($google_id);
    }

    public function getAllReviews(): array
    {
        return $this->getReviewRepository()->getAllReviews();
    }

    public function createReview(array $input)
    {
        $userData = $input["decoded"];
        $checkUser = $this->validateCurrentUser($userData['sub']);
        if (empty($checkUser)) {
            throw new ReviewException('Invalid User.', 400);
        } else {
            $review = new stdClass();
            $review->user_id = $userData['sub'];
            $reviewData = $input["question_and_answers"];
            for ($i = 0; $i < (count($reviewData) - 1); $i++) {
                $review->qa[$i] = $reviewData[$i];
            }
            if (empty($review->qa)) {
                throw new ReviewException('The field "q_a" is required.', 400);
            } else {
                $review->qa = json_encode($review->qa);
                $review->device_signature = $input['device_signature'];
                if (empty($review->device_signature)) {
                    throw new ReviewException('The field "device_signature" is required.', 400);
                } else {
                    $review->geo_tag = $input["geo_location"];
                    if (empty($review->geo_tag)) {
                        throw new ReviewException('The field "geo_tag" is required.', 400);
                    } else {
                        $review->geo_tag = json_encode($review->geo_tag);
                        return $this->getReviewRepository()->createReview($review);
                    }
                }
            }
        }
    }

    protected function validateCurrentUser(String $google_id)
    {
        return $this->reviewRepository->checkUserByGoogleId($google_id);
    }

    public function updateReview(array $input, String $review_id)
    {
        $review = $this->checkAndGetReview($review_id, (String)$input['decoded']->sub);
        $data = json_decode(json_encode($input), false);
        if (!isset($data->q_a) && !isset($data->q_a)) {
            throw new ReviewException('Enter the data to update the task.', 400);
        }
        if (isset($data->q_a)) {
            $review->q_a = $data->q_a;
        }
        $review->user_id = $data->decoded->sub;

        return $this->getReviewRepository()->updateReview($review);
    }

    public function deleteReview(String $reviewId, String $userId): string
    {
        $this->checkAndGetReview($reviewId, $userId);

        return $this->getReviewRepository()->deleteReview($reviewId, $userId);
    }

    //    public function searchTasks($tasksName, int $userId, $status): array
    //    {
    //        if ($status !== null) {
    //            $status = (int) $status;
    //        }
    //
    //        return $this->getReviewRepository()->searchReviews($tasksName, $userId, $status);
    //    }

}
