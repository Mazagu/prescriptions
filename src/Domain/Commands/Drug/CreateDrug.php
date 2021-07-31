<?php 

namespace Bluesourcery\Prescription\Domain\Commands\Drug;

use Bluesourcery\Prescription\Domain\Commands\CommandInterface;
use Bluesourcery\Prescription\Facades\CachingDrugRepository;

class CreateDrug implements CommandInterface
{
	public function execute(Array $parameters = null)
	{
		return CachingDrugRepository::create($parameters);		
	}
}