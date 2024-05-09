<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    use RegistersUsers;

    // protected $redirectTo = RouteServiceProvider::HOME;

    public function index()
    {
        if (!Auth::user()) {
            return view('auth.register');
        } else {
            if (Auth::user()->type_user == 'ADMINISTRATOR') {
                return redirect()
                    ->route('dashboardPage:admin')
                    ->with('success', 'Anda Sudah Register! '.Auth::user()->name);
            } else if (Auth::user()->type_user == 'PEMILIK_GEDUNG') {
                return redirect()
                    ->route('dashboardPage:owner')
                    ->with('success', 'Anda Sudah Register! '.Auth::user()->name);
            } else if (Auth::user()->type_user == 'CUSTOMER' ) {
                return redirect()
                    ->route('homePage:user')
                    ->with('success', 'Anda Sudah Register! '.Auth::user()->name);
            }
        }
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'user_email' => 'required',
            'user_password' => 'required',
            'user_name' => 'required',
            'user_phone' => 'required',
        ]);
        $newEmail = Str::lower($validated['user_email']);
        $newName = Str::title($validated['user_name']);
        $validated['user_password'] = Hash::make($validated['user_password']);
        $userCheck = DB::table('users')->where('email', $newEmail)->first();
        if (!$userCheck) {
            $newDataUser = DB::table('users')
                ->insertGetId([
                    'name' => $newName,
                    'phone' => $validated['user_phone'],
                    'type_user' => $request->has('user_customer') ? 'CUSTOMER' : 'PEMILIK_GEDUNG',
                    'status' => 1,
                    'email' => $newEmail,
                    'password' => $validated['user_password'],
                    'profile' => null,
                    'created_by' => 1,
                    'created_at' => Carbon::now(),
                    'updated_by' => 1,
                    'updated_at' => Carbon::now(),
                ]);
            if($newDataUser) {
                DB::table('users')
                    ->where('id', $newDataUser)
                    ->update([
                        'created_by' => $newDataUser,
                        'updated_by' => $newDataUser,
                    ]);
                DB::table('histories')
                    ->insert([
                        'name_history' => 'Register',
                        'content_history' => 'Pendaftaran Akun berhasil',
                        'alert_history' => 'success',
                        'action_history' => 'user-add',
                        'status' => 1,
                        'created_by' => $newDataUser,
                        'created_at' => Carbon::now(),
                        'updated_by' => $newDataUser,
                        'updated_at' => Carbon::now(),
                    ]);
                return redirect()->route('login')->with('success', 'Register berhasil, silahkan login dengan akun yang telah diregistrasi.');
            }
        } else {
            return redirect()->route('register')->with('danger', 'Email sudah terdaftar, mohon login dengan akun email lama Anda.');
        }
    }
}
