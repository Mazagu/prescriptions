<?php 

namespace Bluesourcery\Prescription\Domain\Audition;

use Bluesourcery\Prescription\Models\Patient;
use Bluesourcery\Prescription\Models\PatientLog;

class PatientAuditor extends Auditor 
{
	public function created($patient)
	{
		PatientLog::create([
			'patient_id' => $patient->id,
			'action' => 'created',
			'parameters' => ''
		]);
	}

	public function updated($patient)
	{
		PatientLog::create([
			'patient_id' => $patient->id,
			'action' => 'updated',
			'parameters' => ''
		]);
	}

	public function deleted($patient)
	{
		PatientLog::create([
			'patient_id' => $patient->id,
			'action' => 'deleted',
			'parameters' => ''
		]);
	}
}