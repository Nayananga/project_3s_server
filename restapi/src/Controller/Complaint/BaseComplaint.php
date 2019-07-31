<?php declare(strict_types=1);

namespace App\Controller\Complaint;

use App\Controller\BaseController;
use App\Service\ComplaintService;
use Slim\Container;

abstract class BaseComplaint extends BaseController
{
    const KEY = 'project_3s:complaint:';

    /**
     * @var ComplaintService
     */
    protected $complaintService;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    protected function getComplaintService(): ComplaintService
    {
        return $this->container->get('complaint_service'); # TODO: I`m not sure about this
    }
}
