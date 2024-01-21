<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ForGetPassword;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;


class ForGetPasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showFormForGet(){
        return view('auth.password.forgetpw');
    }

    public function senToEmail(Request $request){
       $email = $request->email;

       $isEmail = User::where('email', $email)->first();
       if ($isEmail){
            $soNgauNhien = random_int(100000, 999999);
            $isEmail->reset_code = $soNgauNhien;
            $isEmail->save();
            Session::put('user_id', $isEmail->id);
            Mail::send('mail.forgetpw', ['reset_code' => $soNgauNhien, 'name'=>$isEmail->name], function ($message) use ($isEmail) {
                $message->subject('TheGoiSua - reset password');
                $message->to($isEmail->email);
                // Các cài đặt khác của thư
            });
            session()->flash('success', 'We have sent the code to email to you, please check the code');
            return view('auth.password.code', ['email'=>$isEmail->email]);
       }else{
            return redirect()->back()->with('message', 'email not exit');  
       }
    }

    public function showFormcode(Request $request){
        $userId = session('user_id');
        if ($userId && is_string($userId) && !empty($userId)) {
            return view('auth.password.code');
        } else {
            return redirect()->route('formForget');
        }
    }
    

    public function checkCode(Request $request)
    {
        $input = $request->all();
        $user = User::where('email', $input['email'])->first();
        if ($user && $user->reset_code == $input['code']) {
            Session::put('user_id', $user->id);
            session()->flash('success', 'Your code is valid, please set a new password');
            return view('auth.password.changepw');
        } else {
            // Mã xác thực không hợp lệ
            session()->flash('message', 'Mã xác thực không đúng');
            return view('auth.password.code', ['email'=>$user->email]);
        }  
    }
    
}