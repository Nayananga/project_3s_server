<?php declare(strict_types=1);

namespace App\Controller\Complaint;

use Slim\Http\Request;
use Slim\Http\Response;

class UpdateComplaint extends BaseComplaint
{
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $this->setParams($request, $response, $args);
        $input = $this->getInput();
        $complaint = $this->getComplaintService()->updateComplaint($input, (int)$this->args['id']);
        if ($this->useRedis() === true) {
            $this->saveInCache((int)$this->args['id'], $complaint);
        }

        return $this->jsonResponse('success', $complaint, 200);
    }
}
