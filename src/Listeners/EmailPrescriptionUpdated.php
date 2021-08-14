<?php 

namespace Bluesourcery\Prescription\Listeners;

use Illuminate\Support\Facades\Mail;
use Bluesourcery\Prescription\Events\PrescriptionUpdated;
use Bluesourcery\Prescription\Mail\EmailPrescriptionUpdated as Email;

class EmailPrescriptionUpdated
{
	public function handle(PrescriptionUpdated $event)
	{
		if(!empty(config('prescription.notificationEmails'))) {
			Mail::to(config('prescription.notificationEmails'))->send(new Email($event->prescription));
		}
	}
}