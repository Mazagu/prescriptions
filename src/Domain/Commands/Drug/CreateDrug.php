<?php 

namespace Bluesourcery\Prescription\Domain\Commands\Drug;

use Bluesourcery\Prescription\Domain\Commands\CommandInterface;
use Bluesourcery\Prescription\Facades\DrugRepository;

class CreateDrug implements CommandInterface
{
	public function execute(Array $parameters = null)
	{
		return DrugRepository::create($parameters);		
	}
}