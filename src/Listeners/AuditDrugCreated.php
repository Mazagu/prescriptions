<?php 

namespace Bluesourcery\Prescription\Listeners;

use Bluesourcery\Prescription\Events\DrugCreated;
use Bluesourcery\Prescription\Facades\DrugAuditor;

class AuditDrugCreated
{
	public function handle(DrugCreated $event)
	{
		DrugAuditor::created($event->drug);
	}
}