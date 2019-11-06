<?php declare(strict_types=1);

namespace App\Controller\Hotel;

use Slim\Http\Request;
use Slim\Http\Response;

class SearchHotels extends BaseHotel
{
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $this->setParams($request, $response, $args);
        if ($this->useRedis() === true) {
            $hotels = $this->getHotelFromCache($this->args['query']);
        } else {
            $hotels = $this->getHotelService()->searchHotels($this->args['query']);
        }

        return $this->jsonResponse('success', $hotels, 200);
    }

    /**
     * @param String $hotel_query
     * @return mixed
     */
    private function getComplaintFromCache($hotel_query)
    {
        $hotels = $this->getFromCache($hotel_query);
        if ($hotels === null) {
            $hotels = $this->getHotelService()->searchHotels($hotel_query);
            $this->saveInCache($hotel_query, $hotels);
        }

        return $hotels;
    }
}
