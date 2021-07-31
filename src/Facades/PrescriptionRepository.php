<?php 

namespace Bluesourcery\Prescription\Facades;

use Illuminate\Support\Facades\Facade;

class PrescriptionRepository extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'prescriptionRepository';
	}
}