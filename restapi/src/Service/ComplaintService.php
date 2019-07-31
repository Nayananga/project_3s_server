<?php declare(strict_types=1);

namespace App\Service;

use App\Exception\ComplaintException;
use App\Repository\ComplaintRepository;
use stdClass;

class ComplaintService extends BaseService
{
    /**
     * @var ComplaintRepository
     */
    protected $complaintRepository;

    public function __construct(ComplaintRepository $complaintRepository)
    {
        $this->complaintRepository = $complaintRepository;
    }

    protected function checkAndGetComplaint(int $complaint_id)
    {
        return $this->complaintRepository->checkAndGetComplaint($complaint_id);
    }

    public function getComplaints(): array
    {
        return $this->complaintRepository->getComplaints();
    }

    public function getComplaint(int $complaint_id)
    {
        return $this->checkAndGetComplaint($complaint_id);
    }

    public function searchComplaints(string $strComplaints): array
    {
        return $this->complaintRepository->searchComplaints($strComplaints);
    }

    public function createComplaint($data)
    {
        $complaint = new stdClass();
        $data = json_decode(json_encode($data), false);
        if (!isset($data->user_id)) {
            throw new ComplaintException('Invalid data: user_id is required.', 400);
        }
        $complaint->geo_tag = self::validateComplaintGeoTag($data->geo_tag);
        $complaint->description = null;
        if (isset($data->description)) {
            $complaint->description = $data->description;
        }

        return $this->complaintRepository->createComplaint($complaint);
    }

    public function updateComplaint($input, int $complaint_id)
    {
        $complaint = $this->checkAndGetComplaint($complaint_id);
        $data = json_decode(json_encode($input), false);
        if (!isset($data->description)) { #TODO: VALIDATE IMAGE UPDATED OR NOT
            throw new ComplaintException('Enter the data to update the complaint.', 400);
        }
        if (isset($data->geo_tag)) {
            $complaint->geo_tag = self::validateComplaintGeoTag($data->geo_tag);
        }
        if (isset($data->description)) {
            $complaint->description = $data->description;
        }

        return $this->complaintRepository->updateComplaint($complaint);
    }

    public function deleteComplaint(int $complaint_id)
    {
        $this->checkAndGetComplaint($complaint_id);
        $this->complaintRepository->deleteComplaint($complaint_id);
    }
}
