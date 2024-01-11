<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showFormLogin(){
        return view('auth.login');
    }

    public function login(Request $request){
        $input = $request->all();

        $this->validate($request, [
            'email'=> 'required | email',
            'password'=> 'required'
        ]);

        if (auth()->attempt(array('email' => $input['email'],'password' => $input['password']))){
            if (auth()->user()->is_admin == 1){
                return redirect()->route('admin.home')->with('message', 'Login admin success');
            }else{
                return redirect()->route('home')->with('message', 'Login user success');
            }
        }else{
            return redirect()->back()
                ->with('message','Email-Address And Password Are Wrong.');
        }   
    }
}