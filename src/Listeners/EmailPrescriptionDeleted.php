<?php 

namespace Bluesourcery\Prescription\Listeners;

use Illuminate\Support\Facades\Mail;
use Bluesourcery\Prescription\Events\PrescriptionDeleted;
use Bluesourcery\Prescription\Mail\EmailPrescriptionDeleted as Email;

class EmailPrescriptionDeleted
{
	public function handle(PrescriptionDeleted $event)
	{
		if(!empty(config('prescription.notificationEmails'))) {
			Mail::to(config('prescription.notificationEmails'))->send(new Email($event->prescription));
		}
	}
}