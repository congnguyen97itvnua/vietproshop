<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddUserRequest;
use Illuminate\Support\Facades\Hash;
use App\User;
class UserController extends Controller
{
    public function index(){
        $users = User::paginate(2);
        return view('backend.user.listuser',compact('users'));
    }
    public function create(){
       return view('backend.user.adduser');
    }
    public function store(AddUserRequest $request){
        // 'password' => Hash::make($request->newPassword)
        $user = new User;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->full = $request->full_name;
        $user->level = $request->level;

        $user->save();

        return redirect()->route('user.index')->with('success','Thêm người dùng thành công');
    }
    public function edit($id){
        echo "Đây là trang sửa user";
    }
    public function delete($id){
        echo "Đây là trang xóa user";
    }
}
