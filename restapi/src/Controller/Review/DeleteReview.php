<?php declare(strict_types=1);

namespace App\Controller\Review;

use Slim\Http\Request;
use Slim\Http\Response;

class DeleteReview extends BaseReview
{
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $this->setParams($request, $response, $args);
        $input = $this->getInput();
        $reviewId = (int) $this->args['id'];
        $userId = (int) $input['decoded']->sub;
        $review = $this->getReviewService()->deleteReview($reviewId, $userId);

        return $this->jsonResponse('success', $review, 204);
    }
}
