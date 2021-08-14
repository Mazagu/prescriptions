<?php 

namespace Bluesourcery\Prescription\Domain\Managers\Patient;

use Bluesourcery\Prescription\Models\ErrorMessage;
use Bluesourcery\Prescription\Models\Patient;
use Bluesourcery\Prescription\Domain\Managers\Manager;
use Bluesourcery\Prescription\Facades\CachingPatientRepository;
use Bluesourcery\Prescription\Events\PatientUpdated;

class UpdatePatient extends Manager
{
	protected function _action($parameters)
	{
		if($result = CachingPatientRepository::update($parameters)) {
			return $this->_success($result);
		} else {
			throw new \Exception(__('prescription.patient.update.error'));	
		}
	}
	
	protected function _success($patient)
	{
		event(new PatientUpdated($patient));
		return $patient;
	}
}