<?php 

namespace Bluesourcery\Prescription\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Bluesourcery\Prescription\Models\Drug;

class DrugUpdated 
{
	use Dispatchable, SerializesModels;

    public $drug;

    public function __construct(Drug $drug)
    {
        $this->drug = $drug;
    }
}