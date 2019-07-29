<?php declare(strict_types=1);

namespace Tests\integration;

use App\Exception\UserException;
use App\Repository\UserRepository;
use App\Service\UserService;
use PDO;

class UserServiceTest extends BaseTestCase
{
    private static $id;

    private function getDatabase()
    {
        $database = sprintf('mysql:host=%s;dbname=%s', getenv('DB_HOSTNAME'), getenv('DB_DATABASE'));

        return new PDO($database, $this->getName(getenv('DB_USERNAME')), $this->getName(getenv('DB_PASSWORD')));
    }

    public function testGetUser()
    {
        $userRepository = new UserRepository($this->getDatabase());
        $userService = new UserService($userRepository);
        $user = $userService->getUser(1);
        $this->assertStringContainsString('Juan', $user->name);
    }

    public function testCreateUser()
    {
        $userRepository = new UserRepository($this->getDatabase());
        $userService = new UserService($userRepository);
        $input = ['name' => 'Eze', 'email' => 'eze@gmail.com', 'password' => 'AnyPass1000'];
        $user = $userService->createUser($input);
        self::$id = $user->id;
        $this->assertStringContainsString('Eze', $user->name);
    }

    public function testCreateUserWithoutNameExpectError()
    {
        $this->expectException(UserException::class);

        $userRepository = new UserRepository($this->getDatabase());
        $userService = new UserService($userRepository);
        $input = ['email' => 'eze@gmail.com', 'password' => 'AnyPass1000'];
        $user = $userService->createUser($input);
        self::$id = $user->id;
        $this->assertStringContainsString('Eze', $user->name);
    }

    public function testDeleteUser()
    {
        $userRepository = new UserRepository($this->getDatabase());
        $userService = new UserService($userRepository);
        $userId = self::$id;
        $user = $userService->deleteUser((int) $userId);
        $this->assertStringContainsString('The user was deleted.', $user);
    }
}
