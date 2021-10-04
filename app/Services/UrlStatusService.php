<?php
namespace App\Services;
/**
*
*/
use \Validator;
use App\Services\Contracts\UrlStatusServiceInterface;
use App\Repositories\Contracts\UrlStatusRepositoryInterface;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;

class UrlStatusService implements UrlStatusServiceInterface
{
	protected $urlStatusRepository;
	protected $dataTableService;

	public function __construct(UrlStatusRepositoryInterface $urlStatusRepository, DataTableService $dataTableService)
	{
		$this->urlStatusRepository = $urlStatusRepository;
		$this->dataTableService = $dataTableService;
	}


	public function save(array $data)
	{
		return $this->urlStatusRepository->create($data);
	}

	public function getList()
	{
		return $this->urlStatusRepository->orderBy('address', 'asc');
	}

	public function getAll()
	{
		return $this->urlStatusRepository->getAll();
	}

	public function all($request)
	{
		
		$columns = array( 
            0 => 'url_statuses.url_id', 
            1 => 'urls.address',
            2 => 'url_statuses.id', 
            3 => 'url_statuses.data',
            4 => 'url_statuses.status',
            5 => 'url_statuses.created_at',
        );

        $columnsSearch = array( 
            0 => 'address',
        );

		$query = DB::table('url_statuses')
		        ->select('url_statuses.url_id','urls.address', 'url_statuses.id', 'url_statuses.data', 'url_statuses.status', 'url_statuses.created_at')
				->join('urls', 'urls.id', '=', 'url_statuses.url_id');
		$query = $this->dataTableService->preparesDataTables($request, $query, $columnsSearch, $columns)->get();
        
		$data = array();

        if(!empty($query))
        {
            foreach ($query as $q)
            {
                $nestedData['url_id']       = $q->url_id;
                $nestedData['address']      = $q->address;
                $nestedData['id']      		= $q->id;
                $nestedData['data']      	= $q->data;
                $nestedData['status']       = $q->status;
                $nestedData['created_at']   = \Carbon\Carbon::parse($q->created_at)->format('d/m/Y  H:i:s'); 
                $data[]                     = $nestedData;
            }
        }

        return $this->dataTableService->getDataTables($request->input('draw'), 
               $this->dataTableService->totalData, 
               $this->dataTableService->totalFiltered, $data);
	}


	public function getCurl($model = null)
	{
		if ( is_null($model)){
			return;
		}

		$client = new Client();
		try {
			$response = $client->request('GET',$model->address);
			$this->save($this->postUrlStatus($model->id, $response));
		} catch (GuzzleHttp\Exception\ClientException $e) {
			dd('ocoeeru um erro');
			$response = $e->getResponse();
			$responseBodyAsString = $response->getBody()->getContents();
			$this->save($this->postUrlStatus($model->id, $responseBodyAsString));
		}		
	}

	public function postUrlStatus($url_id, $response = null ){
		$urlStatus 				= null;
		$urlStatus['status'] 	= $response->getStatusCode() ? $response->getStatusCode() : '404';
		$urlStatus['url_id'] 	= $url_id;
		$urlStatus['data'] 		= $response->getStatusCode() ? ($response->getHeader('Content-Type')[0] . ' - ' . $response->getHeader('Date')[0]) : '404';
		return $urlStatus;
	}


}