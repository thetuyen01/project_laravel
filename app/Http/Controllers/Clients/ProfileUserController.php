<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileUserController extends Controller
{
    public function ShowProfile(){
        if (!Auth::check()){
            return redirect()->route('formlogin')->with('message', 'Please Login');
        }
        $user = Auth::user();
        return view('client.profile_user', ['user'=>$user]);
    }

    public function UpdateProfileUser(Request $request){
        $crpassword = $request->crpassword;
        if(auth()->attempt(array('email' => auth()->user()->email,'password' => trim($crpassword)))){
            if (trim($request->password) != trim($request->cfpassword)){
                return redirect()->back()->with('cfpassword', 'The ConFirmPassword is not correct');
            }
            // validate

            $rules = [
                'email' => 'required|email|unique:users,email,' . auth()->user()->id,
                'name' => 'required|unique:users,name,' . auth()->user()->id,
                'password' => 'required|min:6',
            ];
    
            $message = [
                'required'=> 'Trường :attribute không được để trống',
                'min'=> 'Trường :attribute không nhỏ hơn :min kí tự',
                'unique'=> 'Trường :attribute đã được sử dụng'
            ];
            
            $validator = Validator::make($request->all(), $rules, $message);
    
            
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();          
            }
            // cập nhật vào cơ sở dử liệu
            $user = User::find(auth()->user()->id);

            if ($user) {
                $user->update([
                    'email' => trim($request->email),
                    'name' => trim($request->name),
                    'password' => $request->password ? bcrypt(trim($request->password)) : $user->password,
                    'is_admin' => 0,
                ]);
            }
            
            return redirect()->route('profile')->with('success', 'cập nhật thành công'); 
        }else{
            return redirect()->back()
                ->with('message','Current password mismatch');
        }
    }
}