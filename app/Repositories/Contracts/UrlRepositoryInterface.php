<?php
namespace App\Repositories\Contracts;
/**
* 
*/
interface UrlRepositoryInterface
{
	public function find($id);
	public function paginate($pages);
	public function create(array $data);
	public function update(array $data, $id);
	public function getAll();
}