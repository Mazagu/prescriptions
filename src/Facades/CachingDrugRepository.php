<?php 

namespace Bluesourcery\Prescription\Facades;

use Illuminate\Support\Facades\Facade;

class CachingDrugRepository extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'cachingDrugRepository';
	}
}