<?php declare(strict_types=1);

namespace App\Service;

use App\Exception\ReviewException;
use App\Repository\ReviewRepository;

class TaskService extends BaseService
{
    /**
     * @var ReviewRepository
     */
    protected $taskRepository;

    public function __construct(ReviewRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    protected function getTaskRepository(): ReviewRepository
    {
        return $this->taskRepository;
    }

    protected function checkAndGetTask(int $taskId, int $userId)
    {
        return $this->getTaskRepository()->checkAndGetReview($taskId, $userId);
    }

    public function getAllTasks(): array
    {
        return $this->getTaskRepository()->getAllReviews();
    }

    public function getTasks(int $userId): array
    {
        return $this->getTaskRepository()->getReviews($userId);
    }

    public function getTask(int $taskId, int $userId)
    {
        return $this->checkAndGetTask($taskId, $userId);
    }

    public function searchTasks($tasksName, int $userId, $status): array
    {
        if ($status !== null) {
            $status = (int) $status;
        }

        return $this->getTaskRepository()->searchReviews($tasksName, $userId, $status);
    }

    public function createTask(array $input)
    {
        $task = new \stdClass();
        $data = json_decode(json_encode($input), false);
        if (empty($data->name)) {
            throw new ReviewException('The field "name" is required.', 400);
        }
        $task->name = self::validateTaskName($data->name);
        $task->description = null;
        if (isset($data->description)) {
            $task->description = $data->description;
        }
        $task->status = 0;
        if (isset($data->status)) {
            $task->status = self::validateTaskStatus($data->status);
        }
        $task->userId = $data->decoded->sub;

        return $this->getTaskRepository()->createReview($task);
    }

    public function updateTask(array $input, int $taskId)
    {
        $task = $this->checkAndGetTask($taskId, (int) $input['decoded']->sub);
        $data = json_decode(json_encode($input), false);
        if (!isset($data->name) && !isset($data->status)) {
            throw new ReviewException('Enter the data to update the task.', 400);
        }
        if (isset($data->name)) {
            $task->name = self::validateTaskName($data->name);
        }
        if (isset($data->description)) {
            $task->description = $data->description;
        }
        if (isset($data->status)) {
            $task->status = self::validateTaskStatus($data->status);
        }
        $task->userId = $data->decoded->sub;

        return $this->getTaskRepository()->updateReview($task);
    }

    public function deleteTask(int $taskId, int $userId): string
    {
        $this->checkAndGetTask($taskId, $userId);

        return $this->getTaskRepository()->deleteReview($taskId, $userId);
    }
}
