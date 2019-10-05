<?php declare(strict_types=1);

namespace App\Controller\Complaint;

use Slim\Http\Request;
use Slim\Http\Response;

class CreateComplaint extends BaseComplaint
{

    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $this->setParams($request, $response, $args);
        $complaint = $this->getComplaintService()->createComplaint($this->getInput());

        if (empty($complaint)) {
            return $this->jsonResponse('failure', $complaint, 500);

        } else {
            return $this->jsonResponse('success', $complaint, 200);

        }
    }
}
