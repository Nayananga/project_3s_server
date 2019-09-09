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
        $data = json_decode(json_encode($loggedUser), True);
        if ($data["google_id"]){
            $message = [
                'Logged_User_Id'=> $data["google_id"],
                'Logged_User_Name'=> $data["nickname"],
            ];
            return $this->jsonResponse('success', $message, 200);
        }
        else{
            $message = [
                'Login_Status'=> 'User creation unsuccessful',
            ];
            return $this->jsonResponse('failure', $message, 500);
        }
    }
}
