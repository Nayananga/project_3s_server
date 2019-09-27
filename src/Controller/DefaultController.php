<?php declare(strict_types=1);

namespace App\Controller;

use Interop\Container\Exception\ContainerException;
use Respect\Validation\Exceptions\BaseException;
use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;

class DefaultController extends BaseController
{
    const API_VERSION = '0.25.0';

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function getHelp(Request $request, Response $response, array $args): Response
    {
        $this->setParams($request, $response, $args);
        $url = getenv('APP_DOMAIN');
        $endpoints = [
            'reviews' => $url . '/api/v1/reviews',
            'users' => $url . '/api/v1/users',
            'complaints' => $url . '/api/v1/complaints',
            'status' => $url . '/status',
            'this help' => $url . '',
        ];
        $message = [
            'endpoints' => $endpoints,
            'version' => self::API_VERSION,
            'timestamp' => time(),
        ];

        return $this->jsonResponse('success', $message, 200);
    }

    public function getStatus(Request $request, Response $response, array $args): Response
    {
        $this->setParams($request, $response, $args);
        try {
            $userService = $this->container->get('user_service');
        } catch (ContainerException $e) {
            throw new BaseException('get(user_service) failed in DefaultController.php.', 400);
        }
        try {
            $complaintService = $this->container->get('complaint_service');
        } catch (ContainerException $e) {
            throw new BaseException('get(complaint_service) failed in DefaultController.php.', 400);
        }
        try {
            $reviewService = $this->container->get('review_service');
        } catch (ContainerException $e) {
            throw new BaseException('get(review_service) failed in DefaultController.php.', 400);
        }
        $db = [
            'users' => count($userService->getUsers()),
            'reviews' => count($reviewService->getAllReviews()),
            'complaints' => count($complaintService->getComplaints()),
        ];
        $status = [
            'db' => $db,
            'version' => self::API_VERSION,
            'timestamp' => time(),
        ];

        return $this->jsonResponse('success', $status, 200);
    }
}
