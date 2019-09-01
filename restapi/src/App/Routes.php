<?php declare(strict_types=1);

$app->get('/', 'App\Controller\DefaultController:getHelp');
$app->get('/status', 'App\Controller\DefaultController:getStatus');
$app->post('/login', 'App\Controller\User\LoginUser');

$app->group('/api/v1', function () use ($app) {
    $app->group('/reviews', function () use ($app) {
        $app->get('', 'App\Controller\Review\GetAllReviews');
        $app->get('/[{id}]', 'App\Controller\Review\GetOneReview');
        $app->get('/search/[{query}]', 'App\Controller\Review\SearchReview');
        $app->post('', 'App\Controller\Review\CreateReview');
        $app->put('/[{id}]', 'App\Controller\Review\UpdateReview');
        $app->delete('/[{id}]', 'App\Controller\Review\DeleteReview');
    })->add(new App\Middleware\AuthMiddleware($app));
    $app->group('/users', function () use ($app) {
        $app->get('', 'App\Controller\User\GetAllUsers')->add(new App\Middleware\AuthMiddleware($app));     //TODO: NO NEED
        $app->get('/[{id}]', 'App\Controller\User\GetOneUser')->add(new App\Middleware\AuthMiddleware($app));
        $app->get('/search/[{query}]', 'App\Controller\User\SearchUsers')->add(new App\Middleware\AuthMiddleware($app));    //TODO: NO NEED
        $app->post('', 'App\Controller\User\CreateUser');
        $app->put('/[{id}]', 'App\Controller\User\UpdateUser')->add(new App\Middleware\AuthMiddleware($app));
        $app->delete('/[{id}]', 'App\Controller\User\DeleteUser')->add(new App\Middleware\AuthMiddleware($app));
    });
    $app->group('/complaints', function () use ($app) {
        $app->get('', 'App\Controller\Complaint\GetAllComplaints');
        $app->get('/[{id}]', 'App\Controller\Complaint\GetOneComplaint');
        $app->get('/search/[{query}]', 'App\Controller\Complaint\SearchComplaints');
        $app->post('', 'App\Controller\Complaint\CreateComplaint');
        $app->put('/[{id}]', 'App\Controller\Complaint\UpdateComplaint');
        $app->delete('/[{id}]', 'App\Controller\Complaint\DeleteComplaint');
    })->add(new App\Middleware\AuthMiddleware($app));
});
