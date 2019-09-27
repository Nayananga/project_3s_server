<?php declare(strict_types=1);

namespace App\Controller\Complaint;

use Slim\Http\Request;
use Slim\Http\Response;

class SearchComplaints extends BaseComplaint
{
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $this->setParams($request, $response, $args);
        $complaints = $this->getComplaintService()->searchComplaints($this->args['query']);
        return $this->jsonResponse('success', $complaints, 200);
    }
}
