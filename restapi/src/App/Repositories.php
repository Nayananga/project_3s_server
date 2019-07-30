<?php declare(strict_types=1);

use App\Repository\UserRepository;
# TODO: Change these classes accordingly
use App\Repository\TaskRepository;
use App\Repository\ComplaintRepository;
use Psr\Container\ContainerInterface;

$container = $app->getContainer();

$container['user_repository'] = function (ContainerInterface $container): UserRepository {
    return new UserRepository($container->get('db'));
};

$container['reviews_repository'] = function (ContainerInterface $container): ReviewRepository {
    return new ReviewRepository($container->get('db'));
};

$container['complaints_repository'] = function (ContainerInterface $container): ComplaintRepository {
    return new ComplaintRepository($container->get('db'));
};
