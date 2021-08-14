<?php 

namespace Bluesourcery\Prescription\Domain\Managers;

interface ManagerInterface
{
	public function execute(Array $parameters);
}