<?php 

namespace Bluesourcery\Prescription\Domain\Managers\Drug;

use Bluesourcery\Prescription\Models\ErrorMessage;
use Bluesourcery\Prescription\Models\Drug;
use Bluesourcery\Prescription\Domain\Managers\Manager;
use Bluesourcery\Prescription\Facades\CachingDrugRepository;
use Bluesourcery\Prescription\Facades\DrugAuditor;

class CreateDrug extends Manager
{
	protected function _action($parameters)
	{
		if($result = CachingDrugRepository::create($parameters)) {
			return $this->_success($result);
		} else {
			throw new \Exception(__('prescription.drug.create.error'));		
		}
	}
	
	protected function _success($drug)
	{
		DrugAuditor::created($drug);
		return $drug;
	}

}