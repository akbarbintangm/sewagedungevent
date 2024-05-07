<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $data = DB::table('buildings')
            ->join('users as user_created', 'user_created.id', 'buildings.created_by')
            ->join('users as user_owner', 'user_owner.id', 'buildings.id_owner')
            ->select('buildings.*', 'user_created.name as created_by', 'user_owner.name as owner_name', 'user_owner.email as owner_email')
            ->orderBy('buildings.created_at', 'desc')
            ->limit(10)
            ->get();
        return view("user.home", compact('data'));
    }

    public function indexWithoutLoginPageUser()
    {
        $data = DB::table('buildings')
            ->join('users as user_created', 'user_created.id', 'buildings.created_by')
            ->join('users as user_owner', 'user_owner.id', 'buildings.id_owner')
            ->select('buildings.*', 'user_created.name as created_by', 'user_owner.name as owner_name', 'user_owner.email as owner_email')
            ->orderBy('buildings.created_at', 'desc')
            ->limit(10)
            ->get();
        return view("user.home", compact('data'));
    }

    public function buildingWithoutLoginPageUser() {
        $data = DB::table('buildings')
                ->join('users as user_created', 'user_created.id', 'buildings.created_by')
                ->join('users as user_owner', 'user_owner.id', 'buildings.id_owner')
                ->select('buildings.*', 'user_created.name as created_by', 'user_owner.name as owner_name', 'user_owner.email as owner_email')
                ->get();
        return view("user.building", compact('data'));
    }

    public function buildingDetailWithoutLoginPageUser($id) {
        $data = DB::table('buildings')
                ->join('users as user_created', 'user_created.id', 'buildings.created_by')
                ->join('users as user_owner', 'user_owner.id', 'buildings.id_owner')
                ->select('buildings.*', 'user_created.name as created_by', 'user_owner.name as owner_name', 'user_owner.email as owner_email')
                ->where('buildings.id' ,$id)
                ->first();
        $dataBooking = (object) [
            'code' => '',
            'status_order' => 0,
            'status_transaction' => 0,
        ];
        return view("user.building-detail", compact('data', 'dataBooking'));
    }

    public function getBookingDateUser(Request $request, $id) {
        try {
            $getBookingData = DB::table('transactions')
                ->where('id_building', $id)
                ->whereIn('transactions.status_order', [0,1,2,3])
                ->whereIn('transactions.status_transaction', [1])
                ->select('*')
                ->get();
            if($getBookingData->isNotEmpty()) {
                $dataDate = [];
                foreach ($getBookingData as $booking) {
                    $dataDate[] = [
                        'date' => $booking->date_start,
                    ];
                }
                return $this->arrayResponse(200, 'success', null, $dataDate);
            } else {
                return $this->arrayResponse(200, 'success', null, null);
            }
        } catch (\Throwable $th) {
            return $this->arrayResponse(400, 'failed', 'Gagal untuk mengambil data konfirmasi! Alasan: '.$th, null);
        }
    }

    public function indexPageUser()
    {
        $data = DB::table('buildings')
            ->join('users as user_created', 'user_created.id', 'buildings.created_by')
            ->join('users as user_owner', 'user_owner.id', 'buildings.id_owner')
            ->select('buildings.*', 'user_created.name as created_by', 'user_owner.name as owner_name', 'user_owner.email as owner_email')
            ->orderBy('buildings.created_at', 'desc')
            ->limit(10)
            ->get();
        return view("user.home", compact('data'));
    }

    public function buildingPageUser() {
        $data = DB::table('buildings')
                ->join('users as user_created', 'user_created.id', 'buildings.created_by')
                ->join('users as user_owner', 'user_owner.id', 'buildings.id_owner')
                ->select('buildings.*', 'user_created.name as created_by', 'user_owner.name as owner_name', 'user_owner.email as owner_email')
                ->get();
        return view("user.building", compact('data'));
    }

    public function buildingDetailPageUser($id) {
        $data = DB::table('buildings')
                ->join('users as user_created', 'user_created.id', 'buildings.created_by')
                ->join('users as user_owner', 'user_owner.id', 'buildings.id_owner')
                ->select('buildings.*', 'user_created.name as created_by', 'user_owner.name as owner_name', 'user_owner.email as owner_email')
                ->where('buildings.id' ,$id)
                ->first();
        $dataBooking = DB::table('transactions')
                ->where('transactions.id_customer', Auth::user()->id)
                ->where('transactions.id_building', $id)
                ->select('transactions.*')
                ->first();
        return view("user.building-detail", compact('data', 'dataBooking'));
    }

    public function dashboardPageAdmin() {
        return view("admin.dashboard");
    }

    public function dashboardPageOwner() {
        return view("owner.dashboard");
    }

    public function arrayResponse($status, $message, $detailMessage, $data) {
        $response = ['status' => $status, 'message' => $message, 'detail_message' => $detailMessage, 'data' => $data];
        return response()->json($response);
    }
}
