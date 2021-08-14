<?php 

namespace Bluesourcery\Prescription\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Bluesourcery\Prescription\Events\PatientCreated;
use Bluesourcery\Prescription\Events\PatientDeleted;
use Bluesourcery\Prescription\Events\PatientUpdated;
use Bluesourcery\Prescription\Events\PrescriptionCreated;
use Bluesourcery\Prescription\Events\PrescriptionDeleted;
use Bluesourcery\Prescription\Events\PrescriptionUpdated;
use Bluesourcery\Prescription\Events\DrugCreated;
use Bluesourcery\Prescription\Events\DrugDeleted;
use Bluesourcery\Prescription\Events\DrugUpdated;
use Bluesourcery\Prescription\Listeners\AuditPatientCreated;
use Bluesourcery\Prescription\Listeners\AuditPatientDeleted;
use Bluesourcery\Prescription\Listeners\AuditPatientUpdated;
use Bluesourcery\Prescription\Listeners\AuditPrescriptionCreated;
use Bluesourcery\Prescription\Listeners\AuditPrescriptionDeleted;
use Bluesourcery\Prescription\Listeners\AuditPrescriptionUpdated;
use Bluesourcery\Prescription\Listeners\AuditDrugCreated;
use Bluesourcery\Prescription\Listeners\AuditDrugDeleted;
use Bluesourcery\Prescription\Listeners\AuditDrugUpdated;

class EventServiceProvider extends ServiceProvider
{
	protected $listen = [
		PatientCreated::class => [
			AuditPatientCreated::class
		],
		PatientDeleted::class => [
			AuditPatientDeleted::class
		],
		PatientUpdated::class => [
			AuditPatientUpdated::class
		],
		PrescriptionCreated::class => [
			AuditPrescriptionCreated::class
		],
		PrescriptionDeleted::class => [
			AuditPrescriptionDeleted::class
		],
		PrescriptionUpdated::class => [
			AuditPrescriptionUpdated::class
		],
		DrugCreated::class => [
			AuditDrugCreated::class
		],
		DrugDeleted::class => [
			AuditDrugDeleted::class
		],
		DrugUpdated::class => [
			AuditDrugUpdated::class
		],
	];

	public function boot()
	{
		parent::boot();
	}
}