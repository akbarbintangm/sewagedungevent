<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use DataTables;

class UserController extends Controller
{
    public function profilePage() {
        $dataUser = DB::table('users')->where('id', Auth::user()->id)->select('*')->first();
        if(Auth::user()->type_user === 'ADMINISTRATOR') {
            return view("pages.admin.profile.index", compact('dataUser'));
        } else if(Auth::user()->type_user === 'ADMIN_ENTRY') {
            return view("pages.admin-entry.profile.index", compact('dataUser'));
        } else if(Auth::user()->type_user === 'PEMILIK_GEDUNG') {
            return view("pages.owner.profile.index", compact('dataUser'));
        } else if(Auth::user()->type_user === 'CUSTOMER') {
            $dataTransaction = DB::table('transactions')
                ->join('buildings as rooms', 'rooms.id', 'transactions.id_building')
                ->where('transactions.id_customer', Auth::user()->id)
                ->select('transactions.*', 'rooms.name as room_name')
                ->get();
            return view("pages.user.account", compact('dataUser', 'dataTransaction'));
        } else {
            return redirect()->back()->with('error', 'Anda tidak diijinkan!');
        }
    }

    public function userPage() {
        if(Auth::user()->type_user === 'ADMINISTRATOR') {
            return view("pages.admin.users.index");
        } else if(Auth::user()->type_user === 'ADMIN_ENTRY') {
            return view("pages.admin-entry.users.index");
        } else if(Auth::user()->type_user === 'PEMILIK_GEDUNG') {
            return view("pages.owner.users.index");
        } else {
            return redirect()->back()->with('error', 'Anda tidak diijinkan!');
        }
    }

    public function listUser(Request $request) {
        if ($request->ajax()) {
            if(Auth::user()->type_user === 'ADMINISTRATOR') {
                $data = DB::table('users')
                    ->join('users as user_created', 'user_created.id', 'users.created_by')
                    ->whereNot('users.id', Auth::user()->id)
                    ->select('users.*');
            } else if(Auth::user()->type_user === 'ADMIN_ENTRY') {
                $data = DB::table('users')
                    ->join('users as user_created', 'user_created.id', 'users.created_by')
                    ->where('users.type_user', 'CUSTOMER')
                    ->whereNot('users.id', Auth::user()->id)
                    ->select('users.*');
            } else if(Auth::user()->type_user === 'PEMILIK_GEDUNG') {
                $data = DB::table('users')
                    ->join('users as user_created', 'user_created.id', 'users.created_by')
                    ->where('users.type_user', 'CUSTOMER')
                    ->whereNot('users.id', Auth::user()->id)
                    ->select('users.*');
            } else {
                $data = [];
            }
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('name', function ($row) {
                    $data['name'] = $row->name;
                    $data['email'] = $row->email;
                    return view('components.admin.user.name', $data);
                })
                ->addColumn('type_user', function ($row) {
                    $data['type_user'] = $row->type_user;
                    return view('components.admin.user.type-user', $data);
                })
                ->addColumn('status', function ($row) {
                    $data['status'] = $row->status;
                    return view('components.admin.user.status', $data);
                })
                ->addColumn('action', function ($row) {
                    $data['status'] = $row->status;
                    $data['id'] = $row->id;
                    return view('components.admin.user.action', $data);
                })
                ->rawColumns(['name', 'type_user', 'status', 'action'])
                ->escapeColumns([])
                ->make();
        }
    }

    public function detailUser(Request $request, $id) {
        try {
            $data = DB::table('users')->where('id', $id)->select('*')->first();
            return $this->arrayResponse(200, 'success', null, $data);
        } catch (\Throwable $th) {
            return $this->arrayResponse(400, 'error', $th, null);
        }
    }

