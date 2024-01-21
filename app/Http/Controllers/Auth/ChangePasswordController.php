<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
class ChangePasswordController extends Controller
{
    public function ChangePW(Request $request) {
        $input = $request->all();
        if (trim($input['password'])==trim($input['passwordCF'])){
            if (strlen(trim($input['password'])) < 6) {
                session()->flash('message', 'Password larger than 6 characters');
                return view('auth.password.changepw');
            }

            $userId = session('user_id');
            $user = User::find($userId);
            $user-> password = bcrypt(trim($input['password']));
            $user->save();
            return redirect()->route('formlogin')->with('success','Change password success');
        }else{
            return redirect()->back()->with('message','password mismatch')->with('message','Password not confim password');
        }  
    }

    public function showFormChangePW(){
        $userId = session('user_id');
        if ($userId && is_string($userId) && !empty($userId)) {
            return view('auth.password.changepw');
        } else {
            return redirect()->route('formForget');
        }
    }
}