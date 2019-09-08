<?php declare(strict_types=1);

namespace App\Middleware;

use App\Exception\AuthException;
use Google_Client;
use Psr\Http\Message\ResponseInterface;
use Slim\Http\Request;
use Slim\Http\Response;
class AuthMiddleware
{
    /**
     * @param Request $request
     * @param Response $response
     * @param Callable $next
     * @return ResponseInterface
     * @throws AuthException
     */
    public function __invoke(Request $request, Response $response, $next): ResponseInterface
    {
        $authHeader = $request->getHeader('Authorization');
        $idToken = $authHeader[0];
        if (empty($idToken) === true) {
            throw new AuthException('JWT Token required.', 400);
        }
        $decoded = $this->checkToken($idToken);
        $object = $request->getParsedBody();
        $object['decoded'] = $decoded;
        return $next($request->withParsedBody($object), $response);
    }

    /**
     * @param string $token
     * @return mixed
     * @throws AuthException
     */
    public function checkToken(string $token)
    {
        require_once __DIR__ . '/../../vendor/autoload.php';

        $client_id = getenv('CLIENT_ID');
        $client = new Google_Client(['client_id' => $client_id]);

            $decoded = $client->verifyIdToken($token);
            if ($decoded) {
                var_dump($decoded);
                return $decoded;
            }
            else{
                throw new AuthException('error: Forbidden, not authorized.', 403);
            }
    }
}

