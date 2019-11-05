<?php declare(strict_types=1);

namespace App\Repository;

use App\Exception\HotelException;
use PDO;

class HotelRepository extends BaseRepository
{
    public function __construct(PDO $database)
    {
        $this->database = $database;
    }

    public function getAllHotels(): array
    {
        $query = 'SELECT * FROM `hotels` ORDER BY `id`';
        $statement = $this->database->prepare($query);
        $statement->execute();

        return $statement->fetchAll();
    }

    public function searchHotels(string $strHotels): array
    {
        $query = 'SELECT `id`, `hotel_name`, `address` FROM `hotels` WHERE `hotel_name` LIKE :hotel_name ORDER BY `id`';
        $hotel_name = '%' . $strHotels . '%';
        $statement = $this->database->prepare($query);
        $statement->bindParam('hotel_name', $hotel_name);
        $statement->execute();
        $hotels = $statement->fetchAll();
        if (!$hotels) {
            throw new HotelException('No hotels with that name were found.', 404);
        }

        return $hotels;
    }
}
