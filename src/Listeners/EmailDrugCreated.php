<?php 

namespace Bluesourcery\Prescription\Listeners;

use Illuminate\Support\Facades\Mail;
use Bluesourcery\Prescription\Events\DrugCreated;
use Bluesourcery\Prescription\Mail\DrugCreatedMail as Email;

class EmailDrugCreated
{
	public function handle(DrugCreated $event)
	{
		if(!empty(config('prescription.notificationEmails'))) {
			Mail::to(config('prescription.notificationEmails'))->send(new Email($event->drug));
		}
	}
}