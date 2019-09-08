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

    public function checkAndGetUser(int $id)
    {
        $query = 'SELECT `id`, `email`, `nickname` FROM `user` WHERE `id` = :id';
        $statement = $this->database->prepare($query);
        $statement->bindParam('id', $id);
        $statement->execute();
        $user = $statement->fetchObject();
        if (empty($user)) {
            throw new UserException('User not found.', 404);
        }

        return $user;
    }

    public function checkUserByGoogleId(string $google_id)
    {
        $query = 'SELECT `nickname` FROM `user` WHERE `google_id` = :google_id';
        $statement = $this->database->prepare($query);
        $statement->bindParam('google_id', $google_id);
        $statement->execute();
        $user = $statement->fetchObject();
        if (empty($user)) {
            return false;
        }
        else{
            return true;
        }
    }

    public function getUsers(): array
    {
        $query = 'SELECT `id`, `nic`, `email` FROM `user` ORDER BY `id`';
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

        $new_user =  $this->checkAndGetUser((int) $this->database->lastInsertId());
        if(!empty($new_user)){
            return 2001;
        }
        return 2002;
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
