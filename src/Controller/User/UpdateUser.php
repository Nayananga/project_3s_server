<?php declare(strict_types=1);

namespace App\Controller\User;

use Slim\Http\Request;
use Slim\Http\Response;

class UpdateUser extends BaseUser
{
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $this->setParams($request, $response, $args);
        $input = $this->getInput();
        $user_id = $input["decoded"]['sub'];
        $user = $this->getUserService()->updateUser($input);
        if ($this->useRedis() === true) {
            $this->saveInCache($user_id, $user);
        }

        return $this->jsonResponse('success', $user, 200);
    }
}
