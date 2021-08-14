<?php 

namespace Bluesourcery\Prescription\Listeners;

use Bluesourcery\Prescription\Events\DrugDeleted;
use Bluesourcery\Prescription\Facades\DrugAuditor;

class AuditDrugDeleted
{
	public function handle(DrugDeleted $event)
	{
		DrugAuditor::deleted($event->drug);
	}
}