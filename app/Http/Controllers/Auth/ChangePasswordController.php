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
            // validate
            $rules = [
                'password' => 'required|min:6',
            ];

            $message = [
                'required'=> 'Trường :attribute không được để trống',
                'min'=> 'Trường :attribute không nhỏ hơn :min kí tự'
            ];
            
            $validator = Validator::make($request->all(), $rules, $message);

        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();          
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