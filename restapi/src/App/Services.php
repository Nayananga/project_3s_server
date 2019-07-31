<?php declare(strict_types=1);

use App\Service\UserService;
use App\Service\ReviewService;
use App\Service\ComplaintService;
use Psr\Container\ContainerInterface;

$container = $app->getContainer();

$container['user_service'] = function (ContainerInterface $container): UserService {
    return new UserService($container->get('user_repository'));
};

$container['review_service'] = function (ContainerInterface $container): ReviewService {
    return new ReviewService($container->get('review_repository'));
};

$container['complaint_service'] = function (ContainerInterface $container): ComplaintService {
    return new ComplaintService($container->get('complaint_repository')); # TODO: Check this
};
