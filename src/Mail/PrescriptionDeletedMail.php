<?php 

namespace Bluesourcery\Prescription\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Bluesourcery\Prescription\Models\Prescription;

class PrescriptionDeletedMail extends Mailable
{
	use Queueable, SerializesModels;

	public $prescription;

	public function __construct(Prescription $prescription)
	{
		$this->prescription = $prescription;
	}

	public function build()
	{
		return $this->view('prescription::emails.prescriptionDeleted');
	}
}