<?php declare(strict_types=1);

namespace App\Controller\User;

use Slim\Http\Request;
use Slim\Http\Response;

class GetOneUser extends BaseUser
{
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $this->setParams($request, $response, $args);
        $input = $this->getInput();
        $user_id = $input["decoded"]['sub'];
        if ($this->useRedis() === true) {
            $user = $this->getUserFromCache($user_id);
        } else {
            $user = $this->getUserService()->getUser($user_id);
        }
        return $this->jsonResponse('success', $user, 200);
    }

    /**
     * @param int $user_id
     * @return mixed
     */
    private function getUserFromCache($user_id)
    {
        $user = $this->getFromCache($user_id);
        if ($user === null) {
            $user = $this->getUserService()->getUser($user_id);
            $this->saveInCache($user_id, $user);
        }
        return $user;
    }
}
