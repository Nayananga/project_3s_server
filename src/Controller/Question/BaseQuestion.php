<?php declare(strict_types=1);

namespace App\Controller\Question;

use App\Controller\BaseController;
use App\Service\QuestionService;
use Slim\Container;

abstract class BaseQuestion extends BaseController
{
    /**
     * @var QuestionService
     */
    private $questionService;

    public function __construct(Container $container)
    {
        $this->questionService = $container->get('question_service');
    }

    protected function getQuestionService(): QuestionService
    {
        return $this->questionService;
    }
}
