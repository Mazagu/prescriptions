<?php 

namespace Bluesourcery\Prescription\Domain\Managers\Drug;

use Bluesourcery\Prescription\Domain\Managers\ManagerInterface;
use Bluesourcery\Prescription\Facades\CachingDrugRepository;

class ShowDrug implements ManagerInterface
{	
	public function execute(Array $parameters = null)
	{
		if($drug = CachingDrugRepository::show($parameters['id'])) {
			return $this->_success($drug);
		} else {
			return false;
		}
	}
	
	private function _success($drug)
	{
		return $drug;
	}

	private function _failure()
	{
		throw new \Exception(__('prescription.drug.show.error'));
	}
}