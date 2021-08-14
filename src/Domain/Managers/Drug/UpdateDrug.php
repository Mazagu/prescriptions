<?php 

namespace Bluesourcery\Prescription\Domain\Managers\Drug;

use Bluesourcery\Prescription\Models\Drug;
use Bluesourcery\Prescription\Domain\Managers\ManagerInterface;
use Bluesourcery\Prescription\Facades\CachingDrugRepository;
use Bluesourcery\Prescription\Facades\DrugAuditor;

class UpdateDrug implements ManagerInterface
{
	public function execute(Array $parameters = null)
	{
		if($drug = CachingDrugRepository::update($parameters)) {
			return $this->_success($drug);
		} else {
			$this->_failure();
		}		
	}
	
	private function _success(Drug $drug)
	{
		DrugAuditor::updated($drug);
		return $drug;
	}

	private function _failure()
	{
		throw new \Exception(__('prescription.drug.update.error'));
	}
}