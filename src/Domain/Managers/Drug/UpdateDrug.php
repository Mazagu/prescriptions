<?php 

namespace Bluesourcery\Prescription\Domain\Managers\Drug;

use Bluesourcery\Prescription\Models\ErrorMessage;
use Bluesourcery\Prescription\Models\Drug;
use Bluesourcery\Prescription\Domain\Managers\Manager;
use Bluesourcery\Prescription\Facades\CachingDrugRepository;
use Bluesourcery\Prescription\Events\DrugUpdated;

class UpdateDrug extends Manager
{
	protected function _action($parameters)
	{
		if($result = CachingDrugRepository::update($parameters)) {
			return $this->_success($result);
		} else {
			throw new \Exception(__('prescription.drug.update.error'));	
		}
	}
	
	protected function _success($drug)
	{
		event(new DrugUpdated($drug));
		return $drug;
	}
}