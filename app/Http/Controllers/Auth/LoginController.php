<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function index()
    {
        if (Auth::check() && Auth::user()->type_user == 'ADMINISTRATOR') {
            return redirect()
                ->route('dashboardPage:admin')
                ->with('info', 'Anda Sudah Login! '.Auth::user()->name);
        } else if (Auth::check() && Auth::user()->type_user == 'PEMILIK_GEDUNG') {
            return redirect()
                ->route('dashboardPage:owner')
                ->with('info', 'Anda Sudah Login! '.Auth::user()->name);
        } else if (Auth::check() && Auth::user()->type_user == 'CUSTOMER' ) {
            return redirect()
                ->route('homePage:user')
                ->with('info', 'Anda Sudah Login! '.Auth::user()->name);
        } else if (Auth::check() && Auth::user()->type_user == 'ADMIN_ENTRY') {
            return redirect()
                ->route('dashboardPage:admin-entry')
                ->with('info', 'Anda Sudah Login! '.Auth::user()->name);
        } else if (!Auth::check() || !Auth::user()) {
            return view('auth.login');
        }
    }

    public function login(Request $request) {
        try {
            $remember = $request->has('remember') ? true : false;
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);
            $user = DB::table('users')
                ->where('email', $credentials['email'])
                ->first();
            if (!$user || !Hash::check($credentials['password'], $user->password)) {
                return redirect()->route('login')->with('error', 'Maaf, mungkin Email atau Password Anda salah, mohon ulangi sekali lagi.');
            }
            if ($user->status == 0) {
                return redirect()->route('login')->with('info', 'Akun Anda masih belum aktif, mohon hubungi Admin segera.');
            }
            if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']], $remember)) {
                $request->session()->regenerate();
                DB::table('histories')->insert([
                    'id_transaction' => 0,
                    'name_history' => 'Login',
                    'content_history' => 'Login berhasil',
                    'alert_history' => 'success',
                    'action_history' => 'user-check',
                    'status' => 1,
                    'created_by' => Auth::user()->id,
                    'created_at' => Carbon::now(),
                    'updated_by' => Auth::user()->id,
                    'updated_at' => Carbon::now(),
                ]);
                if (Auth::user()->type_user == 'ADMINISTRATOR') {
                    return redirect()->route('dashboardPage:admin')->with('success', 'Selamat Datang! '.Auth::user()->name);
                } else if (Auth::user()->type_user == 'PEMILIK_GEDUNG') {
                    return redirect()->route('dashboardPage:owner')->with('success', 'Selamat Datang! '.Auth::user()->name);
                } else if (Auth::user()->type_user == 'CUSTOMER') {
                    return redirect()->route('homePage:user')->with('success', 'Selamat Datang! '.Auth::user()->name);
                } else if (Auth::user()->type_user == 'ADMIN_ENTRY') {
                    return redirect()->route('dashboardPage:admin-entry')->with('success', 'Selamat Datang! '.Auth::user()->name);
                } else {
                    return redirect()->route('login')->with('error', 'Tipe user tidak diketahui.');
                }
            } else {
                return redirect()->route('login')->with('error', 'Maaf, mungkin Email atau Password Anda salah, mohon ulangi sekali lagi.');
            }
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Terjadi kesalahan: '.$e->getMessage());
        }
    }

    public function logout(Request $request)
    {
        try {
            if (! Auth::user()) {
                return redirect()
                    ->route('login')
                    ->with('success', 'Terima kasih telah menggunakan aplikasi ini!');
            } else {
                DB::table('histories')->insert([
                    'id_transaction' => 0,
                    'name_history' => 'Logout',
                    'content_history' => 'Logout berhasil',
                    'alert_history' => 'success',
                    'action_history' => 'user-remove',
                    'status' => 1,
                    'created_by' => Auth::user()->id,
                    'created_at' => Carbon::now(),
                    'updated_by' => Auth::user()->id,
                    'updated_at' => Carbon::now(),
                ]);
                if ($request->ajax()) {
                    Auth::Logout();
                    return redirect()
                        ->route('login')
                        ->with('success', 'Mohon Login dengan password baru Anda.');
                } else {
                    Auth::Logout();
                    return redirect()
                        ->route('login')
                        ->with('success', 'Terima kasih telah menggunakan aplikasi ini!');
                }
            }
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Terjadi kesalahan: '.$e->getMessage());
        }
    }
}
