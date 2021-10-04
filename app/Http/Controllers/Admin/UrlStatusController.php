<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Contracts\UrlStatusServiceInterface;

use App\Traits\GetUrlStatusTrait;

class UrlStatusController extends Controller
{
    use GetUrlStatusTrait;

    protected $urlStatusService;

    public function __construct(UrlStatusServiceInterface $urlStatusService)
    {
        $this->middleware('auth');
        $this->urlStatusService = $urlStatusService;
    }

    public function all(Request $request)
    {
        // return abort(500);
        return $this->urlStatusService->all($request);
    }

    public function index()
    {
        return view('admin.urlStatus.index');
    }

    public function store(array $data)
    {

        $result = $this->urlStatusService->save($data);

        if ($result === true) 
        {
            return true;
        }

        return false;

    }

    public function getList()
    {
        $this->getStatus();
        return response()->json(['status' => 200]);
    }
}
