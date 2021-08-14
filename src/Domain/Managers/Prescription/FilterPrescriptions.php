<?php 

namespace Bluesourcery\Prescription\Domain\Managers\Prescription;

use Bluesourcery\Prescription\Domain\Managers\ManagerInterface;
use Bluesourcery\Prescription\Facades\CachingPrescriptionRepository;

class FilterPrescriptions implements ManagerInterface
{
	public function execute(Array $parameters = null)
	{
		if($prescriptions = CachingPrescriptionRepository::filter($parameters)) {
			return $this->_success($prescriptions);
		} else {
			$this->_failure();
		}
	}

	private function _success($prescriptions)
	{
		return $prescriptions;
	}

	private function _failure()
	{
		throw new \Exception(__('prescription.prescription.list.error'));
	}
}