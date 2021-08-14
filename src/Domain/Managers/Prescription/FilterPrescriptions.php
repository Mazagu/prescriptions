<?php 

namespace Bluesourcery\Prescription\Domain\Managers\Prescription;

use Bluesourcery\Prescription\Models\ErrorMessage;
use Bluesourcery\Prescription\Domain\Managers\Manager;
use Bluesourcery\Prescription\Facades\CachingPrescriptionRepository;

class FilterPrescriptions extends Manager
{
	protected function _action($parameters)
	{
		if($result = CachingPrescriptionRepository::filter($parameters)) {
			return $this->_success($result);
		} else {
			throw new \Exception(__('prescription.prescription.list.error'));	
		}
	}

	protected function _success($prescriptions)
	{
		return $prescriptions;
	}
}