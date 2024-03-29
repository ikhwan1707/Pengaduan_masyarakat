<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Pengaduan;
use App\Mail\ResetPassword;
use App\Models\Tanggapan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;


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
        if (auth()->attempt(array($fieldType => $input['name'], 'password' => $input['password']))) {
            $level = Auth::user()->level;

            if ($level == 'admin' || $level == 'petugas') {
                return redirect()->intended('dashboard')
                    ->withSuccess('Signed in');
            } else {
                return redirect()->route('dashboardMasyarakat')
                    ->withSuccess('Signed in');
            }
        } else {
            return redirect()->route('login')
                ->with('error', 'Email-Address/Username And Password Are Wrong.');
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

    public function showLinkRequestForm()
    {
        return view('auth.email');
    }


    public function sendResetLinkEmail(Request $request)
    {
        Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        $verify = User::where('email', $request->all()['email'])->exists();

        if ($verify) {
            $verify2 =  DB::table('password_resets')->where([
                ['email', $request->all()['email']]
            ]);

            if ($verify2->exists()) {
                $verify2->delete();
            }

            $token = Str::random(64);

            $password_reset = DB::table('password_resets')->insert([
                'email' => $request->all()['email'],
                'token' =>  $token,
                'created_at' => Carbon::now()
            ]);

            if ($password_reset) {
                Mail::to($request->all()['email'])->send(new ResetPassword(['token' => $token]));

                /* 
                Mail::send('emails.password', ['token' => $token], function($message) use($request){
                    $message->to($request->all()['email']);
                    $message->subject('Reset Password');
                }); */

                /* return new JsonResponse(
                    [
                        'success' => true, 
                        'message' => "Please check your email for a 6 digit pin"
                    ], 
                    200
                ); */

                return redirect('/login')->with('success', 'Silahkan cek alamat email Anda untuk mereset kata sandi Anda.');
            }
        } else {
            return back()->with('error', 'This email does not exist');/* 
            return new JsonResponse(
                [
                    'success' => false, 
                    'message' => "This email does not exist"
                ], 
                400
            ); */
        }
    }

    public function showResetForm($token)
    {
        return view('emails.forget-password-email', ['token' => $token]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('password_resets')
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])
            ->first();

        if (!$updatePassword) {
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $user = User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email' => $request->email])->delete();

        return redirect('/login')->with('message', 'Your password has been changed!');
    }

    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }

    public function dashboard()
    {
        if (Auth::check()) {
            $count_user = User::count();
            $cout_pengaduan = Pengaduan::count();
            $count_tanggapan = Tanggapan::count();
            $count_konfirmasi = Pengaduan::where('status','0')->count();
            $count_proses = Pengaduan::where('status','proses')->count();
            $count_selesai = Pengaduan::where('status','selesai')->count();
            return view('admin.dashboard.welcome', compact('cout_pengaduan', 'count_user','count_tanggapan', 'count_konfirmasi', 'count_proses', 'count_selesai'));
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