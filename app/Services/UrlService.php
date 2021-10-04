<?php
namespace App\Services;
/**
*
*/
use \Validator;
use App\Services\Contracts\UrlServiceInterface;
use App\Repositories\Contracts\UrlRepositoryInterface;
use Illuminate\Support\Facades\DB;

class UrlService implements UrlServiceInterface
{
	protected $urlRepository;
	protected $dataTableService;

	public function __construct(UrlRepositoryInterface $urlRepository, DataTableService $dataTableService)
	{
		$this->urlRepository = $urlRepository;
		$this->dataTableService = $dataTableService;
	}

	public function save(array $data)
	{
		return $this->update($data);
	}

	public function update(array $data, $id = null)
	{
		$validator = Validator::make($data, [
			// 'address' => 'required|url',
			'address' => ['required','regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i'],
        ],[],[
            'address' => 'endereço da url',
        ]);
		if ($validator->fails()) {
			return $validator->errors()->all();
		}
		if ( is_null($id) ){
			$this->urlRepository->create($data);
		}
		else {
			$this->urlRepository->update($data, $id);
		}

		return true;
	}

	public function getList()
	{
		return $this->urlRepository->orderBy('address', 'asc')->paginate(5);
	}

	public function getAll()
	{
		return $this->urlRepository->getAll();
	}

	public function getUrl($id)
	{
		return $this->urlRepository->find($id);
	}

	public function delete($id)
	{
		return $this->urlRepository->delete($id);
	}

	public function all($request)
	{
		
		$columns = array( 
            0 => 'action', 
            1 => 'id', 
            2 => 'address',
        );

        $columnsSearch = array( 
            0 => 'address',
        );

		$query = DB::table('urls')->select('id','address');
		$query = $this->dataTableService->preparesDataTables($request, $query, $columnsSearch, $columns)->get();
        
		$data = array();

        if(!empty($query))
        {
            foreach ($query as $q)
            {
                $nestedData['action']       = $this->dataTableService->addColumnsActionDataTables($q, $q->address, false, 'url', 'Url');
                $nestedData['id']           = $q->id;
                $nestedData['address']      = $q->address;
                $data[]                     = $nestedData;

            }
        }

        return $this->dataTableService->getDataTables($request->input('draw'), 
               $this->dataTableService->totalData, 
               $this->dataTableService->totalFiltered, $data);
	}
}