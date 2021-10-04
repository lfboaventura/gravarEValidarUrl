<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BankKey;
use App\Models\Client;
use App\Models\Config;
use App\Services\ItaucriptoService;
use App\Services\UsefullService;
use App\Services\DataTableService;
use Illuminate\Support\Facades\DB;

class BankSlipController extends Controller
{
    private $dataTableService;
    private $usefullService;
    private $itaucriptoService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UsefullService $usefullService, ItaucriptoService $itaucriptoService, DataTableService $dataTableService)
    {
        $this->middleware(['auth' => 'verified']);
        $this->usefullService           = $usefullService;        
        $this->itaucriptoService        = $itaucriptoService;
        $this->dataTableService         = $dataTableService;
        $this->usefullService->modelKey = 'bank_key';
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if ( empty(auth()->user()->client_id) ){
            $this->usefullService->messageToastr('warning', 'Necessário realizar o cadastro de empresa para consulta!');
            return redirect()->route('bankSlip.client');        
        }

        $config         = Config::find(1);
        if ( ( empty($config) ) || ( empty($this->getBankKeysAll()) ) ){
            $this->usefullService->messageToastr('warning', 'Necessário realizar parametrizações chave Itaú, contate Infinity informando mensagem.');
            return redirect()->route('config');        
        }
        
        $cnpjClient     = '24727945000178';
        $client         = Client::find(auth()->user()->client_id);
        $cnpjClient     = $client->getCnpjCpfWithoutMask();
        /*
        $cnpjClient    = DB::table('clients')->select('cnpj_cpf')->where('id',auth()->user()->client_id)->whereNull('deleted_at')->first();
        $cnpjClient    = str_replace('.','',str_replace('/','',str_replace('-','',$cnpjClient->cnpj_cpf)));
        */

        $dadosCripto    = $this->itaucriptoService->geraCripto($config->companyCode341,$cnpjClient,$config->keyBank341);
        $bankKeys = $this->getBankKeysAll();
        //$dadosCripto    = $bankKeys[2];                                                           
        
                                                             
        return view('client.index', compact('dadosCripto'));
    }

    public function getBankKeys(Request $request){
        if ( empty(auth()->user()->client_id) ){
            return response()->json(['status' => 404, 'statusText' => 'Necessário realizar o cadastro de empresa para consulta!']);
        }

        $data = $request->all();
        $id = isset($data['key']) ? ($this->usefullService->encrypt_decrypt($this->usefullService::DECRYPT, $data['key'], $this->usefullService->modelKey)) : null;

        $bankKeys = $this->getBankKeysAll($id);

        if ( empty($bankKeys) ){
            return response()->json(['status' => 404, 'statusText' => 'Necessário realizar parametrizações chave Itaú, contate Infinity informando mensagem.']);
        } else {
            return $bankKeys;
        }
    }

    public function getBankKeysAll($id = null){
        $bankKeys = BankKey::whereNotNull('keyBank341')->whereNotNull('companyCode341');

        if ( !empty($id) ){
            $bankKeys = $bankKeys->where('id','=',$id);
        }

        $bankKeys = $bankKeys->get();

        if ( empty($bankKeys)){
            return null;
        }


        $client         = Client::find(auth()->user()->client_id);
        $cnpjClient     = $client->getCnpjCpfWithoutMask();
        $keys = array();
        foreach ($bankKeys as $k => $value) {
            $keys[$k]   = $this->itaucriptoService->geraCripto($value->companyCode341
                                                               ,$cnpjClient
                                                               ,$value->keyBank341);
        }
        return $keys;

    }

    public function allBankKey(Request $request)
    {
        $query = DB::table('bank_keys')
        ->join('clients','bank_keys.client_id','=','clients.id')
        ->select('bank_keys.id','bank_keys.companyCode341','bank_keys.keyBank341',
                 'clients.name','clients.fantasy','clients.responseble_name','clients.cnpj_cpf', 
                 'clients.typePerson','clients.state', 'clients.city', 'clients.phone', 'clients.cell_phone',
                 'clients.email')
        ->whereNotNull('bank_keys.keyBank341')
        ->whereNotNull('bank_keys.companyCode341')
        ->where('clients.active', true)
        ->whereNull('clients.deleted_at');

        $columns = array( 
            0  => 'action', 
            1  => 'name',
            2  => 'responseble_name',
            3  => 'city',
        );

        $columnsSearch = array( 
            0  => 'name',
            1  => 'fantasy',
            2  => 'responseble_name',
            3  => 'cnpj_cpf',
            4  => 'state',
            5  => 'city',
            6  => 'phone',
            7  => 'cell_phone',
            8  => 'email',
        );

        $query = $this->dataTableService->preparesDataTables($request, $query, $columnsSearch, $columns)->get();

        $data = array();
        if(!empty($query))
        {
            $c = new Client();
            foreach ($query as $q)
            {

                $nestedData['action']           = '<button onclick="printBankSlip(\''.($this->usefullService->encrypt_decrypt($this->usefullService::ENCRYPT, $q->id, $this->usefullService->modelKey)).'\')" type="button" class="btn btn-default btn-xs"><i class="fa fa-print"></i></button>';
                $nestedData['name']             = (!empty($q->name) ? ($q->name . '<br>') : null ) . 
                                                  (!empty($q->fantasy) ? ('Fantasia: '. $q->fantasy . '<br>') : null ) . 
                                                  (!empty($q->cnpj_cpf) ? (($q->typePerson === 'J' ? 'CNPJ: ' : 'CPF: ') . $q->cnpj_cpf . '<br>') : null);
                $nestedData['responseble_name'] = (!empty($q->responseble_name) ? ('Responsável: '. $q->responseble_name . '<br>') : null ) . 
                                                  (!empty($q->phone) ? ('Telefone: '. $q->phone . '<br>') : null ) . 
                                                  (!empty($q->cell_phone) ? ('Celular: '. $q->cell_phone . '<br>') : null) .
                                                  (!empty($q->email) ? ('E-mail: '. $q->email) : null);
                $nestedData['city']             = $q->city .
                                                  (!empty($q->state) ? (' - '. $q->state) : null );
                $data[]                         = $nestedData;
            }
        }
        return $this->dataTableService->getDataTables($request->input('draw'), 
                $this->dataTableService->totalData, 
                $this->dataTableService->totalFiltered, $data);
        
    }

}
