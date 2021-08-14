<?php 

namespace Bluesourcery\Prescription\Domain\Audition;

interface AuditorInterface 
{
	public function created($model);
	public function updated($model);
	public function deleted($model);
}