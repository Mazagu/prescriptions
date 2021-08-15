<?php 

namespace Bluesourcery\Prescription\Listeners;

use Illuminate\Support\Facades\Mail;
use Bluesourcery\Prescription\Events\PrescriptionCreated;
use Bluesourcery\Prescription\Mail\PrescriptionCreatedMail as Email;

class EmailPrescriptionCreated
{
	public function handle(PrescriptionCreated $event)
	{
		if(!empty(config('prescription.notificationEmails'))) {
			Mail::to(config('prescription.notificationEmails'))->send(new Email($event->prescription));
		}
	}
}