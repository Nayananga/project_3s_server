<?php declare(strict_types=1);

namespace App\Controller\Review;

use Slim\Http\Request;
use Slim\Http\Response;

class UpdateReview extends BaseReview
{
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $this->setParams($request, $response, $args);
        $input = $this->getInput();
        $review = $this->getReviewService()->updateReview($input, (int) $this->args['id']);

        return $this->jsonResponse('success', $review, 200);
    }
}
