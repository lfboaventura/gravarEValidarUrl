<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserFormRequest;
use  App\Traits\ToastrTrait;

class UserController extends Controller
{
    use ToastrTrait;
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function profile()
    {
        return view('admin.user.profile');
    }
 
    public function profileUpdate(UserFormRequest $request)
    {
        $user = auth()->user();
        
        $data = $request->except(['email']);
        
        if ($data['password'] != null )
        {
            $data['password'] = bcrypt($data['password']);
        } else 
        {
            unset($data['password']);
        }
        
        $update = $user->update($data);
        
        if ($update)
        {
            $this->messageToastr('success', 'Atualização realizada com sucesso!', 5000);
            return redirect()->route('home');
            
        } else
        {
            $this->messageToastr('error', 'Falha ao atualizar o perfil!', 0);
            return redirect()->back();
        }
    }

}
