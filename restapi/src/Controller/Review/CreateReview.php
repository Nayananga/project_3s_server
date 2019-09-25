<?php declare(strict_types=1);

namespace App\Controller\Review;

use Slim\Http\Request;
use Slim\Http\Response;

class CreateReview extends BaseReview
{
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $this->setParams($request, $response, $args);
        $review = $this->getReviewService()->createReview( $this->getInput());

        return $this->jsonResponse('success', $review, 201);
    }
}
