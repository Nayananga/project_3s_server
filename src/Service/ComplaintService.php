<?php declare(strict_types=1);

namespace App\Service;

use App\Exception\ComplaintException;
use App\Repository\ComplaintRepository;
use Nette\Neon\Exception;
use PhpParser\Node\Scalar\String_;
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

    public function getComplaints(): array
    {
        return $this->complaintRepository->getComplaints();
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
        if(empty($checkUser)) {
            throw new ComplaintException('Invalid User.', 400);
        } else {
            $complaint = new stdClass();
            $complaint->user_id = $userData['sub'];
            $complaint->geo_tag = $input["geo_location"];
            if(empty($complaint->geo_tag)) {
                throw new ComplaintException('The field "geo_tag" is required.', 400);
            } else {
                $complaint->geo_tag = json_encode($complaint->geo_tag);
                $complaint->description = $input["description"];
                if (empty($complaint->description)) {
                    throw new ComplaintException('The field "description" is required.', 400);
                } else {
                    $complaintImageName = $input["image"]["name"];
                    $complaint->imageName = $complaintImageName;
                    if(empty($complaintImageName)){
                        return $this->complaintRepository->createComplaint($complaint);
                    } else {
                        $complaintImageFile = $input["image"]["file"];
                        $realComplaintImage = base64_decode($complaintImageFile);
//                        $dir = __DIR__ . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $complaint->user_id;
                        try{
//                            if (!file_exists($dir))
//                            {
//                                mkdir($dir,0775);
//                            }
                            file_put_contents(__DIR__, $realComplaintImage);
                        } catch (Exception $error) {
                            var_dump($error);
                        }

                        return $this->complaintRepository->createComplaint($complaint); // put inside try catch
                    }
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
