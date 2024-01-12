<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showFormSignup(){
        return view('auth.signup');
    }

    public function signup(Request $request)
    {
        if (trim($request->password) != trim($request->cfpassword)){
            return redirect()->back()->with('cfpassword', 'The ConFirmPassword is not correct');
        }
        // validate
        $rules = [
            'email' => 'required|email|unique:users,email',
            'name' => 'required|unique:users,name',
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

        // Validation passed, continue processing

        $input = $request->all();
       
        // thêm vào cơ sở dử liệu
        $user = User::create([
            'email' => $input['email'],
            'name' => $input['name'],
            'password' => bcrypt($input['password']),
            'is_admin'=> 0
        ]);
        
        return redirect()->route('formlogin')->with('success', 'register success'); // Redirect after successful signup
    }
}