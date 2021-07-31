<?php 

namespace Bluesourcery\Prescription\Domain\Repositories\Drug;

use Bluesourcery\Prescription\Domain\Repositories\RepositoryInterface;
use Bluesourcery\Prescription\Models\Drug;

class DrugRepository implements RepositoryInterface
{
	private $drug;

	public function __construct()
	{
		$this->drug = app(Drug::class);
	}

	public function all()
	{
		return $this->drug->get();
	}

	public function create(Array $drug) 
	{
		return $this->drug->create($drug);
	}

	public function update(int $id, Array $drug) 
	{
		return $this->drug->find($id)->update($drug);
	}


	public function delete(int $id) {
		return $this->drug->where('id', $id)->delete();
	}

	public function filter(Array $filters) 
	{
		return $this->drug->where('prescription_id', $filters['prescription_id'])->get();
	}

	public function show(int $id) 
	{
		return $this->drug->find($id);
	}
}