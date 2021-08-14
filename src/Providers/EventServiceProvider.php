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
use Bluesourcery\Prescription\Listeners\EmailPatientCreated;
use Bluesourcery\Prescription\Listeners\EmailPatientDeleted;
use Bluesourcery\Prescription\Listeners\EmailPatientUpdated;
use Bluesourcery\Prescription\Listeners\EmailDrugCreated;
use Bluesourcery\Prescription\Listeners\EmailDrugDeleted;
use Bluesourcery\Prescription\Listeners\EmailDrugUpdated;
use Bluesourcery\Prescription\Listeners\EmailPrescriptionCreated;
use Bluesourcery\Prescription\Listeners\EmailPrescriptionDeleted;
use Bluesourcery\Prescription\Listeners\EmailPrescriptionUpdated;

class EventServiceProvider extends ServiceProvider
{
	protected $listen = [
		PatientCreated::class => [
			AuditPatientCreated::class,
			EmailPatientCreated::class,
		],
		PatientDeleted::class => [
			AuditPatientDeleted::class,
			EmailPatientDeleted::class,
		],
		PatientUpdated::class => [
			AuditPatientUpdated::class,
			EmailPatientUpdated::class,
		],
		PrescriptionCreated::class => [
			AuditPrescriptionCreated::class,
			EmailPrescriptionCreated::class,
		],
		PrescriptionDeleted::class => [
			AuditPrescriptionDeleted::class,
			EmailPrescriptionDeleted::class,
		],
		PrescriptionUpdated::class => [
			AuditPrescriptionUpdated::class,
			EmailPrescriptionUpdated::class,
		],
		DrugCreated::class => [
			AuditDrugCreated::class,
			EmailDrugCreated::class,
		],
		DrugDeleted::class => [
			AuditDrugDeleted::class,
			EmailDrugDeleted::class,
		],
		DrugUpdated::class => [
			AuditDrugUpdated::class,
			EmailDrugUpdated::class,
		],
	];

	public function boot()
	{
		parent::boot();
	}
}