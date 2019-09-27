<?php declare(strict_types=1);

namespace App\Service;

use App\Exception\ReviewException;
use App\Repository\ReviewRepository;
use App\Repository\UserRepository;
use stdClass;

class ReviewService extends BaseService
{
    /**
     * @var ReviewRepository
     */
    protected $reviewRepository;
    protected $userRepository;

    public function __construct(ReviewRepository $reviewRepository, UserRepository $userRepository)
    {
        $this->reviewRepository = $reviewRepository;
        $this->userRepository = $userRepository;
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
        $userData = $input["decoded"];
        $checkUser = $this->validateCurrentUser($userData['sub']);
        if (empty($checkUser)) {
            throw new ReviewException('Invalid User.', 400);
        } else {
            $review = new stdClass();
            $reviewData = $input["question_and_answers"];
            $review->user_id = $userData['sub'];
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
                    $review->geo_tag = "test_geo_Tag";
                    if (empty($review->geo_tag)) {
                        throw new ReviewException('The field "geo_tag" is required.', 400);
                    } else {
                        return $this->getReviewRepository()->createReview($review);
                    }
                }
            }
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
        return $this->userRepository->checkUserByGoogleId($sub);
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
