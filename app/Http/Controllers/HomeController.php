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
            ->where('buildings.status', 1)
            ->orderBy('buildings.created_at', 'desc')
            ->limit(10)
            ->get();
        return view("pages.user.home", compact('data'));
    }

    public function getBookingDateUser(Request $request, $id) {
        try {
            $getBookingData = DB::table('transactions')
                ->where('id_building', $id)
                ->whereIn('transactions.status_order', [1,2,3])
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

    public function getBankNumberOwner(Request $request, $id) {
        try {
            $getBankOwner = DB::table('buildings')
                ->join('users as user_owner', 'user_owner.id', 'buildings.id_owner')
                ->where('buildings.id', $id)
                ->select('buildings.*', 'user_owner.name as owner_name', 'user_owner.bank_name as owner_bank_name', 'user_owner.bank_number as owner_bank_number')
                ->first();
            return $this->arrayResponse(200, 'success', null, $getBankOwner);
        } catch (\Throwable $th) {
            return $this->arrayResponse(400, 'failed', 'Gagal untuk mengambil data Bank dari Owner! Alasan: '.$th, null);
        }
    }

    public function indexPageUser() {
        $data = DB::table('buildings')
            ->join('users as user_created', 'user_created.id', 'buildings.created_by')
            ->join('users as user_owner', 'user_owner.id', 'buildings.id_owner')
            ->select('buildings.*', 'user_created.name as created_by', 'user_owner.name as owner_name', 'user_owner.email as owner_email', 'user_owner.phone as owner_phone')
            ->where('buildings.status', 1)
            ->orderBy('buildings.created_at', 'desc')
            ->limit(10)
            ->get();
        return view("pages.user.home", compact('data'));
    }

    public function buildingPageUser(Request $request) {
        if ($request) {
            $dataBuildings = DB::table('buildings')
                ->join('users as user_created', 'user_created.id', 'buildings.created_by')
                ->join('users as user_owner', 'user_owner.id', 'buildings.id_owner')
                ->select('buildings.*', 'user_created.name as created_by', 'user_owner.name as owner_name', 'user_owner.email as owner_email', 'user_owner.phone as owner_phone')
                ->where('buildings.status', 1);
                if ($request->price_start) {
                    $dataBuildings->where('buildings.price', '>=', $request->price_start);
                } elseif ($request->price_end) {
                    $dataBuildings->where('buildings.price', '<=', $request->price_end);
                } elseif($request->price_start && $request->price_end) {
                    $dataBuildings->whereBetween('buildings.price', [$request->price_start, $request->price_end]);
                }
                if($request->name) {
                    $dataBuildings->where(function($query) use ($request) {
                        $query->where('buildings.name', 'LIKE', '%' . $request->name . '%')
                            ->orWhere('user_owner.name', 'LIKE', '%' . $request->name . '%')
                            ->orWhere('user_owner.email', 'LIKE', '%' . $request->name . '%');
                    });
                }
                if($request->name_sort) {
                    $dataBuildings->orderBy('buildings.name', $request->name_sort);
                }
                if($request->price_sort) {
                    $dataBuildings->orderBy('buildings.price', $request->price_sort);
                }
                $dataBuildings->orderBy('buildings.created_at', 'desc');
            $data = $dataBuildings->get();
            $getCountData = $dataBuildings->count();
        } else {
            $dataBuildings = DB::table('buildings')
                ->join('users as user_created', 'user_created.id', 'buildings.created_by')
                ->join('users as user_owner', 'user_owner.id', 'buildings.id_owner')
                ->select('buildings.*', 'user_created.name as created_by', 'user_owner.name as owner_name', 'user_owner.email as owner_email', 'user_owner.phone as owner_phone')
                ->where('buildings.status', 1)
                ->orderBy('buildings.created_at', 'desc');
            $data = $dataBuildings->get();
            $getCountData = $dataBuildings->count();
        }
        return view("pages.user.building", compact('data', 'getCountData'));
    }

    public function buildingDetailPageUser($id) {
        $data = DB::table('buildings')
                ->join('users as user_created', 'user_created.id', 'buildings.created_by')
                ->join('users as user_owner', 'user_owner.id', 'buildings.id_owner')
                ->select('buildings.*', 'user_created.name as created_by', 'user_owner.name as owner_name', 'user_owner.email as owner_email', 'user_owner.phone as owner_phone')
                ->where('buildings.id' ,$id)
                ->where('buildings.status', 1)
                ->first();
        if (Auth::check()) {
            $dataBooking = DB::table('transactions')
                ->where('transactions.id_customer', Auth::user()->id)
                ->where('transactions.id_building', $id)
                ->select('transactions.*')
                ->whereNot('transactions.status_order', 0)
                ->whereNot('transactions.status_transaction', 0)
                ->latest('transactions.updated_at')
                ->first();
        } else {
            $dataBooking = DB::table('transactions')
                // ->where('transactions.id_customer', Auth::user()->id)
                ->where('transactions.id_building', $id)
                ->select('transactions.*')
                ->whereNot('transactions.status_order', 0)
                ->whereNot('transactions.status_transaction', 0)
                ->latest('transactions.updated_at')
                ->first();
        }
        return view("pages.user.building-detail", compact('data', 'dataBooking'));
    }

    public function dashboardCounter() {
        try {
            if(Auth::user()->type_user === 'ADMINISTRATOR') {
                $countUser = DB::table('users')->where('status', 1)->whereNot('id', Auth::user()->id)->count();
                $countBuilding = DB::table('buildings')->where('status', 1)->count();
                $data = [
                    'user_count' => $countUser,
                    'room_count' => $countBuilding,
                ];
            } else if(Auth::user()->type_user === 'ADMIN_ENTRY') {
                $countUser = DB::table('users')->where('status', 1)->whereNot('id', Auth::user()->id)->where('type_user', 'CUSTOMER')->count();
                $countBuilding = DB::table('buildings')->where('status', 1)->where('id_owner', Auth::user()->id)->count();
                $data = [
                    'user_count' => $countUser,
                    'room_count' => $countBuilding,
                ];
            } else if(Auth::user()->type_user === 'PEMILIK_GEDUNG') {
                $countUser = DB::table('users')->where('status', 1)->whereNot('id', Auth::user()->id)->where('type_user', 'CUSTOMER')->count();
                $countBuilding = DB::table('buildings')->where('status', 1)->where('id_owner', Auth::user()->id)->count();
                $data = [
                    'user_count' => $countUser,
                    'room_count' => $countBuilding,
                ];
            } else {
                $data = [
                    'user_count' => 0,
                    'room_count' => 0,
                ];
            }
            return $this->arrayResponse(200, 'success', null, $data);
        } catch (\Throwable $th) {
            return $this->arrayResponse(400, 'failed', 'Gagal untuk mengambil data dashboard! Alasan: '.$th, null);
        }
    }

    public function dashboardPage() {
        if(Auth::user()->type_user === 'ADMINISTRATOR') {
            $data = DB::table('buildings')
                ->join('users as user_owner', 'user_owner.id', 'buildings.id_owner')
                ->where('buildings.status', 1)
                ->select('buildings.*', 'user_owner.name as owner_name')
                ->limit(10)
                ->get();
            return view("pages.admin.dashboard", compact('data'));
        } else if(Auth::user()->type_user === 'ADMIN_ENTRY') {
            $data = DB::table('buildings')
                ->join('users as user_owner', 'user_owner.id', 'buildings.id_owner')
                ->where('buildings.status', 1)
                ->where('buildings.id_owner', Auth::user()->id)
                ->select('buildings.*', 'user_owner.name as owner_name')
                ->limit(10)
                ->get();
            return view("pages.admin-entry.dashboard", compact('data'));
        } else if(Auth::user()->type_user === 'PEMILIK_GEDUNG') {
            $data = DB::table('buildings')
                ->join('users as user_owner', 'user_owner.id', 'buildings.id_owner')
                ->where('buildings.status', 1)
                ->where('buildings.id_owner', Auth::user()->id)
                ->select('buildings.*', 'user_owner.name as owner_name')
                ->limit(10)
                ->get();
            return view("pages.owner.dashboard", compact('data'));
        } else {
            return redirect()->back()->with('error', 'Anda tidak diijinkan!');
        }
    }

    public function arrayResponse($status, $message, $detailMessage, $data) {
        $response = ['status' => $status, 'message' => $message, 'detail_message' => $detailMessage, 'data' => $data];
        return response()->json($response);
    }
}
