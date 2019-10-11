<?php declare(strict_types=1);

namespace App\Repository;

use PDO;

class UserRepository extends BaseRepository
{
    public function __construct(PDO $database)
    {
        $this->database = $database;
    }

    public function getUsers(): array
    {
        $query = 'SELECT `google_id`, `nic`, `email` FROM `user` ORDER BY `google_id`';
        $statement = $this->database->prepare($query);
        $statement->execute();

        return $statement->fetchAll();
    }

    public function createUser($user)
    {
        $query = 'INSERT INTO `user` (`google_id`, `email`, `nickname`, `image`) VALUES (:google_id, :email, :nickname, :image)';
        $statement = $this->database->prepare($query);
        $statement->bindParam('google_id', $user["sub"]);
        $statement->bindParam('email', $user["email"]);
        $statement->bindParam('nickname', $user["name"]);
        $statement->bindParam('image', $user["picture"]);
        $statement->execute();

        return $this->checkUserByGoogleId($user["sub"]);
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
        $query = 'UPDATE `user` SET `nickname` = :name, `email` = :email, `image` = :image WHERE `google_id` = :id';
        $statement = $this->database->prepare($query);
        $statement->bindParam('name', $user->nickname);
        $statement->bindParam('email', $user->email);
        $statement->bindParam('image', $user->image);
        $statement->execute();

        return $this->checkUserByGoogleId();
    }
}
