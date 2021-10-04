<?php
namespace App\Services\Contracts;
/**
* 
*/

interface UrlStatusServiceInterface
{
	public function save(array $data);
	public function getList();
	public function all($request);
}