<?php 

namespace Bluesourcery\Prescription\Domain\Audition;

use Bluesourcery\Prescription\Models\Prescription;
use Bluesourcery\Prescription\Models\PrescriptionLog;

class PrescriptionAuditor extends Auditor 
{
	public function created($prescription)
	{
		PrescriptionLog::create([
			'prescription_id' => $prescription->id,
			'action' => 'created',
			'parameters' => ''
		]);
	}

	public function updated($prescription)
	{
		PrescriptionLog::create([
			'prescription_id' => $prescription->id,
			'action' => 'updated',
			'parameters' => ''
		]);
	}

	public function deleted($prescription)
	{
		PrescriptionLog::create([
			'prescription_id' => $prescription->id,
			'action' => 'deleted',
			'parameters' => ''
		]);
	}
}