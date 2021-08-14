<?php 

namespace Bluesourcery\Prescription\Domain\Managers;

use Bluesourcery\Prescription\Models\ErrorMessage;

abstract class Manager implements ManagerInterface
{
	private $errorMessage;

	public function __construct(ErrorMessage $errorMessage)
	{
		$this->errorMessage = $errorMessage;
	}

		public function execute(Array $parameters = null)
	{
		try {
			return $this->_action($parameters);
		} catch(\Exception $e) {
			$this->errorMessage->error = $e->getMessage();
			return $this->_failure();
		}		
	}

	abstract protected function _action($parameters);
	abstract protected function _success($model);

	protected function _failure()
	{
		return $this->errorMessage;
	}
}