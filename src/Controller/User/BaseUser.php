<?php declare(strict_types=1);

namespace App\Controller\User;

use App\Controller\BaseController;
use App\Exception\UserException;
use App\Service\UserService;
use Interop\Container\Exception\ContainerException;
use Respect\Validation\Exceptions\BaseException;
use Slim\Container;

abstract class BaseUser extends BaseController
{
    /**
     * @var UserService
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    protected function getUserService(): UserService
    {
        try {
            return $this->container->get('user_service');
        } catch (ContainerException $e) {
            throw new BaseException('Get user_service failed in BaseUser.php.', 400);

        }
    }

    /**
     * @throws UserException
     */
    protected function checkUserPermissions()
    {
        $input = $this->getInput();
        if ($this->args['id'] != $input['decoded']->sub) {
            throw new UserException('User permission failed.', 400);
        }
    }
}

