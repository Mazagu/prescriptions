<?php 

namespace Bluesourcery\Prescription\Domain\Managers\Prescription;

use Bluesourcery\Prescription\Models\ErrorMessage;
use Bluesourcery\Prescription\Domain\Managers\Manager;
use Bluesourcery\Prescription\Facades\CachingPrescriptionRepository;

class ShowPrescription extends Manager
{
	protected function _action($parameters)
	{
		if($result = CachingPrescriptionRepository::show($parameters['id'])) {
			return $this->_success($result);
		} else {
			throw new \Exception(__('prescription.prescription.show.error'));	
		}
	}

	protected function _success($prescription)
	{
		return $prescription;
	}
}