<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\ToastrTrait;
use App\Services\Contracts\UrlServiceInterface;

class UrlController extends Controller
{

    use ToastrTrait;
    protected $urlService;
    
    public function __construct(UrlServiceInterface $urlService)
    {
        $this->middleware('auth');
        $this->urlService = $urlService;
    }


    public function all(Request $request)
    {
        // return abort(500);
        return $this->urlService->all($request);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.url.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.url.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $result = $this->urlService->save($request->except(['_token', '_method']));

        if ($result === true) 
        {
            $this->messageToastr('success', 'Endereço url salva com sucesso!', 5000);
            return redirect()->route('url.create');
        }

        $this->messageValidator($result);
        return redirect()->route('url.create')->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('client.show')->with([
            'client' => $this->clientService->getUrl($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.url.create')->with([
            'url' => $this->urlService->getUrl($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $result = $this->urlService->update($request->except(['_token', '_method']), $id);

        if ($result === true) 
        {
            $this->messageToastr('success', 'Url alterada com sucesso!', 5000);
            return redirect()->route('url.edit', $id);
        }
        $this->messageValidator($result);
        return redirect()->route('url.edit', $id)->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->urlService->delete($id);
        if ($result === true)
        {
            $this->messageToastr('success', 'Url exscluída com sucesso!', 5000);
            return redirect()->route('url.index');
        }
        $this->messageValidator($result);
        return redirect()->route('url.show',$id);        
    }
    
}
