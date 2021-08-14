<?php 

namespace Bluesourcery\Prescription\Domain\Managers\Patient;

use Bluesourcery\Prescription\Models\ErrorMessage;
use Bluesourcery\Prescription\Models\Patient;
use Bluesourcery\Prescription\Domain\Managers\Manager;
use Bluesourcery\Prescription\Facades\CachingPatientRepository;
use Bluesourcery\Prescription\Facades\PatientAuditor;

class CreatePatient extends Manager
{
	protected function _action($parameters)
	{
		if($result = CachingPatientRepository::create($parameters)) {
			return $this->_success($result);
		} else {
			throw new \Exception(__('prescription.patient.create.error'));	
		}
	}
	
	protected function _success($patient)
	{
		PatientAuditor::created($patient);
		return $patient;
	}
}