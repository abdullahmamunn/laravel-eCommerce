<?php

namespace App\Http\Controllers;
use App\category;
Use Alert;
use App\SuperAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class AuthController extends Controller
{
    public function AdminLoginForm()
    {

        return view('admin.auth.login');

    }

    public function AdminLoginFormSubmit(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
     $admin = SuperAdmin::where('email',$request->email)->first();

        if ($admin == true)
        {
            Session::put('name',$admin->name);
            Alert::success('Welcome to', 'Admin dashboard');
            return redirect('admin/dashboard');
        }
        else{
            return redirect()->back()->withInput()
                             ->withErrors(['email and password is invalid']);
        }

    }

    public function AdminDashboard()
    {
        return view('admin.dashboard');
    }

    public function AdminLogout()
    {
        Session::flush('name');
        return redirect('admin');
    }

    public function Userlogin()
    {
        //$category = category::where('cat_status',1)->get();
        return view('userAuth.login');
    }
    public function AuthSystemRegistration()
    {
        return view('userAuth.register');
    }
}
