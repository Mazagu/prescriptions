<?php 

namespace Bluesourcery\Prescription\Facades;

use Illuminate\Support\Facades\Facade;

class DrugAuditor extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'drugAuditor';
	}
}