<?php 

namespace Bluesourcery\Prescription\Domain\Managers\Drug;

use Bluesourcery\Prescription\Models\ErrorMessage;
use Bluesourcery\Prescription\Models\Drug;
use Bluesourcery\Prescription\Domain\Managers\Manager;
use Bluesourcery\Prescription\Facades\CachingDrugRepository;
use Bluesourcery\Prescription\Facades\DrugAuditor;

class DeleteDrug extends Manager
{
	protected function _action($parameters)
	{
		if($result = CachingDrugRepository::delete($parameters['id'])) {
			return $this->_success($result);
		} else {
			throw new \Exception(__('prescription.drug.delete.error'));			
		}
	}
	
	protected function _success($drug)
	{
		DrugAuditor::deleted($drug);
		return $drug;
	}
}