<?php 

namespace Bluesourcery\Prescription\Domain\Repositories\Prescription;

use Bluesourcery\Prescription\Domain\Repositories\RepositoryInterface;
use Bluesourcery\Prescription\Models\Prescription;
use Illuminate\Support\Facades\Cache;

class CachingPrescriptionRepository implements RepositoryInterface
{
	private $prescription;
	private $repository;

	public function __construct(RepositoryInterface $repository)
	{
		$this->prescription = app(Prescription::class);
		$this->repository = $repository;
	}

	public function all()
	{
		return Cache::remember('prescriptions.all', $seconds = 10, function () {
			return $this->repository->all();
        });
	}

	public function create(Array $prescription) 
	{
		return $this->repository->create($prescription);
	}

	public function update(Array $prescription) 
	{
		return $this->repository->update($prescription);
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