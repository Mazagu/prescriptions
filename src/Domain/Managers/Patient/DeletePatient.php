<?php 

namespace Bluesourcery\Prescription\Domain\Managers\Patient;

use Bluesourcery\Prescription\Models\Patient;
use Bluesourcery\Prescription\Domain\Managers\ManagerInterface;
use Bluesourcery\Prescription\Facades\CachingPatientRepository;
use Bluesourcery\Prescription\Facades\PatientAuditor;

class DeletePatient implements ManagerInterface
{
	public function execute(Array $parameters = null)
	{
		if($patient = CachingPatientRepository::delete($parameters['id'])) {
			return $this->_success($patient);
		} else {
			$this->_failure();
		}
	}
	
	private function _success(Patient $patient)
	{
		PatientAuditor::deleted($patient);
		return $patient;
	}

	private function _failure()
	{
		throw new \Exception(__('prescription.patient.delete.error'));	
	}
}