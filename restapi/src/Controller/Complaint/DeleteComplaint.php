<?php declare(strict_types=1);

namespace App\Controller\Complaint;

use Slim\Http\Request;
use Slim\Http\Response;

class DeleteComplaint extends BaseComplaint
{
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $this->setParams($request, $response, $args);
        $this->getComplaintService()->deleteComplaint((int)$this->args['id']); # TODO: Im not changing this so we can follow the readme guide for api calls
        if ($this->useRedis() === true) {
            $this->deleteFromCache((int)$this->args['id']);
        }

        return $this->jsonResponse('success', null, 204);
    }
}
