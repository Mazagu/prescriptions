<?php 

namespace Bluesourcery\Prescription\Domain\Repositories\Drug;

use Bluesourcery\Prescription\Domain\Repositories\RepositoryInterface;
use Bluesourcery\Prescription\Models\Drug;
use Illuminate\Support\Facades\Cache;

class CachingDrugRepository implements RepositoryInterface
{
	private $drug;
	private $repository;

	public function __construct(RepositoryInterface $repository)
	{
		$this->drug = app(Drug::class);
		$this->repository = $repository;
	}

	public function all()
	{
		return Cache::remember('drugs.all', $seconds = 10, function () {
			return $this->repository->all();
        });
	}

	public function create(Array $drug) 
	{
		return $this->repository->create($drug);
	}

	public function update(Array $drug) 
	{
		return $this->repository->update($drug);
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