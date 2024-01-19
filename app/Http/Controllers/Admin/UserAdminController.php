<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserAdminController extends Controller
{
    public function get_list_users() {
        $users = User::all();
        return view('admin.user.list_user', ['users' => $users]);
    }

    public function add_user(Request $request){
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
        //thêm vào cơ sở dử liệu
        $user = User::create([
            'email' => $input['email'],
            'name' => $input['name'],
            'password' => bcrypt($input['password']),
            'is_admin'=> (int)$request->is_admin,
            'active'=>$request->active? (int)$request->active:0
        ]);
        return redirect()->route('admin.list_user')->with('success', 'Create success');
    }

    public function show_edit($id){
        $user = User::find($id);
        if($user){
            return view('admin.user.edit_user', ['user'=>$user]);
        }

        return redirect()->back()->with('message', 'User not exit');
        
    }

    public function update(Request $request,$id){
        $user = User::find($id);
        if (trim($request->password) != trim($request->cfpassword)){
            return redirect()->back()->with('cfpassword', 'The ConFirmPassword is not correct');
        }
        // validate
        $rules = [
            'email' => 'required|email|unique:users,email,' . $user->id,
            'name' => 'required|unique:users,name,' . $user->id,
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
        $isChecked = $request->active !== null ? 1 : 0;
        
        //thêm vào cơ sở dử liệu
        $user ->update([
            'email' => $input['email'],
            'name' => $input['name'],
            'password' => bcrypt($input['password']),
            'is_admin'=> (int)$request->is_admin,
            'active'=>$isChecked
        ]);
        return redirect()->route('admin.list_user')->with('success', 'update success');
    }

    public function delete($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.list_user')->with('success', 'delete success');
    }
}