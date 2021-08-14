<?php 

namespace Bluesourcery\Prescription\Domain\Managers\Drug;

use Bluesourcery\Prescription\Models\ErrorMessage;
use Bluesourcery\Prescription\Domain\Managers\Manager;
use Bluesourcery\Prescription\Facades\CachingDrugRepository;

class ListDrugs extends Manager
{
	protected function _action($parameters)
	{
		if($result = CachingDrugRepository::all()) {
			return $this->_success($result);
		} else {
			throw new \Exception(__('prescription.drug.list.error'));	
		}
	}
	
	protected function _success($drugs)
	{
		return $drugs;
	}
}