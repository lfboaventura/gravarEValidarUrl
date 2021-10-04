<?php
namespace App\Repositories;

use App\Repositories\Contracts\UrlStatusRepositoryInterface;
use App\Models\UrlStatus;

class UrlStatusRepository extends BaseRepository implements UrlStatusRepositoryInterface
{
	public function __construct(urlStatus $model)
	{
		$this->model = $model;
	}
}