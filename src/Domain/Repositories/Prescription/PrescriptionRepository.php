<?php 

namespace Bluesourcery\Prescription\Domain\Repositories\Prescription;

use Bluesourcery\Prescription\Domain\Repositories\RepositoryInterface;
use Bluesourcery\Prescription\Models\Prescription;

class PrescriptionRepository implements RepositoryInterface
{
	private $prescription;

	public function __construct()
	{
		$this->prescription = app(Prescription::class);
	}

	public function all()
	{
		return $this->prescription->get();
	}

	public function create(Array $prescription) 
	{
		return $this->prescription->create($prescription);
	}

	public function update(Array $entity) 
	{
		$prescription = $this->prescription->find($entity['id']);
		$update = $prescription->update(array_filter($entity,
				function($key, $value) {
					return $key != 'id' || !empty($value);
				},
				ARRAY_FILTER_USE_BOTH
			)
		);
		if($update) {
			return $prescription;
		} else {
			return false;
		}
	}

	public function delete(int $id) {
		$prescription = $this->prescription->find($id);
		if($this->prescription->where('id', $id)->delete()) {
			return $prescription;
		} else {
			return false;
		}
	}

	public function filter(Array $filters) 
	{
		return $this->prescription->where('patient_id', $filters['patient_id'])->get();
	}

	public function show(int $id) 
	{
		return $this->prescription->find($id);
	}
}