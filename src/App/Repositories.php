<?php declare(strict_types=1);

use App\Repository\HotelRepository;
use App\Repository\ComplaintRepository;
use App\Repository\ReviewRepository;
use App\Repository\UserRepository;
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

$container['hotels_repository'] = function (ContainerInterface $container): HotelRepository {
    return new HotelRepository($container->get('db'));
};
