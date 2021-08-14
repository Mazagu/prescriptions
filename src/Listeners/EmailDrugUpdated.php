<?php 

namespace Bluesourcery\Prescription\Listeners;

use Illuminate\Support\Facades\Mail;
use Bluesourcery\Prescription\Events\DrugUpdated;
use Bluesourcery\Prescription\Mail\EmailDrugUpdated as Email;

class EmailDrugUpdated
{
	public function handle(DrugUpdated $event)
	{
		if(!empty(config('prescription.notificationEmails'))) {
			Mail::to(config('prescription.notificationEmails'))->send(new Email($event->drug));
		}
	}
}