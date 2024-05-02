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
        return view("home");
    }

    public function indexWithoutLoginPageUser()
    {
        return view("home");
    }

    public function buildingWithoutLoginPageUser() {
        $data = DB::table('buildings')
                ->join('users as user_created', 'user_created.id', 'buildings.created_by')
                ->join('users as user_owner', 'user_owner.id', 'buildings.id_owner')
                ->select('buildings.*', 'user_created.name as created_by', 'user_owner.name as owner_name', 'user_owner.email as owner_email')
                ->get();
        return view("building", compact('data'));
    }

    public function buildingDetailWithoutLoginPageUser($id) {
        $data = DB::table('buildings')
                ->join('users as user_created', 'user_created.id', 'buildings.created_by')
                ->join('users as user_owner', 'user_owner.id', 'buildings.id_owner')
                ->select('buildings.*', 'user_created.name as created_by', 'user_owner.name as owner_name', 'user_owner.email as owner_email')
                ->where('buildings.id' ,$id)
                ->first();
        return view("building-detail", compact('data'));
    }

    public function getBookingDateUser(Request $request, $id) {
        try {
            $getBookingData = DB::table('transactions')
                ->where('id_building', $id)
                ->whereIn('transactions.status_order', [1,2])
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

    public function dashboardPageAdmin()
    {
        return view("admin.dashboard");
    }

    public function dashboardPageOwner()
    {
        return view("owner.dashboard");
    }

    public function arrayResponse($status, $message, $detailMessage, $data) {
        $response = ['status' => $status, 'message' => $message, 'detail_message' => $detailMessage, 'data' => $data];
        return response()->json($response);
    }
}
