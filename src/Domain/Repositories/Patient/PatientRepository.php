<?php 

namespace Bluesourcery\Prescription\Domain\Repositories\Patient;

use Bluesourcery\Prescription\Domain\Repositories\RepositoryInterface;
use Bluesourcery\Prescription\Models\Patient;

class PatientRepository implements RepositoryInterface
{
	private $patient;

	public function __construct()
	{
		$this->patient = app(Patient::class);
	}

	public function all()
	{
		return $this->patient->get();
	}

	public function create(Array $patient) 
	{
		return $this->patient->create($patient);
	}

	public function update(int $id, Array $patient) 
	{
		return $this->patient->find($id)->update($patient);
	}


	public function delete(int $id) {
		return $this->patient->where('id', $id)->delete();
	}

	public function filter(Array $filters) 
	{
		return $this->patient->where('name', $filters['name'])
            ->orWhere('lastname', $filters['lastname'])
            ->orWhere('id_card', $filters['id_card'])
            ->get();
	}

	public function show(int $id) 
	{
		return $this->patient->find($id);
	}
}