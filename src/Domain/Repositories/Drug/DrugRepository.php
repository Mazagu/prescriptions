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

	public function update(Array $entity) 
	{
		$drug = $this->drug->find($entity['id']);
		$update = $drug->update(array_filter($entity,
				function($key, $value) {
					return $key != 'id' || !empty($value);
				},
				ARRAY_FILTER_USE_BOTH
			)
		);
		if($update) {
			return $drug;
		} else {
			return false;
		}
	}


	public function delete(int $id) {
		$drug = $this->drug->find($id);
		if($this->drug->where('id', $id)->delete()) {
			return $drug;
		} else {
			return false;
		}
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