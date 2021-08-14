<?php 

namespace Bluesourcery\Prescription\Listeners;

use Bluesourcery\Prescription\Events\PrescriptionUpdated;
use Bluesourcery\Prescription\Facades\PrescriptionAuditor;

class AuditPrescriptionUpdated
{
	public function handle(PrescriptionUpdated $event)
	{
		PrescriptionAuditor::updated($event->prescription);
	}
}