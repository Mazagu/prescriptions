<?php 

namespace Bluesourcery\Prescription\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Bluesourcery\Prescription\Models\Patient;

class PatientDeleted 
{
	use Dispatchable, SerializesModels;

    public $patient;

    public function __construct(Patient $patient)
    {
        $this->patient = $patient;
    }
}