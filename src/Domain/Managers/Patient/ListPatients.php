<?php 

namespace Bluesourcery\Prescription\Domain\Managers\Patient;

use Bluesourcery\Prescription\Models\Patient;
use Bluesourcery\Prescription\Domain\Managers\ManagerInterface;
use Bluesourcery\Prescription\Facades\CachingPatientRepository;
use Bluesourcery\Prescription\Facades\PatientAuditor;

class ListPatients implements ManagerInterface
{
	public function execute(Array $parameters = null)
	{
		if($patients = CachingPatientRepository::all()) {
			return $this->_success($patients);
		} else {
			$this->_failure();
		}
	}
	
	private function _success($patients)
	{
		return $patients;
	}

	private function _failure()
	{
		throw new \Exception(__('prescription.patient.list.error'));	
	}
}