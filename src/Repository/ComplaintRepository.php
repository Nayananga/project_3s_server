<?php declare(strict_types=1);

namespace App\Repository;

use App\Exception\ComplaintException;
use PDO;

class ComplaintRepository extends BaseRepository
{
    public function __construct(PDO $database)
    {
        $this->database = $database;
    }

    public function checkUserByGoogleId(string $google_id)
    {
        $query = 'SELECT `google_id`, `email`, `nickname` FROM `user` WHERE `google_id` = :google_id';
        $statement = $this->database->prepare($query);
        $statement->bindParam('google_id', $google_id);
        $statement->execute();
        $user = $statement->fetchObject();
        return $user;

    }

    # TODO: No get complaints for one user

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

    public function createComplaint($complaint)
    {
        $query = 'INSERT INTO complaints (user_id, geo_tag, description, image) VALUES (:user_id, :geo_tag, :description, :image)';
        $statement = $this->database->prepare($query);
        $statement->bindParam(':user_id', $complaint->user_id);
        $statement->bindParam(':geo_tag', $complaint->geo_tag);
        $statement->bindParam(':description', $complaint->description);
        $statement->bindParam(':image', $complaint->image_path);
        $statement->execute();
        $id = $this->getDb()->lastInsertId();

        return $this->checkAndGetComplaint($id);
    }

    public function checkAndGetComplaint(String $complaint_id)
    {
        $query = 'SELECT `id`, `user_id` FROM complaints WHERE id = :id';
        $statement = $this->database->prepare($query);
        $statement->bindParam(':id', $complaint_id);
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

        return $this->checkAndGetComplaint($complaint->id);
    }

    public function deleteComplaint(String $complaintId)
    {
        $query = 'DELETE FROM complaints WHERE id = :id';
        $statement = $this->database->prepare($query);
        $statement->bindParam(':id', $complaintId);
        $statement->execute();
    }
}
