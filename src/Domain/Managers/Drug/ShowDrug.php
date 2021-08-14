<?php 

namespace Bluesourcery\Prescription\Domain\Managers\Drug;

use Bluesourcery\Prescription\Models\ErrorMessage;
use Bluesourcery\Prescription\Domain\Managers\Manager;
use Bluesourcery\Prescription\Facades\CachingDrugRepository;

class ShowDrug extends Manager
{	
	protected function _action($parameters)
	{
		if($result = CachingDrugRepository::show($parameters['id'])) {
			return $this->_success($result);
		} else {
			throw new \Exception(__('prescription.drug.show.error'));	
		}
	}
	
	protected function _success($drug)
	{
		return $drug;
	}
}