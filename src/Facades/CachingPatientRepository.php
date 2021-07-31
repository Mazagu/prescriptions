<?php 

namespace Bluesourcery\Prescription\Facades;

use Illuminate\Support\Facades\Facade;

class CachingPatientRepository extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'cachingPatientRepository';
	}
}