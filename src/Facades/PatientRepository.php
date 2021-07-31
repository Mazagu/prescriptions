<?php 

namespace Bluesourcery\Prescription\Facades;

use Illuminate\Support\Facades\Facade;

class PatientRepository extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'patientRepository';
	}
}