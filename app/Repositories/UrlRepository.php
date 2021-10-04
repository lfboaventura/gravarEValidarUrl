<?php
namespace App\Repositories;

use App\Repositories\Contracts\UrlRepositoryInterface;
use App\Models\Url;

class UrlRepository extends BaseRepository implements UrlRepositoryInterface
{
	public function __construct(url $model)
	{
		$this->model = $model;
	}
}