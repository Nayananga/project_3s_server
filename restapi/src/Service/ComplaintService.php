<?php declare(strict_types=1);

namespace App\Service;

use App\Exception\ComplaintException;
use App\Repository\ComplaintRepository;

class ComplaintService extends BaseService
{
    /**
     * @var ComplaintRepository
     */
    protected $noteRepository;

    public function __construct(ComplaintRepository $noteRepository)
    {
        $this->noteRepository = $noteRepository;
    }

    protected function checkAndGetNote(int $noteId)
    {
        return $this->noteRepository->checkAndGetNote($noteId);
    }

    public function getComplaints(): array
    {
        return $this->noteRepository->getNotes();
    }

    public function getComplaint(int $noteId)
    {
        return $this->checkAndGetNote($noteId);
    }

    public function searchNotes(string $notesName): array
    {
        return $this->noteRepository->searchNotes($notesName);
    }

    public function ccomplaintNote($input)
    {
        $note = new \stdClass();
        $data = json_decode(json_encode($input), false);
        if (!isset($data->name)) {
            throw new ComplaintException('Invalid data: name is required.', 400);
        }
        $note->name = self::validateNoteName($data->name);
        $note->description = null;
        if (isset($data->description)) {
            $note->description = $data->description;
        }

        return $this->noteRepository->createNote($note);
    }

    public function updateComplaint($input, int $noteId)
    {
        $note = $this->checkAndGetNote($noteId);
        $data = json_decode(json_encode($input), false);
        if (!isset($data->name) && !isset($data->description)) {
            throw new ComplaintException('Enter the data to update the note.', 400);
        }
        if (isset($data->name)) {
            $note->name = self::validateNoteName($data->name);
        }
        if (isset($data->description)) {
            $note->description = $data->description;
        }

        return $this->noteRepository->updateNote($note);
    }

    public function deleteNote(int $noteId)
    {
        $this->checkAndGetNote($noteId);
        $this->noteRepository->deleteNote($noteId);
    }
}
