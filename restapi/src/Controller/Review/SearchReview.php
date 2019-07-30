<?php declare(strict_types=1);

namespace App\Controller\Review;

use Slim\Http\Request;
use Slim\Http\Response;

class SearchReview extends BaseReview
{
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $this->setParams($request, $response, $args);
        $input = $this->getInput();
        $userId = (int) $input['decoded']->sub;
        $query = '';
        if (isset($this->args['query'])) {
            $query = $this->args['query'];
        }
        $status = $request->getParam('status', null);
        $reviews = $this->getReviewService()->searchReviews($query, $userId, $status);

        return $this->jsonResponse('success', $reviews, 200);
    }
}
