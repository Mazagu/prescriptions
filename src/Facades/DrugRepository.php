<?php 

namespace Bluesourcery\Prescription\Facades;

use Illuminate\Support\Facades\Facade;

class DrugRepository extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'drugRepository';
	}
}