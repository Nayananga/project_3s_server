<?php declare(strict_types=1);

namespace App\Controller\Complaint;

use Slim\Http\Request;
use Slim\Http\Response;

class GetAllComplaints extends BaseComplaint
{
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $this->setParams($request, $response, $args);
        $complaints = $this->getComplaintService()->getAllComplaints();

        return $this->jsonResponse('success', $complaints, 200);
    }
}
