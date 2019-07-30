<?php declare(strict_types=1);

namespace App\Controller\Review;

use App\Controller\BaseController;
use App\Service\TaskService;
use Slim\Container;

abstract class BaseReview extends BaseController
{
    /**
     * @var TaskService
     */
    private $reviewService;

    public function __construct(Container $container)
    {
        $this->reviewService = $container->get('review_service');
    }

    protected function getReviewService(): ReviewService
    {
        return $this->reviewService;
    }
}
