<?php 

namespace Bluesourcery\Prescription\Listeners;

use Illuminate\Support\Facades\Mail;
use Bluesourcery\Prescription\Events\PatientUpdated;
use Bluesourcery\Prescription\Mail\PatientUpdatedMail as Email;

class EmailPatientUpdated
{
	public function handle(PatientUpdated $event)
	{
		if(!empty(config('prescription.notificationEmails'))) {
			Mail::to(config('prescription.notificationEmails'))->send(new Email($event->patient));
		}
	}
}