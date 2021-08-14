<?php 

namespace Bluesourcery\Prescription\Listeners;

use Illuminate\Support\Facades\Mail;
use Bluesourcery\Prescription\Events\DrugDeleted;
use Bluesourcery\Prescription\Mail\EmailDrugDeleted as Email;

class EmailDrugDeleted
{
	public function handle(DrugDeleted $event)
	{
		if(!empty(config('prescription.notificationEmails'))) {
			Mail::to(config('prescription.notificationEmails'))->send(new Email($event->drug));
		}
	}
}