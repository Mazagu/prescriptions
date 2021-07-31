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

	public function update(int $id, Array $prescription) 
	{
		return $this->prescription->find($id)->update($prescription);
	}


	public function delete(int $id) {
		return $this->prescription->where('id', $id)->delete();
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