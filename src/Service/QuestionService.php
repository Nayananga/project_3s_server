<?php declare(strict_types=1);

namespace App\Service;

use App\Repository\QuestionRepository;

class QuestionService
{
    /**
     * @var QuestionRepository
     */
    protected $questionRepository;

    public function __construct(QuestionRepository $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }

    public function getAllQuestions(): array
    {
        return $this->questionRepository->getAllQuestions();
    }

}
