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

	public function update(Array $drug) 
	{
		return $this->drug->find($drug['id'])->update(array_filter($drug,
				function($key, $value) {
					return $key != 'id' || !empty($value);
				},
				ARRAY_FILTER_USE_BOTH
			)
		);
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