    public function verifyUser(Request $request, $id) {
        try {
            $data = DB::table('users')->where('users.id', $id)->update(['status' => 1]);
            $getData = DB::table('users')->where('users.id', $id)->select('users.*')->first();
            return $this->arrayResponse(200, 'success', 'User '.$getData->email.' berhasil di verifikasi!', $data);
        } catch (\Throwable $th) {
            return $this->arrayResponse(400, 'error', $th, null);
        }
    }

    public function unverifyUser(Request $request, $id) {
        try {
            $data = DB::table('users')->where('users.id', $id)->update(['status' => 0]);
            $getData = DB::table('users')->where('users.id', $id)->select('users.*')->first();
            return $this->arrayResponse(200, 'success', 'User '.$getData->email.' berhasil di batalkan!', $data);
        } catch (\Throwable $th) {
            return $this->arrayResponse(400, 'error', $th, null);
        }
    }

    public function deleteUser(Request $request, $id) {
        try {
            $getData = DB::table('users')->where('users.id', $id)->select('users.*')->first();
            $data = DB::table('users')->where('users.id', $id)->delete();
            return $this->arrayResponse(200, 'success', 'User '.$getData->email.' berhasil di batalkan!', $data);
        } catch (\Throwable $th) {
            return $this->arrayResponse(400, 'error', $th, null);
        }
    }

    public function dataHistoryTransaction(Request $request) {
        if ($request->ajax()) {
            $data = DB::table('transactions')
                ->join('users as user_created', 'user_created.id', 'transactions.created_by')
                ->join('buildings as building_list', 'building_list.id', 'transactions.id_building')
                ->select('transactions.*', 'building_list.name as building_name')
                ->where('transactions.id_customer', Auth::user()->id);
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('code', function ($row) {
                    return $row->code;
                })
                ->addColumn('date_start', function ($row) {
                    return $row->date_start;
                })
                ->addColumn('building_name', function ($row) {
                    return $row->building_name;
                })
                ->addColumn('total_pay', function ($row) {
                    return $row->total_pay;
                })
                ->addColumn('download', function ($row) {
                    return '<button class="btn btn-success" onclick="downloadInvoice('.$row->id.')" type="button">Download</button>';
                })
                ->rawColumns(['code', 'date_start', 'building_name', 'total_pay', 'download'])
                ->escapeColumns([])
                ->make();
        }
    }

    public function updateProfile(Request $request) {
        $updateData = [
            'name' => Str::title($request->tenant_name),
            'email' => Str::lower($request->tenant_email),
            'phone' => $request->tenant_phone,
            'bank_name' => Str::upper($request->tenant_bank),
            'bank_number' => $request->tenant_bank_number,
        ];
        $updateData = array_filter($updateData, fn($value) => !is_null($value));
        DB::table('users')->where('id', Auth::user()->id)->update($updateData);
        if ($request->filled('tenant_password')) {
            DB::table('users')->where('id', Auth::user()->id)->update([
                'password' => Hash::make($request->tenant_password),
            ]);
            return redirect()->route('auth-logout')->with('success', 'Profil dan Password berhasil diperbarui! Silahkan Login dengan password yang baru!');
        } else {
            if(Auth::user()->type_user === 'CUSTOMER') {
                return redirect()->route('profilePage:user')->with('success', 'Profil berhasil diperbarui!');
            } else if(Auth::user()->type_user === 'ADMINISTRATOR') {
                return redirect()->route('profilePage:admin')->with('success', 'Profil berhasil diperbarui!');
            } else if(Auth::user()->type_user === 'PEMILIK_GEDUNG') {
                return redirect()->route('profilePage:owner')->with('success', 'Profil berhasil diperbarui!');
            } else if(Auth::user()->type_user === 'ADMIN_ENTRY') {
                return redirect()->route('profilePage:admin-entry')->with('success', 'Profil berhasil diperbarui!');
            }
        }
    }

    public function arrayResponse($status, $message, $detailMessage, $data) {
        $response = ['status' => $status, 'message' => $message, 'detail_message' => $detailMessage, 'data' => $data];
        return response()->json($response);
    }
}
