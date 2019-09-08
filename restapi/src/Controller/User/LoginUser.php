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
        switch($loginStatus){
            case 2000:
                $message = [
                    'Login_Status'=> 'Successfully Logged in ',
                ];
                return $this->jsonResponse('success', $message, 200);
                break;
            case 2001:
                $message = [
                    'Login_Status'=> 'Successfully created user and logged in user',
                ];
                return $this->jsonResponse('success', $message, 200);
                break;
            default:
                $message = [
                    'Login_Status'=> 'User creation unsuccessful',
                ];
                return $this->jsonResponse('failure', $message, 500);
        }
    }
}
