<?php declare(strict_types=1);

namespace App\Controller\Review;

use Slim\Http\Request;
use Slim\Http\Response;

class GetAllReviews extends BaseReview
{
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $this->setParams($request, $response, $args);
        $input = $this->getInput();
        $user_id = (int)$input['decoded']->sub;
        $reviews = $this->getReviewService()->getAllReviews();

        return $this->jsonResponse('success', $reviews, 200);
    }
}
