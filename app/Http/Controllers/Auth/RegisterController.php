<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    } */

    public function index()
    {
        return view('auth/register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users',
            'password' => 'required|min:3|max:255',
        ], [
            'name' => 'The Field is required',
            'email' => 'The Field is required',
            'password' => 'The Field is required',
        ]);
        $newEmail = Str::lower($validated['email']);
        $newName = Str::title($validated['name']);
        $validated['password'] = Hash::make($validated['password']);
        $role = 'FIN';
        $status = 0;
        $userCheck = DB::table('users')->where('email', $newEmail)->first();
        if (! $userCheck) {
            DB::table('users')
            ->insert([
                'name' => $newName,
                'phone' => null,
                'staff_code' => null,
                'status_sdm' => null,
                'status' => $status,
                'role' => $role,
                'email' => $newEmail,
                'password' => $validated['password'],
                'created_by' => 1,
                'created_at' => Carbon::now(),
                'updated_by' => 1,
                'updated_at' => Carbon::now(),
            ]);
            $pluckId = DB::table('users')->where('email', $newEmail)->pluck('id');
            $newDataId = str_replace(['[', '"', ']'], '', $pluckId[0]);
            DB::table('users')
            ->where('id', $newDataId)
            ->update([
                'created_by' => $newDataId,
                'updated_by' => $newDataId,
            ]);
            DB::table('histories')
            ->insert([
                'name_history' => 'Register',
                'content_history' => 'Pendaftaran Akun berhasil',
                'alert_history' => 'success',
                'action_history' => 'user-add',
                'status' => 1,
                'created_by' => $newDataId,
                'created_at' => Carbon::now(),
                'updated_by' => $newDataId,
                'updated_at' => Carbon::now(),
            ]);

            return redirect()->route('login')->with('success', 'Register berhasil, silahkan login dengan akun yang telah diregistrasi.');
        } else {
            return redirect()->route('register')->with('danger', 'Email sudah terdaftar, mohon login dengan akun email lama Anda.');
        }
    }
}
