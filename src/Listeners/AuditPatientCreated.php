<?php 

namespace Bluesourcery\Prescription\Listeners;

use Bluesourcery\Prescription\Events\PatientCreated;
use Bluesourcery\Prescription\Facades\PatientAuditor;

class AuditPatientCreated
{
	public function handle(PatientCreated $event)
	{
		PatientAuditor::created($event->patient);
	}
}