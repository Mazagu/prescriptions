<?php 

namespace Bluesourcery\Prescription\Domain\Managers\Prescription;

use Bluesourcery\Prescription\Models\ErrorMessage;
use Bluesourcery\Prescription\Models\Prescription;
use Bluesourcery\Prescription\Domain\Managers\Manager;
use Bluesourcery\Prescription\Facades\CachingPrescriptionRepository;
use Bluesourcery\Prescription\Events\PrescriptionUpdated;

class UpdatePrescription extends Manager
{
	protected function _action($parameters)
	{
		if($result = CachingPrescriptionRepository::update($parameters)) {
			return $this->_success($result);
		} else {
			throw new \Exception(__('prescription.prescription.update.error'));	
		}
	}

	protected function _success($prescription)
	{
		event(new PrescriptionUpdated($prescription));
		return $prescription;
	}
}