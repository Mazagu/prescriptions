<?php 

namespace Bluesourcery\Prescription\Domain\Managers\Prescription;

use Bluesourcery\Prescription\Models\Prescription;
use Bluesourcery\Prescription\Domain\Managers\ManagerInterface;
use Bluesourcery\Prescription\Facades\CachingPrescriptionRepository;
use Bluesourcery\Prescription\Facades\PrescriptionAuditor;

class CreatePrescription implements ManagerInterface
{
	public function execute(Array $parameters = null)
	{
		if($prescription = CachingPrescriptionRepository::create($parameters)) {
			return $this->_success($prescription);
		} else {
			$this->_failure();
		}	
	}

	private function _success(Prescription $prescription)
	{
		PrescriptionAuditor::created($prescription);
		return $prescription;
	}

	private function _failure()
	{
		throw new \Exception(__('prescription.prescription.create.error'));
	}
}