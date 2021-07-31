<?php 

namespace Bluesourcery\Prescription\Domain\Commands;

interface CommandInterface
{
	public function execute(Array $parameters);
}