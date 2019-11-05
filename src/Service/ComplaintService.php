<?php declare(strict_types=1);

namespace App\Service;

use App\Exception\ComplaintException;
use App\Repository\ComplaintRepository;
use stdClass;

class ComplaintService
{
    /**
     * @var ComplaintRepository
     */
    protected $complaintRepository;

    public function __construct(ComplaintRepository $complaintRepository)
    {
        $this->complaintRepository = $complaintRepository;
    }

    public function getAllComplaints(): array
    {
        return $this->complaintRepository->getAllComplaints();
    }

    public function getComplaint(String $complaint_id)
    {
        return $this->checkAndGetComplaint($complaint_id);
    }

    protected function checkAndGetComplaint(String $complaint_id)
    {
        return $this->complaintRepository->checkAndGetComplaint($complaint_id);
    }

    public function searchComplaints(string $strComplaints): array
    {
        return $this->complaintRepository->searchComplaints($strComplaints);
    }

    public function createComplaint(array $input)
    {
        $userData = $input["decoded"];
        $checkUser = $this->validateCurrentUser($userData['sub']);
        if (empty($checkUser)) {
            throw new ComplaintException('Invalid User.', 400);
        } else {
            $complaint = new stdClass();
            $complaint->user_id = $userData['sub'];
            $complaint->geo_tag = $input["geo_location"];
            if (empty($complaint->geo_tag)) {
                throw new ComplaintException('The field "geo_tag" is required.', 400);
            } else {
                $complaint->geo_tag = json_encode($complaint->geo_tag);
                $complaint->description = $input["description"];
                if (empty($complaint->description)) {
                    throw new ComplaintException('The field "description" is required.', 400);
                } else {
                    $complaintImageName = $input["image"]["name"];
                    $complaint->image_path = 'NO IMAGE';
                    if ($complaintImageName != null) {
                        $complaintImagePath = __DIR__ . '/../../images/' . $complaint->user_id . '/' . $complaintImageName;
                        $complaint->image_path = $complaintImagePath;
                        $complaintImageFile = $input["image"]["file"];
                        $realComplaintImageFile = base64_decode($complaintImageFile);
                        if (!is_dir(__DIR__ . '/../../images/' . $complaint->user_id)) {
                            mkdir(__DIR__ . '/../../images/' . $complaint->user_id, 0777, true);
                        }
                        file_put_contents($complaintImagePath, $realComplaintImageFile);
                    }
                    return $this->complaintRepository->createComplaint($complaint);
                }
            }
        }
    }

    protected function validateCurrentUser(String $google_id)
    {
        return $this->complaintRepository->checkUserByGoogleId($google_id);
    }

    public function updateComplaint($input, String $complaint_id)
    {
        $complaint = $this->checkAndGetComplaint($complaint_id);
        $data = json_decode(json_encode($input), false);
        if (!isset($data->description)) { #TODO: VALIDATE IMAGE UPDATED OR NOT
            throw new ComplaintException('Enter the data to update the complaint.', 400);
        }
        if (isset($data->geo_tag)) {
            $complaint->geo_tag = $data->geo_tag;
        }
        if (isset($data->description)) {
            $complaint->description = $data->description;
        }

        return $this->complaintRepository->updateComplaint($complaint);
    }

    public function deleteComplaint(String $complaint_id)
    {
        $this->checkAndGetComplaint($complaint_id);
        $this->complaintRepository->deleteComplaint($complaint_id);
    }
}
