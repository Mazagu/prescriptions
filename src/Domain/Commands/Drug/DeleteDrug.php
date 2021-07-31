<?php 

namespace Bluesourcery\Prescription\Domain\Commands\Drug;

use Bluesourcery\Prescription\Domain\Commands\CommandInterface;
use Bluesourcery\Prescription\Facades\CachingDrugRepository;

class DeleteDrug implements CommandInterface
{
	public function execute(Array $parameters = null)
	{
		return CachingDrugRepository::delete($parameters['id']);
	}
}