<?php

namespace App\Http\Controllers;
use App\category;
Use Alert;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function AdminLogin()
    {
        Alert::success('Welcome', 'to dashboard');

        return view('admin.dashboard');

    }
    public function AuthSyetemLogin()
    {
        $category = category::where('cat_status',1)->get();
        return view('userAuth.login',['category'=>$category]);
    }
    public function AuthSyetemRegistration()
    {
        return view('userAuth.register');
    }
}
