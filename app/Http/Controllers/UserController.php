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
    public function profilePageAdmin() {
        return view("admin.profile.index");
    }

    public function profilePageOwner() {
        return view("owner.profile.index");
    }

    public function userPageAdmin() {
        return view("admin.users.index");
    }

    public function userPageOwner() {
        return view("owner.users.index");
    }

    public function profilePageUser() {
        $dataUser = DB::table('users')->where('id', Auth::user()->id)->select('*')->first();
        $dataTransaction = DB::table('transactions')
            ->join('buildings as rooms', 'rooms.id', 'transactions.id_building')
            ->where('transactions.id_customer', Auth::user()->id)
            ->select('transactions.*', 'rooms.name as room_name')
            ->get();
        return view("user.account", compact('dataUser', 'dataTransaction'));
    }

    public function dataHistoryTransactionUser(Request $request) {
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
                ->rawColumns(['code', 'date_start', 'building_name', 'total_pay'])
                ->escapeColumns([])
                ->make();
        }
    }

    public function updateProfileUser (Request $request) {
        $updateData = [
            'name' => $request->tenant_name,
            'email' => $request->tenant_email,
            'phone' => $request->tenant_phone,
            'bank_name' => $request->tenant_bank,
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
            return redirect()->route('profilePage:user')->with('success', 'Profil berhasil diperbarui!');
        }
    }
}
