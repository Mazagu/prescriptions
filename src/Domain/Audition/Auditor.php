<?php 

namespace Bluesourcery\Prescription\Domain\Audition;

abstract class Auditor implements AuditorInterface 
{
	abstract public function created($model);
	abstract public function updated($model);
	abstract public function deleted($model);
}