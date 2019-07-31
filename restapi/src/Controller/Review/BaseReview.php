<?php declare(strict_types=1);

namespace App\Controller\Review;

use App\Controller\BaseController;
use App\Service\ReviewService;
use Slim\Container;

abstract class BaseReview extends BaseController
{
    /**
     * @var ReviewService
     */
    private $reviewService;

    public function __construct(Container $container)
    {
        $this->reviewService = $container->get('review_service'); # TODO: Im not sure about this
    }

    protected function getReviewService(): ReviewService
    {
        return $this->reviewService;
    }
}
