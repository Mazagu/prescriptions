<?php 

namespace Bluesourcery\Prescription\Domain\Commands\Prescription;

use Bluesourcery\Prescription\Domain\Commands\CommandInterface;
use Bluesourcery\Prescription\Facades\CachingPrescriptionRepository;

class FilterPrescriptions implements CommandInterface
{
	public function execute(Array $parameters = null)
	{
		return CachingPrescriptionRepository::filter($parameters);
	}
}