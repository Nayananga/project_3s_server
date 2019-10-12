<?php declare(strict_types=1);

namespace App\Controller\Complaint;

use App\Controller\BaseController;
use App\Service\ComplaintService;
use Slim\Container;

abstract class BaseComplaint extends BaseController
{
    /**
     * @var ComplaintService
     */
    private $complaintService;

    public function __construct(Container $container)
    {
        $this->complaintService = $container->get('complaint_service');
    }

    protected function getComplaintService(): ComplaintService
    {
        return $this->complaintService;
    }
}
