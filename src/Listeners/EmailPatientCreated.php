<?php 

namespace Bluesourcery\Prescription\Listeners;

use Illuminate\Support\Facades\Mail;
use Bluesourcery\Prescription\Events\PatientCreated;
use Bluesourcery\Prescription\Mail\EmailPatientCreated as Email;

class EmailPatientCreated
{
	public function handle(PatientCreated $event)
	{
		if(!empty(config('prescription.notificationEmails'))) {
			Mail::to(config('prescription.notificationEmails'))->send(new Email($event->patient));
		}
	}
}