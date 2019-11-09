<?php declare(strict_types=1);

namespace App\Controller\Question;

use Slim\Http\Request;
use Slim\Http\Response;

class GetAllQuestions extends BaseQuestion
{
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $this->setParams($request, $response, $args);
        $questions = $this->getQuestionService()->getAllQuestions();

        return $this->jsonResponse('success', $questions, 200);
    }
}
