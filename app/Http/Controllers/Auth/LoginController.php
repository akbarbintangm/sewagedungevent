<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /* public function __construct()
    {
        $this->middleware('guest')->except('logout');
    } */

    public function index()
    {
        return view('auth/login');
    }

    public function login(Request $request)
    {
        $remember = $request->has('remember') ? true : false;
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $active = DB::table('users')
            ->where('email', $credentials['email'])
            ->pluck('status')
            ->first();
        $email = DB::table('users')
            ->where('email', $credentials['email'])
            ->pluck('email')
            ->first();
        $password = DB::table('users')
            ->where('email', $credentials['email'])
            ->pluck('password')
            ->first();
        $passwordCheck = Hash::check($request->password, $password);
        if ($credentials['email'] != $email) {
            return redirect()
                ->route('login')
                ->with('danger', 'Your Email is wrong.');
        } else {
            if ($passwordCheck) {
                if ($active == 0) {
                    return redirect()
                        ->route('login')
                        ->with('info', 'Akun Anda masih belum aktif, mohon hubungi Admin segera.');
                } else {
                    /* If Remember */
                    if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $remember)) {
                        $request->session()->regenerate();
                        DB::table('histories')->insert([
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
                        if (Auth::user()->role == 'SA' || Auth::user()->role == 'FIN' || Auth::user()->role == 'MO' || Auth::user()->role == 'HRD' || Auth::user()->role == 'DU' || Auth::user()->role == 'AUD' || Auth::user()->role == 'KW' || Auth::user()->role == 'AWH' || Auth::user()->role == 'KQC' || Auth::user()->role == 'QC' || Auth::user()->role == 'KP' || Auth::user()->role == 'SP') {
                            return redirect()
                                ->route('dashboard')
                                ->with('success', 'Selamat Datang! '.Auth::user()->name);
                        } elseif (Auth::user()->role == 'AP') {
                            return redirect()
                                ->route('transfer-produksi')
                                ->with('success', 'Selamat Datang! '.Auth::user()->name);
                        } elseif (Auth::user()->role == 'KB') {
                            Auth::Logout();

                            return redirect()
                                ->route('login')
                                ->with('info', 'Akun Anda tidak diperbolehkan masuk kedalam sistem.');
                        }
                    } elseif (Auth::attempt($credentials)) {
                        /* If User didn't Click Remember */
                        $request->session()->regenerate();
                        DB::table('histories')->insert([
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
                        if (Auth::user()->role == 'SA' || Auth::user()->role == 'FIN' || Auth::user()->role == 'MO' || Auth::user()->role == 'HRD' || Auth::user()->role == 'AUD' || Auth::user()->role == 'KW' || Auth::user()->role == 'AWH' || Auth::user()->role == 'KQC' || Auth::user()->role == 'QC' || Auth::user()->role == 'KP' || Auth::user()->role == 'SP') {
                            return redirect()
                                ->route('dashboard')
                                ->with('success', 'Selamat Datang! '.Auth::user()->name);
                        } elseif (Auth::user()->role == 'AP') {
                            return redirect()
                                ->route('transfer-produksi')
                                ->with('success', 'Selamat Datang! '.Auth::user()->name);
                        } elseif (Auth::user()->role == 'KB') {
                            Auth::Logout();

                            return redirect()
                                ->route('login')
                                ->with('info', 'Akun Anda tidak diperbolehkan masuk kedalam sistem.');
                        }
                    } else {
                        return redirect()
                            ->route('login')
                            ->with('danger', 'Maaf, mungkin Email atau Password Anda salah, mohon ulangi sekali lagi.');
                    }
                }
            } else {
                return redirect()
                    ->route('login')
                    ->with('danger', 'Your Password is wrong.');
            }
        }
    }

    public function logout(Request $request)
    {
        if (! Auth::user()) {
            return redirect()
                ->route('login')
                ->with('success', 'Terima kasih telah menggunakan aplikasi ini!');
        } else {
            DB::table('histories')->insert([
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
    }
}
