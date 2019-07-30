<?php declare(strict_types=1);
#TODO: Change queries accordingly
namespace App\Repository;

use App\Exception\ComplaintException;

class ComplaintRepository extends BaseRepository
{
    public function __construct(\PDO $database)
    {
        $this->database = $database;
    }

    public function checkAndGetComplaint(int $complaintId)
    {
        $query = 'SELECT * FROM complaints WHERE id = :id';
        $statement = $this->database->prepare($query);
        $statement->bindParam(':id', $complaintId);
        $statement->execute();
        $complaint = $statement->fetchObject();
        if (empty($complaint)) {
            throw new ComplaintException('Complaint not found.', 404);
        }

        return $complaint;
    }

    public function getComplaints(): array
    {
        $query = 'SELECT * FROM complaints ORDER BY id';
        $statement = $this->database->prepare($query);
        $statement->execute();

        return $statement->fetchAll();
    }

    public function searchComplaints(string $strComplaints): array
    {
        $query = 'SELECT * FROM complaints WHERE UPPER(name) LIKE :name OR UPPER(description) LIKE :description ORDER BY id';
        $name = '%' . $strComplaints . '%';
        $description = '%' . $strComplaints . '%';
        $statement = $this->database->prepare($query);
        $statement->bindParam('name', $name);
        $statement->bindParam('description', $description);
        $statement->execute();
        $complaints = $statement->fetchAll();
        if (!$complaints) {
            throw new ComplaintException('No complaints with that name or description were found.', 404);
        }

        return $complaints;
    }

    public function createComplaint($data)
    {
        $query = 'INSERT INTO complaints (name, description) VALUES (:name, :description)';
        $statement = $this->database->prepare($query);
        $statement->bindParam(':name', $data->name);
        $statement->bindParam(':description', $data->description);
        $statement->execute();

        return $this->checkAndGetComplaint((int) $this->database->lastInsertId());
    }

    public function updateComplaint($complaint)
    {
        $query = 'UPDATE complaints SET name = :name, description = :description WHERE id = :id';
        $statement = $this->database->prepare($query);
        $statement->bindParam(':id', $complaint->id);
        $statement->bindParam(':name', $complaint->name);
        $statement->bindParam(':description', $complaint->description);
        $statement->execute();

        return $this->checkAndGetComplaint((int) $complaint->id);
    }

    public function deleteComplaint(int $complaintId)
    {
        $query = 'DELETE FROM complaints WHERE id = :id';
        $statement = $this->database->prepare($query);
        $statement->bindParam(':id', $complaintId);
        $statement->execute();
    }
}
