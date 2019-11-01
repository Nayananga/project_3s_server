<?php declare(strict_types=1);

namespace App\Service;

use App\Repository\HotelRepository;

class HotelService
{
    /**
     * @var HotelRepository
     */
    protected $hotelRepository;

    public function __construct(HotelRepository $hotelRepository)
    {
        $this->hotelRepository = $hotelRepository;
    }

    public function getHotels(): array
    {
        return $this->hotelRepository->getHotels();
    }

    public function searchHotels(string $strHotels): array
    {
        return $this->hotelRepository->searchHotels($strHotels);
    }

}
