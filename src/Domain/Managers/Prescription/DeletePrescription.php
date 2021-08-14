<?php 

namespace Bluesourcery\Prescription\Domain\Managers\Prescription;

use Bluesourcery\Prescription\Models\ErrorMessage;
use Bluesourcery\Prescription\Models\Prescription;
use Bluesourcery\Prescription\Domain\Managers\Manager;
use Bluesourcery\Prescription\Facades\CachingPrescriptionRepository;
use Bluesourcery\Prescription\Events\PrescriptionDeleted;

class DeletePrescription extends Manager
{
	protected function _action($parameters)
	{
		if($result = CachingPrescriptionRepository::delete($parameters['id'])) {
			return $this->_success($result);
		} else {
			throw new \Exception(__('prescription.prescription.delete.error'));	
		}
	}
	
	protected function _success($prescription)
	{
		event(new PrescriptionDeleted($prescription));
		return $prescription;
	}
}