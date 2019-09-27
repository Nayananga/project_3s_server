<?php declare(strict_types=1);

namespace Tests\integration;

use App\Exception\UserException;
use App\Repository\UserRepository;
use App\Service\UserService;
use PDO;

class UserServiceTest extends BaseTestCase
{
    private static $id;

    public function testGetUser()
    {
        $userRepository = new UserRepository($this->getDatabase());
        $userService = new UserService($userRepository);
        $user = $userService->getUser(1);
        $this->assertStringContainsString('Slahiru', $user->nickname);
    }

    private function getDatabase()
    {
        $database = sprintf('mysql:host=%s;dbname=%s', getenv('DB_HOSTNAME'), getenv('DB_DATABASE'));

        return new PDO($database, getenv('DB_USERNAME'), getenv('DB_PASSWORD'));
    }

    public function testCreateUser()
    {
        $userRepository = new UserRepository($this->getDatabase());
        $userService = new UserService($userRepository);
        $input = ['nic' => '948052167v', 'nickname' => 'Dilshan', 'email' => 'dilshan@email.com', 'phoneNo' => '0702016666', 'image' => ''];
        $user = $userService->createUser($input);
        self::$id = $user->id;
        $this->assertStringContainsString('Dilshan', $user->nickname);
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
        $user = $userService->deleteUser((int)$userId);
        $this->assertStringContainsString('The user was deleted.', $user);
    }
}
