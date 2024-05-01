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

    public function orderBuildingWithoutLoginUser(Request $request, $id) {
        try {
            $checkDateBooking = DB::table('transactions')
                ->where('date_start', $request['data']['booking_date'])
                ->whereIn('status_order', [1, 2, 3])
                ->whereIn('status_transaction', [0, 1])
                ->select('*')
                ->first();
            $checkUser = DB::table('users')->where('email', $request['data']['tenant_email'])->select('*')->first();
            if(!$checkUser && !$checkDateBooking) {
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
                $currentDate = Carbon::now()->format('Ymd');
                $uniqueNumber = strtoupper(Str::uuid()->toString());
                $code = 'TRX/' . str_replace('-', '', $request['data']['booking_date']) . '/' . $id . '/' . strtoupper(substr($request['data']['tenant_name'], 0, 1)) . '/' . $currentDate . '/' . $uniqueNumber;
                // example: TRX/20240502/1/AKBAR/20240501/nomorngawur
                $newBooking = DB::table('transactions')->insertGetId([
                    'id_admin' => null,
                    'id_customer' => $newUsers,
                    'id_building' => $id,
                    'total_day' => null,
                    'date_start' => $request['data']['booking_date'],
                    'date_end' => null,
                    'transfer_image' => null,
                    'status_order' => 1,
                    'status_transaction' => 0,
                    'code' => $code,
                    'created_by' => $id,
                    'updated_by' => $id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
                // seharusnya disini ada function login
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

    public function paymentBuildingWithoutLoginUser(Request $request, $id) {
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

    public function confirmationBuildingWithoutLoginUser(Request $request, $id) {
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

    public function orderBuildingUser(Request $request, $id) {
        return $this->arrayResponse(200, 'success', null, null);
    }

    public function paymentBuildingUser(Request $request, $id) {
        return $this->arrayResponse(200, 'success', null, null);
    }

    public function confirmationBuildingUser(Request $request, $id) {
        return $this->arrayResponse(200, 'success', null, null);
    }

    public function orderPageAdmin() {
        return view("admin.order.index");
    }

    public function orderPageOwner() {
        return view("owner.order.index");
    }

    public function transactionPageAdmin() {
        return view("admin.transaction.index");
    }

    public function transactionPageOwner() {
        return view("owner.transaction.index");
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
