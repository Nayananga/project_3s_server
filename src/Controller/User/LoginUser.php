<?php declare(strict_types=1);

namespace App\Controller\User;

use Slim\Http\Request;
use Slim\Http\Response;

class LoginUser extends BaseUser
{
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $this->setParams($request, $response, $args);
        $loggedUser = $this->getUserService()->loginUser($this->getInput());

        if (empty($loggedUser)) {
            return $this->jsonResponse('failure', $loggedUser, 500);

        } else {
            return $this->jsonResponse('success', $loggedUser, 200);

        }
    }
}
