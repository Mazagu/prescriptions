<?php 

namespace Bluesourcery\Prescription\Domain\Repositories\Patient;

use Bluesourcery\Prescription\Domain\Repositories\RepositoryInterface;
use Bluesourcery\Prescription\Models\Patient;
use Illuminate\Support\Facades\Cache;

class CachingPatientRepository implements RepositoryInterface
{
	private $patient;
	private $repository;

	public function __construct(RepositoryInterface $repository)
	{
		$this->patient = app(Patient::class);
		$this->repository = $repository;
	}

	public function all()
	{
		return Cache::remember('patients.all', $seconds = 10, function () {
			return $this->repository->all();
        });
	}

	public function create(Array $patient) 
	{
		return $this->repository->create($patient);
	}

	public function update(Array $patient) 
	{
		return $this->repository->update($patient);
	}


	public function delete(int $id) {
		return $this->repository->delete($id);
	}

	public function filter(Array $filters) 
	{
		return $this->repository->filter($filters);
	}

	public function show(int $id) 
	{
		return $this->repository->show($id);
	}
}