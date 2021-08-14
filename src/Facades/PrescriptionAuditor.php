<?php 

namespace Bluesourcery\Prescription\Facades;

use Illuminate\Support\Facades\Facade;

class PrescriptionAuditor extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'prescriptionAuditor';
	}
}