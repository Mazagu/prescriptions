<?php 

namespace Bluesourcery\Prescription\Facades;

use Illuminate\Support\Facades\Facade;

class PatientAuditor extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'patientAuditor';
	}
}