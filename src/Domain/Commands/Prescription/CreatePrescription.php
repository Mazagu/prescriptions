<?php 

namespace Bluesourcery\Prescription\Domain\Commands\Prescription;

use Bluesourcery\Prescription\Domain\Commands\CommandInterface;
use Bluesourcery\Prescription\Facades\PrescriptionRepository;

class CreatePrescription implements CommandInterface
{
	public function execute(Array $parameters = null)
	{
		return PrescriptionRepository::create($parameters);		
	}
}