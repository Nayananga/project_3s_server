<?php declare(strict_types=1);

namespace App\Controller\Hotel;

use Slim\Http\Request;
use Slim\Http\Response;

class SearchHotels extends BaseHotel
{
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $this->setParams($request, $response, $args);
        $hotels = $this->getHotelService()->searchHotels($this->args['query']);
        return $this->jsonResponse('success', $hotels, 200);
    }
}
