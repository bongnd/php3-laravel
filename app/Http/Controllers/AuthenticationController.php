<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthenticationController
{
    public function login()
    {
        return view('login'); // resources/views/login.blade.php
    }
    public function postLogin(Request $request)
    {
        $dataUserLogin=[
            'email' => $request->email,
            'password' => $request->password,
        ];
        $remember = $request->has('remember') ;
        if(Auth::attempt($dataUserLogin)){
            //logout các tài khoản khác
            // Session::where('user_id', Auth::id())->delete();
            // //tạo session mới
            // session(['user_id' => Auth::id()]);
            if(Auth::user()->role == 'admin'){
                return redirect()->route('admin.dashboard')->with([
                    'message'=>'Đăng nhập thành công'
                ]);
            }
            else{
               echo'Bạn đăng nhập thành công trang user';
            }
            
        }
        else{
            return redirect()->back()->with([
                'message'=>'Email hoặc mật khẩu không đúng']);
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with([
            'message'=>'Đăng xuất thành công'
        ]);
    }
    public function register()
    {
        return view('register'); // resources/views/register.blade.php
    }
    public function postRegister(Request $request)
    {
       $check = User::where('email', $request->email)->exists();
       if($check){
            return redirect()->back()->with([
                'message'=>'Email đã tồn tại'
            ]);
       }
       else{
            $data=[
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                
            ];
            $newUser = User::create($data);
            // if($newUser){
            //     return redirect()->route('login')->with([
            //         'message'=>'Đăng ký thành công'
            //     ]);
            // }
            // else{
            //     return redirect()->back()->with([
            //         'message'=>'Đăng ký không thành công'
            //     ]);
            // }
            Auth::login($newUser);
            return redirect()->route('admin.dashboard')->with([
                'message'=>'Đăng ký thành công'
            ]);
       }
    }
}
