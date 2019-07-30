<?php declare(strict_types=1);

namespace App\Repository;

use App\Exception\UserException;
use PDO;

class UserRepository extends BaseRepository
{
    public function __construct(PDO $database)
    {
        $this->database = $database;
    }

    public function checkAndGetUser(int $user_id)
    {
        $query = 'SELECT `id`, `nic`, `nickname` FROM `user` WHERE `id` = :id';
        $statement = $this->database->prepare($query);
        $statement->bindParam('id', $user_id);
        $statement->execute();
        $user = $statement->fetchObject();
        if (empty($user)) {
            throw new UserException('User not found.', 404);
        }

        return $user;
    }

    public function checkUserByNic(string $nic)
    {
        $query = 'SELECT * FROM `user` WHERE `nic` = :nic';
        $statement = $this->database->prepare($query);
        $statement->bindParam('nic', $nic);
        $statement->execute();
        $user = $statement->fetchObject();
        if (empty(!$user)) {
            throw new UserException('Nic already exists.', 400);
        }
    }

    public function getUsers(): array
    {
        $query = 'SELECT `id`, `nic`, `email` FROM `user` ORDER BY `id`';
        $statement = $this->database->prepare($query);
        $statement->execute();

        return $statement->fetchAll();
    }

# TODO: get nickname in lowecase
    public function searchUsers(string $nickname): array
    {
        $query = 'SELECT `id`, `nic`, `nickname` FROM `user` WHERE LOWER(nickname) LIKE :name ORDER BY `id`';
        $name = '%' . $nickname . '%';
        $statement = $this->database->prepare($query);
        $statement->bindParam('name', $name);
        $statement->execute();
        $users = $statement->fetchAll();
        if (!$users) {
            throw new UserException('User nickname not found.', 404);
        }

        return $users;
    }
# TODO: SMS Auth needed
    public function loginUser(string $nic)
    {
        $query = 'SELECT * FROM `user` WHERE `nic` = :nic ORDER BY `id`';
        $statement = $this->database->prepare($query);
        $statement->bindParam('nic', $nic);
//        $statement->bindParam('password', $password);
        $statement->execute();
        $user = $statement->fetchObject();
        if (empty($user)) {
            throw new UserException('Login failed: Email or password incorrect.', 400);
        }

        return $user;
    }

    public function createUser($user)
    {
        $query = 'INSERT INTO `user` (`nic`, `nickname`, `email`, `phoneNo`, `image`) VALUES (:nic, :nickname, :email, :phoneNo, :image)';
        $statement = $this->database->prepare($query);
        $statement->bindParam('nic', $user->nic);
        $statement->bindParam('nickname', $user->nickname);
        $statement->bindParam('email', $user->email);
        $statement->bindParam('phoneNo', $user->phoneNo);
        $statement->bindParam('image', $user->image);
        $statement->execute();

        return $this->checkAndGetUser((int) $this->database->lastInsertId());
    }

    public function updateUser($user)
    {
        $query = 'UPDATE `user` SET `nickname` = :name, `email` = :email, `image` = :image WHERE `id` = :id';
        $statement = $this->database->prepare($query);
        $statement->bindParam('name', $user->nickname);
        $statement->bindParam('email', $user->email);
        $statement->bindParam('image', $user->image);
        $statement->execute();

        return $this->checkAndGetUser((int) $user->id);
    }

    public function deleteUser(int $user_id): string
    {
        $query = 'DELETE FROM `user` WHERE `id` = :id';
        $statement = $this->database->prepare($query);
        $statement->bindParam('id', $user_id);
        $statement->execute();

        return 'The user was deleted.';
    }

//    public function deleteUserTasks(int $userId)
//    {
//        $query = 'DELETE FROM `tasks` WHERE `userId` = :userId';
//        $statement = $this->database->prepare($query);
//        $statement->bindParam('userId', $userId);
//        $statement->execute();
//    }
}
