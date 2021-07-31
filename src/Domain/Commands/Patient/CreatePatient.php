<?php 

namespace Bluesourcery\Prescription\Domain\Commands\Patient;

use Bluesourcery\Prescription\Domain\Commands\CommandInterface;
use Bluesourcery\Prescription\Facades\PatientRepository;

class CreatePatient implements CommandInterface
{
	public function execute(Array $parameters = null)
	{
		return PatientRepository::create($parameters);		
	}
}