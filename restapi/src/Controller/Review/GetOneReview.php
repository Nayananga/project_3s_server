<?php declare(strict_types=1);

namespace App\Controller\Review;

use Slim\Http\Request;
use Slim\Http\Response;

class GetOneReview extends BaseReview {
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $this->setParams($request, $response, $args);
        $input = $this->getInput();
        $review_id = (int) $this->args['id'];
        $user_id = (int) $input['decoded']->sub;
        $review = $this->getReviewService()->getReview($review_id, $user_id);

        return $this->jsonResponse('success', $review, 200);
    }
}
