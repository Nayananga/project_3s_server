<?php declare(strict_types=1);

namespace App\Service;

use App\Exception\UserException;
use App\Repository\UserRepository;
use stdClass;

class UserService
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUser(String $google_id)
    {
        return $this->checkUserByGoogleId($google_id);
    }

    protected function checkUserByGoogleId(String $google_id)
    {
        return $this->userRepository->checkUserByGoogleId($google_id);
    }

    public function getUsers(): array
    {
        return $this->userRepository->getUsers();
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

    public function createUser($data)
    {
        $user = new stdClass();
        $user->google_id = $data['sub'];
        $user->email = $data['email'];
        $user->nickname = $data['name'];
        $user->image = $data['picture'];
        return $this->userRepository->createUser($user);
    }

    public function updateUser(array $input)
    {
        $google_id = $input["decoded"]['sub'];
        $user = $this->checkUserByGoogleId($google_id);
        if (isset($user->google_id)) {
            $user->phoneNo = $input["phoneNo"];
            $user->nic = $input["nic"];
            return $this->userRepository->updateUser($user);
        } else {
            throw new UserException('This user does not exist.', 400);
        }
    }
}
