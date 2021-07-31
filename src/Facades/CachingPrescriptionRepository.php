<?php 

namespace Bluesourcery\Prescription\Facades;

use Illuminate\Support\Facades\Facade;

class CachingPrescriptionRepository extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'cachingPrescriptionRepository';
	}
}