<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManager;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Str;
use DataTables;

class TransactionController extends Controller
{
    // status_order 1 booking done
    // status_order 2 payment done and waiting verification
    // status_order 3 approved
    // status_order 0 canceled
    // status_trx 0 waiting verification
    // status_trx 1 approved
    // status_trx 2 done
    // status_order 1, 2, 3 AND status_trx 0 & 1 means date is on used
    // status_order 0 AND status_trx 2 means date is not on used

    public function orderBuildingPageUser() {
        return view("user.order");
    }

    public function orderBuildingUser(Request $request, $id) {
        try {
            $autoLogin = false;
            $checkDateBooking = DB::table('transactions')
                ->where('date_start', $request['data']['booking_date'])
                ->whereIn('status_order', [1, 2, 3])
                ->whereIn('status_transaction', [0, 1])
                ->select('*')
                ->first();
            $checkUser = DB::table('users')->where('email', $request['data']['tenant_email'])->select('*')->first();
            $getDataUserName = $request['data']['tenant_name'];
            if(!$checkUser && !Auth::check()) {
                $newUsers = DB::table('users')->insertGetId([
                    'name' => $request['data']['tenant_name'],
                    'email' => $request['data']['tenant_email'],
                    'phone' => $request['data']['tenant_phone'],
                    'type_user' => 'CUSTOMER',
                    'profile' => $request['data']['tenant_name'].'.jpg',
                    'password' => Hash::make($request['data']['tenant_password']),
                    'status' => 1,
                    'created_by' => 1,
                    'updated_by' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
                if($newUsers) {
                    $autoLogin = Auth::attempt(['email' => $request['data']['tenant_email'], 'password' => $request['data']['tenant_password']], null);
                    $getDataUserName = DB::table('users')->where('id', $newUsers)->select('*')->pluck('name')->first();
                } else {
                    return $this->arrayResponse(400, 'failed', 'Data User '.$request['data']['tenant_email'].' gagal dimasukkan!', $request['data']);
                }
            } else if(Auth::check()) {
                $autoLogin = true;
                $getDataUserName = Auth::user()->name;
            }
            if($autoLogin && !$checkDateBooking) {
                $currentDate = Carbon::now()->format('Ymd');
                // $uniqueNumber = strtoupper(Str::uuid()->toString());
                $code = 'TRX/' . str_replace('-', '', $request['data']['booking_date']) . '/' . $id . '/' . strtoupper($getDataUserName) . '/' . $currentDate /* . '/' . $uniqueNumber */;
                $getDataBuildingPrice = DB::table('buildings')->where('buildings.id', $id)->select('buildings.*')->pluck('buildings.price')->first();
                $newBooking = DB::table('transactions')->insertGetId([
                    'id_admin' => null,
                    'id_customer' => isset($newUsers) ? $newUsers : Auth::user()->id,
                    'id_building' => $id,
                    'total_day' => null,
                    'date_start' => $request['data']['booking_date'],
                    'date_end' => null,
                    'transfer_image' => null,
                    'status_order' => 1,
                    'status_transaction' => 0,
                    'code' => $code,
                    'total_pay' => $getDataBuildingPrice,
                    'created_by' => isset($newUsers) ? $newUsers : Auth::user()->id,
                    'updated_by' => isset($newUsers) ? $newUsers : Auth::user()->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
                if ($newBooking) {
                    $getDataTransaction = DB::table('transactions')->where('id', $newBooking)->select('*')->first();
                    return $this->arrayResponse(200, 'success', null, $getDataTransaction);
                } else {
                    return $this->arrayResponse(400, 'failed', 'Gagal untuk membuat Transaksi Booking!', $request['data']);
                }
            } elseif ($checkUser) {
                return $this->arrayResponse(400, 'failed', 'Data User '.$request['data']['tenant_email'].' sudah ada di sistem!', $request['data']);
            } elseif ($checkDateBooking) {
                return $this->arrayResponse(400, 'failed', 'Tanggal tersebut sudah digunakan oleh customer lain!', $request['data']);
            } elseif ($checkDateBooking && $checkUser) {
                return $this->arrayResponse(400, 'failed', 'Akun dan Tanggal Booking tersebut sudah digunakan oleh customer lain!', $request['data']);
            }
        } catch (\Throwable $th) {
            return $this->arrayResponse(400, 'failed', 'Gagal untuk membuat Booking dengan Akun dan Tanggal tersebut! Alasan: '.$th, $request['data']);
        }
    }

    public function paymentBuildingUser(Request $request, $id) {
        try {
            $getDataUsersAndTransaction = DB::table('transactions')
                ->join('users as user_customer', 'user_customer.id', 'transactions.id_customer')
                ->join('buildings as rooms', 'rooms.id', 'transactions.id_building')
                ->where('transactions.id_building', $id)
                ->where('transactions.code', $request['transaction_number']);
            $checkDataUser = $getDataUsersAndTransaction->select('transactions.*', 'user_customer.name', 'user_customer.email', 'rooms.name as room_name')->first();
            if($checkDataUser) {
                $this->createFolder('/transfer_payments');
                $this->createFolder('/transfer_payments/' . $checkDataUser->room_name);
                if ($request->hasFile('transfer_image')) {
                    $image = $request->file('transfer_image');
                    $codeWithoutSlash = str_replace('/', '', $checkDataUser->code);
                    $imageName =  $codeWithoutSlash . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('/transfer_payments/' . $checkDataUser->room_name), $imageName);
                    $uploadPaymentToTransaction = $getDataUsersAndTransaction->update([
                        'transactions.transfer_image' => $imageName,
                        'transactions.status_order' => 2,
                        'transactions.updated_by' => $checkDataUser->id_customer,
                        'transactions.updated_at' => Carbon::now(),
                    ]);
                    if($uploadPaymentToTransaction) {
                        $dataStatusConfirmation = [
                            'status_order' => $checkDataUser->status_order,
                            'status_payment' => $checkDataUser->status_transaction,
                            'transaction_number' => $checkDataUser->code
                        ];
                        return $this->arrayResponse(200, 'success', null, $dataStatusConfirmation);
                    }
                }
            }
        } catch (\Throwable $th) {
            return $this->arrayResponse(400, 'failed', 'Gagal untuk upload Bukti Transfer! Alasan: '.$th, $request['data']);
        }
    }

    public function confirmationBuildingUser(Request $request, $id) {
        try {
            $getDataTransaction = DB::table('transactions')
                ->where('id_building', $id)
                ->where('code', $request['data']['transaction_number'])
                ->select('*')
                ->first();
            if($getDataTransaction) {
                $dataStatusConfirmation = [
                    'status_order' => $getDataTransaction->status_order,
                    'status_payment' => $getDataTransaction->status_transaction,
                    'transaction_number' => $getDataTransaction->code
                ];
                return $this->arrayResponse(200, 'success', null, $dataStatusConfirmation);
            }
        } catch (\Throwable $th) {
            return $this->arrayResponse(400, 'failed', 'Gagal untuk mengambil data konfirmasi! Alasan: '.$th, null);
        }
    }

    public function orderPage() {
        if(Auth::user()->type_user === 'ADMINISTRATOR') {
            return view("pages.admin.order.index");
        } else if(Auth::user()->type_user === 'ADMIN_ENTRY') {
            return view("pages.admin-entry.order.index");
        } else if(Auth::user()->type_user === 'PEMILIK_GEDUNG') {
            return view("pages.owner.order.index");
        } else {
            return redirect()->back()->with('error', 'Anda tidak diijinkan!');
        }
    }

    public function listOrder(Request $request) {
        if ($request->ajax()) {
            if(Auth::user()->type_user === 'ADMINISTRATOR') {
                $data = DB::table('transactions')
                ->join('users as user_created', 'user_created.id', 'transactions.created_by')
                // ->join('users as user_owner', 'user_owner.id', 'transactions.id_owner')
                ->join('users as user_tenant', 'user_tenant.id', 'transactions.id_customer')
                // ->join('users as user_admin', 'user_admin.id', 'transactions.id_admin')
                ->join('buildings as building_list', 'building_list.id', 'transactions.id_building')
                ->select('transactions.*', /* 'user_owner.name as owner_name', */ 'user_tenant.name as tenant_name', /* 'user_admin.name as admin_name', */ 'building_list.name as building_name')
                ->whereIn('transactions.status_order', [1,2])
                ->whereIn('transactions.status_transaction', [0]);
            } else if(Auth::user()->type_user === 'ADMIN_ENTRY') {
                $data = DB::table('transactions')
                ->join('users as user_created', 'user_created.id', 'transactions.created_by')
                // ->join('users as user_owner', 'user_owner.id', 'transactions.id_owner')
                ->join('users as user_tenant', 'user_tenant.id', 'transactions.id_customer')
                // ->join('users as user_admin', 'user_admin.id', 'transactions.id_admin')
                ->join('buildings as building_list', 'building_list.id', 'transactions.id_building')
                ->select('transactions.*', /* 'user_owner.name as owner_name', */ 'user_tenant.name as tenant_name', /* 'user_admin.name as admin_name', */ 'building_list.name as building_name')
                ->whereIn('transactions.status_order', [1,2])
                ->whereIn('transactions.status_transaction', [0]);
            } else if(Auth::user()->type_user === 'PEMILIK_GEDUNG') {
                $data = DB::table('transactions')
                ->join('users as user_created', 'user_created.id', 'transactions.created_by')
                // ->join('users as user_owner', 'user_owner.id', 'transactions.id_owner')
                ->join('users as user_tenant', 'user_tenant.id', 'transactions.id_customer')
                // ->join('users as user_admin', 'user_admin.id', 'transactions.id_admin')
                ->join('buildings as building_list', 'building_list.id', 'transactions.id_building')
                ->select('transactions.*', /* 'user_owner.name as owner_name', */ 'user_tenant.name as tenant_name', /* 'user_admin.name as admin_name', */ 'building_list.id_owner as id_owner', 'building_list.name as building_name')
                ->whereIn('transactions.status_order', [1,2])
                ->whereIn('transactions.status_transaction', [0])
                ->where('id_owner', Auth::user()->id);
            } else {
                $data = [];
            }
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('tenant_name', function ($row) {
                    $data['tenant_name'] = $row->tenant_name;
                    return view('components.admin.order.tenant_name', $data);
                })
                ->addColumn('building_name', function ($row) {
                    $data['building_name'] = $row->building_name;
                    return view('components.admin.order.building_name', $data);
                })
                ->addColumn('date_start', function ($row) {
                    $data['date_start'] = $row->date_start;
                    return view('components.admin.order.date_start', $data);
                })
                ->addColumn('total_day', function ($row) {
                    $data['total_day'] = $row->total_day;
                    return view('components.admin.order.total_day', $data);
                })
                ->addColumn('date_end', function ($row) {
                    $data['date_end'] = $row->date_end;
                    return view('components.admin.order.date_end', $data);
                })
                ->addColumn('total_pay', function ($row) {
                    $data['total_pay'] = $row->total_pay;
                    return view('components.admin.order.total_pay', $data);
                })
                ->addColumn('action', function ($row) {
                    $data['id'] = $row->id;
                    $data['status_order'] = $row->status_order;
                    return view('components.admin.order.action', $data);
                })
                ->rawColumns(['tenant_name', 'building_name', 'date_start', 'total_day', 'date_end', 'total_pay', 'action'])
                ->escapeColumns([])
                ->make();
        }
    }

    public function updateOrder(Request $request, $id) {
        $verifyData = [
            'status_order' => 3,
            'status_transaction' => 1,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),
        ];
        try {
            $buildingId = DB::table('transactions')->where('transactions.id', $id)->update($verifyData);
            $getData = DB::table('transactions')->where('transactions.id', $id)->select('transactions.*')->first();
            return $this->arrayResponse(200, 'success', 'Order ' . $getData->code . ' berhasil di verifikasi.', null);
        } catch (\Throwable $th) {
            return $this->arrayResponse(400, 'error', $th, null);
        }
    }

    public function detailTransaction(Request $request, $id) {
        try {
            $transactionData = DB::table('transactions')
                ->join('users as user_created', 'user_created.id', 'transactions.created_by')
                ->join('users as user_tenant', 'user_tenant.id', 'transactions.id_customer')
                ->join('buildings as building_list', 'building_list.id', 'transactions.id_building')
                ->select('transactions.*', 'user_tenant.name as tenant_name', 'building_list.name as building_name')
                ->where('transactions.id', $id)
                ->first();
            return $this->arrayResponse(200, 'success', null, $transactionData);
        } catch (\Throwable $th) {
            return $this->arrayResponse(400, 'error', $th, null);
        }
    }

    public function listTransaction(Request $request) {
        if ($request->ajax()) {
            if(Auth::user()->type_user === 'ADMINISTRATOR') {
                $data = DB::table('transactions')
                ->join('users as user_created', 'user_created.id', 'transactions.created_by')
                // ->join('users as user_owner', 'user_owner.id', 'transactions.id_owner')
                ->join('users as user_tenant', 'user_tenant.id', 'transactions.id_customer')
                // ->join('users as user_admin', 'user_admin.id', 'transactions.id_admin')
                ->join('buildings as building_list', 'building_list.id', 'transactions.id_building')
                ->select('transactions.*', /* 'user_owner.name as owner_name', */ 'user_tenant.name as tenant_name', /* 'user_admin.name as admin_name', */ 'building_list.name as building_name')
                ->whereIn('transactions.status_order', [0,1,2,3])
                ->whereIn('transactions.status_transaction', [0,1,2]);
            } else if(Auth::user()->type_user === 'ADMIN_ENTRY') {
                $data = DB::table('transactions')
                ->join('users as user_created', 'user_created.id', 'transactions.created_by')
                // ->join('users as user_owner', 'user_owner.id', 'transactions.id_owner')
                ->join('users as user_tenant', 'user_tenant.id', 'transactions.id_customer')
                // ->join('users as user_admin', 'user_admin.id', 'transactions.id_admin')
                ->join('buildings as building_list', 'building_list.id', 'transactions.id_building')
                ->select('transactions.*', /* 'user_owner.name as owner_name', */ 'user_tenant.name as tenant_name', /* 'user_admin.name as admin_name', */ 'building_list.name as building_name')
                ->whereIn('transactions.status_order', [0,1,2,3])
                ->whereIn('transactions.status_transaction', [0,1,2]);
            } else if(Auth::user()->type_user === 'PEMILIK_GEDUNG') {
                $data = DB::table('transactions')
                ->join('users as user_created', 'user_created.id', 'transactions.created_by')
                // ->join('users as user_owner', 'user_owner.id', 'transactions.id_owner')
                ->join('users as user_tenant', 'user_tenant.id', 'transactions.id_customer')
                // ->join('users as user_admin', 'user_admin.id', 'transactions.id_admin')
                ->join('buildings as building_list', 'building_list.id', 'transactions.id_building')
                ->select('transactions.*', /* 'user_owner.name as owner_name', */ 'user_tenant.name as tenant_name', /* 'user_admin.name as admin_name', */ 'building_list.id_owner as id_owner', 'building_list.name as building_name')
                ->whereIn('transactions.status_order', [0,1,2,3])
                ->whereIn('transactions.status_transaction', [0,1,2])
                ->where('id_owner', Auth::user()->id);
            } else {
                $data = [];
            }
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('code', function ($row) {
                    $data['code'] = $row->code;
                    return view('components.admin.transaction.code', $data);
                })
                ->addColumn('date_payment', function ($row) {
                    $data['updated_at'] = $row->updated_at;
                    return view('components.admin.transaction.date_payment', $data);
                })
                ->addColumn('tenant_name', function ($row) {
                    $data['tenant_name'] = $row->tenant_name;
                    return view('components.admin.transaction.tenant_name', $data);
                })
                ->addColumn('total_day', function ($row) {
                    $data['total_day'] = $row->total_day;
                    return view('components.admin.transaction.total_day', $data);
                })
                ->addColumn('total_pay', function ($row) {
                    $data['total_pay'] = $row->total_pay;
                    return view('components.admin.transaction.total_pay', $data);
                })
                ->addColumn('status_transaction', function ($row) {
                    $data['status_order'] = $row->status_order;
                    $data['status_transaction'] = $row->status_transaction;
                    return view('components.admin.transaction.status_transaction', $data);
                })
                ->addColumn('action', function ($row) {
                    $data['id'] = $row->id;
                    $data['status_order'] = $row->status_order;
                    $data['status_transaction'] = $row->status_transaction;
                    return view('components.admin.transaction.action', $data);
                })
                ->rawColumns(['code', 'date_payment', 'tenant_name', 'total_day', 'total_pay', 'status_transaction', 'action'])
                ->escapeColumns([])
                ->make();
        }
    }

    public function updateTransaction(Request $request, $id) {
        $verifyData = [
            'status_order' => 3,
            'status_transaction' => 2,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),
        ];
        try {
            $buildingId = DB::table('transactions')->where('transactions.id', $id)->update($verifyData);
            $getData = DB::table('transactions')->where('transactions.id', $id)->select('transactions.*')->first();
            return $this->arrayResponse(200, 'success', 'Transaksi ' . $getData->code . ' berhasil di verifikasi.', null);
        } catch (\Throwable $th) {
            return $this->arrayResponse(400, 'error', $th, null);
        }
    }

    public function updateCancelTransaction(Request $request, $id) {
        $verifyData = [
            'status_order' => 0,
            'status_transaction' => 0,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),
        ];
        try {
            $buildingId = DB::table('transactions')->where('transactions.id', $id)->update($verifyData);
            $getData = DB::table('transactions')->where('transactions.id', $id)->select('transactions.*')->first();
            return $this->arrayResponse(200, 'success', 'Transaksi ' . $getData->code . ' berhasil di batalkan.', null);
        } catch (\Throwable $th) {
            return $this->arrayResponse(400, 'error', $th, null);
        }
    }

    public function transactionPage() {

        if(Auth::user()->type_user === 'ADMINISTRATOR') {
            return view("pages.admin.transaction.index");
        } else if(Auth::user()->type_user === 'ADMIN_ENTRY') {
            return view("pages.admin-entry.transaction.index");
        } else if(Auth::user()->type_user === 'PEMILIK_GEDUNG') {
            return view("pages.owner.transaction.index");
        } else {
            return redirect()->back()->with('error', 'Anda tidak diijinkan!');
        }
    }

    public function createFolder($fullPath) {
        $path = public_path($fullPath);
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
            return true;
        } else {
            return false;
        }
    }

    public function deleteFolder($fullPath) {
        $path = public_path($fullPath);
        if (is_dir($path)) {
            $files = array_diff(scandir($path), array('.', '..'));
            foreach ($files as $file) {
                (is_dir("$path/$file")) ? deleteFolder("$path/$file") : unlink("$path/$file");
            }
            return rmdir($path);
        } else {
            return false;
        }
    }

    public function arrayResponse($status, $message, $detailMessage, $data) {
        $response = ['status' => $status, 'message' => $message, 'detail_message' => $detailMessage, 'data' => $data];
        return response()->json($response);
    }
}
