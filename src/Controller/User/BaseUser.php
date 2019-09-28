<?php declare(strict_types=1);

namespace App\Controller\User;

use App\Controller\BaseController;
use App\Service\UserService;
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
        return $this->container->get('user_service');
    }
}
