<?php 

namespace Bluesourcery\Prescription\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Bluesourcery\Prescription\Models\Patient;

class PatientCreatedMail extends Mailable
{
	use Queueable, SerializesModels;

	public $patient;

	public function __construct(Patient $patient)
	{
		$this->patient = $patient;
	}

	public function build()
	{
		return $this->view('prescription::emails.patientCreated');
	}
}