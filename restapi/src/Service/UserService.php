<?php declare(strict_types=1);

namespace App\Service;

use App\Exception\UserException;
use App\Repository\UserRepository;
use \Firebase\JWT\JWT;
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

    protected function checkAndGetUser(int $user_id)
    {
        return $this->userRepository->checkAndGetUser($user_id);
    }

    public function getUsers(): array
    {
        return $this->userRepository->getUsers();
    }

    public function getUser(int $user_id)
    {
        return $this->checkAndGetUser($user_id);
    }

    public function searchUsers(string $nickname): array
    {
        return $this->userRepository->searchUsers($nickname);
    }
# TODO: Ask about how to put image
    public function createUser($input)
    {
        $user = new stdClass();
        $data = json_decode(json_encode($input), false);
        if (!isset($data->nic)) {
            throw new UserException('The field "NIC" is required.', 400);
        }
        if (!isset($data->nickname)) {
            throw new UserException('The field "nickname" is required.', 400);
        }
        if (!isset($data->email)) {
            throw new UserException('The field "email" is required.', 400);
        }
        if (!isset($data->phoneNo)) {
            throw new UserException('The field "phoneNo" is required.', 400);
        }
        $user->nic = $this->userRepository->checkUserByNic($data->nic);
        $user->nickname = self::validateUserName($data->nickname);
        $user->email = self::validateEmail($data->email);
        $user->phoneNo = $data->phoneNo;
        $user->image = $data->image;
//        $user->password = hash('sha512', $data->password); # TODO: validate nic,phone no


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

    public function deleteUser(int $user_id): string
    {
        $this->checkAndGetUser($user_id);
        $this->userRepository->deleteUser($user_id);

        return $this->userRepository->deleteUser($user_id);
    }

    public function loginUser(array $input): string
    {
        $data = json_decode(json_encode($input), false);
        if (!isset($data->nic)) {
            throw new UserException('The field "nic" is required.', 400);
        }
//        if (!isset($data->password)) {
//            throw new UserException('The field "password" is required.', 400);
//        }
//        $password = hash('sha512', $data->password);
        $user = $this->userRepository->loginUser($data->nic);
        $token = array(
            'sub' => $user->id,
            'nic' => $user->nic,
            'nickname' => $user->nickname,
            'email' => $user->email,
            'phoneNo' => $user->phoneNo,
            'iat' => time(),
            'exp' => time() + (7 * 24 * 60 * 60),
        );

        return JWT::encode($token, getenv('SECRET_KEY'));
    }
}
