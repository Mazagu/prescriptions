<?php 

namespace Bluesourcery\Prescription\Listeners;

use Bluesourcery\Prescription\Events\PatientUpdated;
use Bluesourcery\Prescription\Facades\PatientAuditor;

class AuditPatientUpdated
{
	public function handle(PatientUpdated $event)
	{
		PatientAuditor::updated($event->patient);
	}
}