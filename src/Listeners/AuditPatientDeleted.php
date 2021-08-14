<?php 

namespace Bluesourcery\Prescription\Listeners;

use Bluesourcery\Prescription\Events\PatientDeleted;
use Bluesourcery\Prescription\Facades\PatientAuditor;

class AuditPatientDeleted
{
	public function handle(PatientDeleted $event)
	{
		PatientAuditor::deleted($event->patient);
	}
}