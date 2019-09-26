<?php declare(strict_types=1);
#TODO: Change queries accordingly
namespace App\Repository;

use App\Exception\ComplaintException;
use PDO;

class ComplaintRepository extends BaseRepository
{
    public function __construct(PDO $database)
    {
        $this->database = $database;
    }

    public function getComplaints(): array
    {
        $query = 'SELECT * FROM complaints ORDER BY id';
        $statement = $this->database->prepare($query);
        $statement->execute();

        return $statement->fetchAll();
    }

    public function searchComplaints(string $strComplaints): array
    {   # TODO: Save description in lowercase only
        $query = 'SELECT * FROM complaints WHERE id LIKE :id OR UPPER(description) LIKE :description ORDER BY id';
        $id = '%' . $strComplaints . '%';
        $description = '%' . $strComplaints . '%';
        $statement = $this->database->prepare($query);
        $statement->bindParam('id', $id);
        $statement->bindParam('description', $description);
        $statement->execute();
        $complaints = $statement->fetchAll();
        if (!$complaints) {
            throw new ComplaintException('No complaints with that id or description were found.', 404);
        }

        return $complaints;
    }

    public function createComplaint($data)
    {
        $query = 'INSERT INTO complaints (user_id, geo_tag, description, image) VALUES (:user_id, :geo_tag, :description, :image)';
        $statement = $this->database->prepare($query);
        $statement->bindParam(':user_id', $data->user_id);
        $statement->bindParam(':geo_tag', $data->geo_tag);
        $statement->bindParam(':description', $data->description);
        $statement->bindParam(':image', $data->image);
        $statement->execute();

        return $this->checkAndGetComplaint((int)$this->database->lastInsertId());
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

    public function updateComplaint($complaint)
    {
        $query = 'UPDATE complaints SET description = :description WHERE id = :id';
        $statement = $this->database->prepare($query);
        $statement->bindParam(':id', $complaint->id);
        $statement->bindParam(':name', $complaint->name);
        $statement->bindParam(':description', $complaint->description);
        $statement->execute();

        return $this->checkAndGetComplaint((int)$complaint->id);
    }

    public function deleteComplaint(int $complaintId)
    {
        $query = 'DELETE FROM complaints WHERE id = :id';
        $statement = $this->database->prepare($query);
        $statement->bindParam(':id', $complaintId);
        $statement->execute();
    }
}
