<?php 

namespace Bluesourcery\Prescription\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Bluesourcery\Prescription\Models\Prescription;

class PrescriptionCreated 
{
	use Dispatchable, SerializesModels;

    public $prescription;

    public function __construct(Prescription $prescription)
    {
        $this->prescription = $prescription;
    }
}