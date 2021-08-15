<?php 

namespace Bluesourcery\Prescription\Listeners;

use Illuminate\Support\Facades\Mail;
use Bluesourcery\Prescription\Events\PatientDeleted;
use Bluesourcery\Prescription\Mail\PatientDeletedMail as Email;

class EmailPatientDeleted
{
	public function handle(PatientDeleted $event)
	{
		if(!empty(config('prescription.notificationEmails'))) {
			Mail::to(config('prescription.notificationEmails'))->send(new Email($event->patient));
		}
	}
}