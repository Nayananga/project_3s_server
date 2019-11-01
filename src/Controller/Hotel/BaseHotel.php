<?php declare(strict_types=1);

namespace App\Controller\Hotel;

use App\Controller\BaseController;
use App\Service\HotelService;
use Slim\Container;

abstract class BaseHotel extends BaseController
{
    /**
     * @var HotelService
     */
    private $hotelService;

    public function __construct(Container $container)
    {
        $this->hotelService = $container->get('hotel_service');
    }

    protected function getHotelService(): HotelService
    {
        return $this->hotelService;
    }
}
