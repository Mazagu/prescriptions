<?php 

namespace Bluesourcery\Prescription\Domain\Managers\Patient;

use Bluesourcery\Prescription\Models\ErrorMessage;
use Bluesourcery\Prescription\Models\Patient;
use Bluesourcery\Prescription\Domain\Managers\Manager;
use Bluesourcery\Prescription\Facades\CachingPatientRepository;
use Bluesourcery\Prescription\Facades\PatientAuditor;

class FilterPatients extends Manager
{
	protected function _action($parameters)
	{
		if($result = CachingPatientRepository::filter($parameters)) {
			return $this->_success($result);
		} else {
			throw new \Exception(__('prescription.patient.list.error'));	
		}
	}
	
	protected function _success($patients)
	{
		return $patients;
	}
}