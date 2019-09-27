<?php declare(strict_types=1);

namespace Tests\integration;

use Dotenv\Dotenv;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Slim\App;
use Slim\Http\Environment;
use Slim\Http\Request;
use Slim\Http\Response;
use Throwable;

class BaseTestCase extends TestCase
{
    public static $jwt;

    /**
     * Process the application given a request method and URI
     *
     * @param string $requestMethod the request method (e.g. GET, POST, etc.)
     * @param string $requestUri the request URI
     * @param array|object|null $requestData the request data
     * @return ResponseInterface
     * @throws Throwable
     */
    public function runApp($requestMethod, $requestUri, $requestData = null)
    {
        // Create a mock environment for testing with
        $environment = Environment::mock(
            [
                'REQUEST_METHOD' => $requestMethod,
                'REQUEST_URI' => $requestUri
            ]
        );

        // Set up a request object based on the environment
        $request = Request::createFromEnvironment($environment);
        $request = $request->withHeader('Authorization', self::$jwt);

        // Add request data, if it exists
        if (isset($requestData)) {
            $request = $request->withParsedBody($requestData);
        }

        // Load environment variables
        $baseDir = __DIR__ . '/../../';
        $envFile = $baseDir . '.env';
        if (file_exists($envFile)) {
            $dotenv = new Dotenv($baseDir);
            $dotenv->load();
        }

        // Use the application settings
        $settings = require __DIR__ . '/../../src/App/Settings.php';

        // Instantiate the application
        $app = new App($settings);

        // Set up dependencies
        require __DIR__ . '/../../src/App/Dependencies.php';

        // Register middleware
        require __DIR__ . '/../../src/App/Middleware.php';

        // Register services
        require __DIR__ . '/../../src/App/Services.php';

        // Register repositories
        require __DIR__ . '/../../src/App/Repositories.php';

        // Register routes
        require __DIR__ . '/../../src/App/Routes.php';

        // Process the application
        $response = $app->process($request, new Response());

        // Return the response
        return $response;
    }
}
