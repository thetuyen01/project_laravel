<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

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
        $soNgauNhien = random_int(100000, 999999);
        // thêm vào cơ sở dử liệu
        $user = User::create([
            'email' => $input['email'],
            'name' => $input['name'],
            'password' => bcrypt($input['password']),
            'reset_code'=> $soNgauNhien,
            'is_admin'=> 0
        ]);
        Mail::send('mail.active_account', ['code' => $soNgauNhien, 'name'=>$user->name], function ($message) use ($user) {
            $message->subject('TheGoiSua - xác nhận tài khoản');
            $message->to($user->email);
            // Các cài đặt khác của thư
        });
        Session::put('email', $user->email);
        session()->flash('success', 'Signup success, please check your email is active account');
        return view('auth.active_account', ['email'=>$user->email]); 
    }

    public function  checkActive(Request $request){
        $user = User::where('email', $request->email)->first();
        if($user){
            if($user->reset_code == $request->code && !empty($request->code)){
                $user->active = true;
                $user->save();
                return redirect()->route('formlogin')->with('success','Register success');
            }
            return redirect()->back()->with('message','code không đúng hoặc không được để trống');
        }
        return redirect()->route('formsignup')->with('message','Please sign up account');
    }

}