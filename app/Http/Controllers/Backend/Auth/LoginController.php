<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Auth;
class LoginController extends Controller
{
    public function login(){
        return view('backend.login');
    }
    public function postLogin(LoginRequest $request){
        $email = $request->email;
        $password = $request->password;

       if( Auth::attempt(['email' => $email, 'password' => $password])){
           return redirect()->route('admin.index');
       }else{
           return redirect()->back()->with('thong-bao','Email hoặc mật khẩu không đúng')->withInput();
       }
    }


}
