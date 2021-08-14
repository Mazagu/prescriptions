<?php 

namespace Bluesourcery\Prescription\Domain\Managers\Drug;

use Bluesourcery\Prescription\Domain\Managers\ManagerInterface;
use Bluesourcery\Prescription\Facades\CachingDrugRepository;

class ListDrugs implements ManagerInterface
{
	public function execute(Array $parameters = null)
	{
		if($drugs = CachingDrugRepository::all()) {
			return $this->_success($drugs);
		} else {
			return false;
		}
	}
	
	private function _success($drugs)
	{
		return $drugs;
	}

	private function _failure()
	{
		throw new \Exception(__('prescription.drug.list.error'));
	}
}