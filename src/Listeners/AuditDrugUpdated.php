<?php 

namespace Bluesourcery\Prescription\Listeners;

use Bluesourcery\Prescription\Events\DrugUpdated;
use Bluesourcery\Prescription\Facades\DrugAuditor;

class AuditDrugUpdated
{
	public function handle(DrugUpdated $event)
	{
		DrugAuditor::updated($event->drug);
	}
}