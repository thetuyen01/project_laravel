<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class ResetPasswordController extends Controller
{
    public function showFormResetPW(){
        if (auth()->check()) {
            return view('auth.password.restpw');
        } else {
            return redirect()->route('formlogin');
        }
    }

    public function ResetPW(Request $request){
        $input = $request->all();
        if (trim($input['password'])==trim($input['passwordCF'])){
            $user_id = auth()->user()->id;
            $user = User::find($user_id);
            $email = $user->email;
            if (auth()->attempt(array('email' => $email,'password' => trim($input['passwordcu'])))){
                $user-> password = bcrypt(trim($input['password']));
                $user->save();
            }else{
                return redirect()->back()->with('message','password now mismatch');
            }
            return redirect()->route('formlogin')->with('success', 'Rest password success');
        }else{
            return redirect()->back()->with('message','password mismatch');
        }  
    }
}