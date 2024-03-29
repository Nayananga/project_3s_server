<?php declare(strict_types=1);

use App\Service\ComplaintService;
use App\Service\HotelService;
use App\Service\QuestionService;
use App\Service\ReviewService;
use App\Service\UserService;
use Psr\Container\ContainerInterface;

$container = $app->getContainer();

$container['user_service'] = function (ContainerInterface $container): UserService {
    return new UserService($container->get('user_repository'));
};

$container['review_service'] = function (ContainerInterface $container): ReviewService {
    return new ReviewService($container->get('reviews_repository'));
};

$container['complaint_service'] = function (ContainerInterface $container): ComplaintService {
    return new ComplaintService($container->get('complaints_repository'));
};

$container['hotel_service'] = function (ContainerInterface $container): HotelService {
    return new HotelService($container->get('hotels_repository'));
};

$container['question_service'] = function (ContainerInterface $container): QuestionService {
    return new QuestionService($container->get('question_repository'));
};