<?php 

namespace Bluesourcery\Prescription\Listeners;

use Bluesourcery\Prescription\Events\PrescriptionDeleted;
use Bluesourcery\Prescription\Facades\PrescriptionAuditor;

class AuditPrescriptionDeleted
{
	public function handle(PrescriptionDeleted $event)
	{
		PrescriptionAuditor::deleted($event->prescription);
	}
}