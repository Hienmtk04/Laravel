<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('login');
    }

    public function doLogin(Request $request)
    {
        $credentials = [
            'password' => $request->password
        ];
        if (filter_var($request->username, FILTER_VALIDATE_EMAIL)) {
            $credentials['email'] = $request->email;
        } else {
            $credentials['username'] = $request->username;
        }

        if (Auth::attempt($credentials)) {
            return redirect()->route('site.home');
        } else {
            return redirect()->route('website.getlogin')->with('message', 'Đăng nhập không thành công!');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('site.home');
    }
}
