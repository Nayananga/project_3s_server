<?php declare(strict_types=1);

namespace App\Service;

use App\Exception\UserException;
use App\Repository\UserRepository;
use stdClass;

class UserService extends BaseService
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUsers(): array
    {
        return $this->userRepository->getUsers();
    }

    public function getUserByGoogleId(String $google_id)
    {
        return $this->checkUserByGoogleId($google_id);
    }

    protected function checkUserByGoogleId(String $sub)
    {
        return $this->userRepository->checkUserByGoogleId($sub);
    }

    public function getUser(int $user_id)
    {
        return $this->checkAndGetUser($user_id);
    }

    protected function checkAndGetUser(int $user_id)
    {
        return $this->userRepository->checkAndGetUser($user_id);
    }

    public function createUser($data)
    {
        $user = new stdClass();
        $user->google_id = $data['sub'];
        $user->email = $data['email'];
        $user->nickname = $data['name'];
        $user->image = $data['picture'];
        return $this->userRepository->createUser($user);
    }

    public function updateUser(array $input, int $user_id)
    {
        $user = $this->checkAndGetUser($user_id);
        $data = json_decode(json_encode($input), false);
        if (!isset($data->name) && !isset($data->email)) {
            throw new UserException('Enter the data to update the user.', 400);
        }
        if (isset($data->name)) {
            $user->name = self::validateUserName($data->name);
        }
        if (isset($data->email)) {
            $user->email = self::validateEmail($data->email);
        }

        return $this->userRepository->updateUser($user);
    }

    public function loginUser(array $input)
    {
        $data = $input["decoded"];
        $checkUser = $this->checkUserByGoogleId($data['sub']);
        if (empty($checkUser)) {
            return $this->userRepository->createUser($data);
        } else {
            return $checkUser;
        }
    }
}
