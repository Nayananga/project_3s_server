<?php declare(strict_types=1);

namespace App\Repository;

use PDO;

class QuestionRepository extends BaseRepository
{
    public function __construct(PDO $database)
    {
        $this->database = $database;
    }

    public function getAllQuestions(): array
    {
        $query = 'SELECT `question`, `expected_answer` FROM `question` ORDER BY `id`';
        $statement = $this->database->prepare($query);
        $statement->execute();

        return $statement->fetchAll();
    }

}
