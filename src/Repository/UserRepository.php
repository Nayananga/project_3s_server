<?php declare(strict_types=1);

namespace App\Repository;

use PDO;

class UserRepository extends BaseRepository
{
    public function __construct(PDO $database)
    {
        $this->database = $database;
    }

    public function getAllUsers(): array
    {
        $query = 'SELECT `google_id`, `nic`, `email` FROM `user` ORDER BY `google_id`';
        $statement = $this->database->prepare($query);
        $statement->execute();

        return $statement->fetchAll();
    }

    public function createUser($user)
    {
        $query = 'INSERT INTO user (google_id, email, nickname, image) VALUES (:google_id, :email, :nickname, :image)';
        $statement = $this->database->prepare($query);
        $statement->bindParam('google_id', $user['sub']);
        $statement->bindParam('email', $user['email']);
        $statement->bindParam('nickname', $user['nickname']);
        $statement->bindParam('image', $user['image']);
        $statement->execute();

        return $this->checkUserByGoogleId($user['sub']);
    }

    public function checkUserByGoogleId(string $google_id)
    {
        $query = 'SELECT `google_id`, `email`, `nickname`, `phoneNo`, `nic` FROM `user` WHERE `google_id` = :google_id';
        $statement = $this->database->prepare($query);
        $statement->bindParam('google_id', $google_id);
        $statement->execute();
        $user = $statement->fetchObject();

        return $user;
    }

    public function updateUser($user)
    {
        $query = 'UPDATE `user` SET `phoneNo` = :phoneNo, `nic` = :nic WHERE `google_id` = :google_id';
        $statement = $this->database->prepare($query);
        $statement->bindParam('phoneNo', $user->phoneNo);
        $statement->bindParam('nic', $user->nic);
        $statement->bindParam('google_id', $user->google_id);
        $statement->execute();

        return $this->checkUserByGoogleId($user->google_id);
    }
}
