<?php declare(strict_types=1);

namespace App\Controller\User;

use Slim\Http\Request;
use Slim\Http\Response;

class LoginUser extends BaseUser
{
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $this->setParams($request, $response, $args);
        $loginStatus = $this->getUserService()->loginUser($this->getInput());
        $message = [
            'Login_Status'=> $loginStatus
        ];
        return $this->jsonResponse('success', $message, 200);
    }
}
