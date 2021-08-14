<?php 

namespace Bluesourcery\Prescription\Domain\Managers\Prescription;

use Bluesourcery\Prescription\Domain\Managers\ManagerInterface;
use Bluesourcery\Prescription\Facades\CachingPrescriptionRepository;

class ShowPrescription implements ManagerInterface
{
	public function execute(Array $parameters = null)
	{
		if($prescriptions = CachingPrescriptionRepository::show($parameters['id'])) {
			return $this->_success($prescriptions);
		} else {
			$this->_failure();
		}
	}

	private function _success($prescription)
	{
		return $prescription;
	}

	private function _failure()
	{
		throw new \Exception(__('prescription.prescription.show.error'));
	}
}