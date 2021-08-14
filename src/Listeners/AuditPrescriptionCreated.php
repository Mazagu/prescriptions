<?php 

namespace Bluesourcery\Prescription\Listeners;

use Bluesourcery\Prescription\Events\PrescriptionCreated;
use Bluesourcery\Prescription\Facades\PrescriptionAuditor;

class AuditPrescriptionCreated
{
	public function handle(PrescriptionCreated $event)
	{
		PrescriptionAuditor::created($event->prescription);
	}
}