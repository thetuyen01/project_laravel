<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
                return redirect()->route('admin.home')->with('success', 'Login admin success');
            }else{
                if(!auth()->user()->active){
                    $email  = auth()->user()->email;
                    Auth::logout($request);
                    session()->flash('success', 'Please check mail to activate your account');
                    return view('auth.active_account', ['email' => $email]);
                }
                $intendedUrl = Session::pull('url.intended', '/');
                return redirect()->to($intendedUrl)->with('success', 'Login user success');
            }
        }else{
            return redirect()->back()
                ->with('message','Email-Address And Password Are Wrong.');
        }   
    }

}