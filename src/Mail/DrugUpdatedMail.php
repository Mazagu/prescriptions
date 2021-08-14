<?php 

namespace Bluesourcery\Prescription\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Bluesourcery\Prescription\Models\Drug;

class DrugUpdatedMail extends Mailable
{
	use Queueable, SerializesModels;

	public $drug;

	public function __construct(Drug $drug)
	{
		$this->drug = $drug;
	}

	public function build()
	{
		return $this->view('drug::emails.drugUpdated');
	}
}