<?php declare(strict_types=1);

namespace App\Controller\Complaint;

use Slim\Http\Request;
use Slim\Http\Response;

class GetOneComplaint extends BaseComplaint
{
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $this->setParams($request, $response, $args);
        if ($this->useRedis() === true) {
            $complaint = $this->getComplaintFromCache((int) $this->args['id']);
        } else {
            $complaint = $this->getComplaintService()->getComplaint((int) $this->args['id']);
        }

        return $this->jsonResponse('success', $complaint, 200);
    }

    /**
     * @param int $complaint_id
     * @return mixed
     */
    private function getComplaintFromCache(int $complaint_id)
    {
        $complaint = $this->getFromCache($complaint_id);
        if ($complaint === null) {
            $complaint = $this->getComplaintService()->getComplaint($complaint_id);
            $this->saveInCache($complaint_id, $complaint);
        }

        return $complaint;
    }
}
