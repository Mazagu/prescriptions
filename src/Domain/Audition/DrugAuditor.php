<?php 

namespace Bluesourcery\Prescription\Domain\Audition;

use Bluesourcery\Prescription\Models\Drug;
use Bluesourcery\Prescription\Models\DrugLog;

class DrugAuditor extends Auditor 
{
	public function created($drug)
	{
		DrugLog::create([
			'drug_id' => $drug->id,
			'action' => 'created',
			'parameters' => ''
		]);
	}

	public function updated($drug)
	{
		DrugLog::create([
			'drug_id' => $drug->id,
			'action' => 'updated',
			'parameters' => ''
		]);
	}

	public function deleted($drug)
	{
		DrugLog::create([
			'drug_id' => $drug->id,
			'action' => 'deleted',
			'parameters' => ''
		]);
	}
}