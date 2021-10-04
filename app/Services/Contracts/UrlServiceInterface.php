<?php
namespace App\Services\Contracts;
/**
* 
*/

interface UrlServiceInterface
{
	public function save(array $data);
	public function update(array $data, $id);
	public function getList();
	public function getUrl($id);
	public function all($request);
}