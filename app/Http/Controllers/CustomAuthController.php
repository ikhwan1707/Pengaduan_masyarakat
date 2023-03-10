<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\User;

class CustomAuthController extends Controller
{
    
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $input = $request->all();
  
        $this->validate($request, [
            'name' => 'required',
            'password' => 'required',
        ]);
  
        $fieldType = filter_var($request->name, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
        if(auth()->attempt(array($fieldType => $input['name'], 'password' => $input['password'])))
        {
            $level = Auth::user()->level;
            
            if ($level == 'admin' || $level == 'petugas') {
                return redirect()->intended('dashboard')
                        ->withSuccess('Signed in');
            } else{
                return redirect()->route('dashboardMasyarakat')
                        ->withSuccess('Signed in');
            }
        }else{
            return redirect()->route('login')
                ->with('error','Email-Address/Username And Password Are Wrong.');
        }
    }

    public function showRegistrationForm()
    {
        return view('auth.registration');
    }

    public function register(Request $request)
    {
       
        /* $request->validate([
            'name'          => 'required',
            'email'         => 'required|email|unique:users',
            'password'      => 'required|min:6|confirmed',
            'no_handphone'  => 'required|min:12'
        ]); */
           
        $data = $request->all();
        
        User::create([
            'nik'           => $data['nik'],
            'firstname'     => $data['firstname'],
            'lasttname'     => $data['lasttname'],
            'name'          => $data['name'],
            'email'         => $data['email'],
            'password'      => bcrypt($data['password']),
            'no_handphone'  => $data['no_handphone']
        ]);

        return redirect("dashboard")->withSuccess('You have signed-in');
    }

    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }

    public function dashboard()
    {
        if(Auth::check()){
            return view('admin.dashboard.welcome');
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    /* public function dashboardMasyarakat()
    {
        if(Auth::check()){
            return view('masyarakat.index');
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    } */
}
