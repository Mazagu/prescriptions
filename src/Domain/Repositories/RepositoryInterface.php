<?php 

namespace Bluesourcery\Prescription\Domain\Repositories;

interface RepositoryInterface
{
	public function all();
	public function create(Array $patient);
	public function update(int $id, Array $patient);
	public function delete(int $id);
	public function filter(Array $filters);
	public function show(int $id);
}