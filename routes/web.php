<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
Use App\Http\Controllers\HistoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;

Auth::routes();

function clearOrRunSchedule() {
    try {
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        Artisan::call('optimize:clear');
        Artisan::call('schedule:run');
    } catch (\Exception $e) {
        Log::error('Gagal menjalankan perintah Artisan: ' . $e->getMessage());
    }
}

/* Clear Cache */
Route::get('/reset', function () {
    clearOrRunSchedule();
    return redirect('/')->with('info', 'Data Cache telah dibersihkan.');
})->name('reset');

/* Check Auth */
Route::get('/check-auth', function () {
    $response = ['status' => 200, 'message' => 'success', 'detail_message' => '', 'authenticated' => Auth::check(), 'data' => Auth::user()];
    return response()->json($response);
})->name('check-login');

/* Login & Logout */
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login')->middleware('guest');
    Route::post('/login/auth', 'login', function() {
        clearOrRunSchedule();
    })->name('auth-login');
    Route::get('/logout', 'logout', function() {
        clearOrRunSchedule();
    })->name('auth-logout');
    Route::get('/reset-logout', 'password_reset_logout')->name('reset-logout');
});

/* Register */
Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'index')->name('register')->middleware('guest');
    Route::post('/register', 'register', function() {
        clearOrRunSchedule();
    })->name('auth-register');
});

/* User Page without Login */
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'indexWithoutLoginPageUser', function() {
        clearOrRunSchedule();
    })->name('landingWithoutLoginPage:user');
    Route::get('/building', 'buildingWithoutLoginPageUser', function() {
        clearOrRunSchedule();
    })->name('buildingWithoutLoginPage:user');
    Route::get('/building/detail/{id}', 'buildingDetailWithoutLoginPageUser', function() {
        clearOrRunSchedule();
    })->name('buildingDetailWithoutLoginPage:user');
    Route::get('/get-booking-date/{id}', 'getBookingDateUser')->name('getBookingDate:user');
});
/* Transaction No Login */
Route::controller(TransactionController::class)->group(function () {
    Route::post('/building/detail/{id}/transaction/order-without-login', 'orderBuildingUser')->name('orderBuildingWithoutLogin:user');
    Route::post('/building/detail/{id}/transaction/payment-without-login', 'paymentBuildingUser')->name('paymentBuildingWithoutLogin:user');
    Route::post('/building/detail/{id}/transaction/await-confirmation-without-login', 'confirmationBuildingUser')->name('confirmationBuildingWithoutLogin:user');
});

/* Middleware */
Route::middleware(['auth'])->group(function () {
    /* Histories API for All User with their Login Info */
    Route::controller(HistoryController::class)->group(function () {
        Route::get('/notifications', 'notifications')->name('notifications');
    });
    /* Admin Page */
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/reset', function () {
            clearOrRunSchedule();
            return redirect()
                ->route('dashboardPage:admin')
                ->with('info', 'Data Cache telah dibersihkan.');
        })->name('admin-reset');
        /* Dashboard */
        Route::controller(HomeController::class)->group(function () {
            Route::get('/', 'dashboardPage')->name('dashboardPage:admin');
            Route::get('/counter-dashboard', 'dashboardCounter')->name('counterDashboard:admin');
        });
        /* Master Building */
        Route::controller(BuildingController::class)->group(function () {
            Route::get('/building', 'buildingPageAdmin', function() {
                clearOrRunSchedule();
            })->name('buildingPage:admin');
            Route::get('/building/dashboard', 'dashboardBuilding')->name('dashboardBuilding:admin');
            Route::get('/building/list-verified', 'listBuildingVerified')->name('listBuildingVerified:admin');
            Route::get('/building/list-unverified', 'listBuildingUnverified')->name('listBuildingUnverified:admin');
            Route::get('/building/detail-building/{id}', 'detailPageBuilding', function() {
                clearOrRunSchedule();
            })->name('detailPageBuilding:admin');
            Route::get('/building/add-building', 'addPageBuilding')->name('addPageBuilding:admin');
            Route::post('/building/add', 'addBuilding')->name('addBuilding:admin');
            Route::post('/building/update/{id}', 'updateBuilding')->name('updateBuilding:admin');
            Route::get('/building/delete/{id}', 'deleteBuilding')->name('deleteBuilding:admin');
            Route::get('/building/verify/{id}', 'verifyBuilding')->name('verifyBuilding:admin');
        });
        /* Transaction */
        Route::controller(TransactionController::class)->group(function () {
            /* Order */
            Route::get('/order', 'orderPageAdmin', function() {
                clearOrRunSchedule();
            })->name('orderPage:admin');
            Route::get('/order/dashboard', 'dashboardOrder')->name('dashboardOrder:admin');
            Route::get('/order/list', 'listOrder')->name('listOrder:admin');
            Route::get('/order/update/{id}', 'updateOrder')->name('updateOrder:admin');
            /* Transaction History */
            Route::get('/transaction', 'transactionPage', function() {
                clearOrRunSchedule();
            })->name('transactionPage:admin');
            Route::get('/transaction/dashboard', 'dashboardTransaction')->name('dashboardTransaction:admin');
            Route::get('/transaction/list', 'listTransaction')->name('listTransaction:admin');
            Route::get('/transaction/detail/{id}', 'detailTransaction')->name('detailTransaction:admin');
            Route::get('/transaction/update/{id}', 'updateTransaction')->name('updateTransaction:admin');
        });
        /* Master User */
        Route::controller(UserController::class)->group(function () {
            Route::get('/user', 'userPage', function() {
                clearOrRunSchedule();
            })->name('userPage:admin');
            Route::get('/user/dashboard', 'dashboardUser')->name('dashboardUser:admin');
            Route::get('/user/list', 'listUser')->name('listUser:admin');
            Route::get('/user/detail/{id}', 'detailUser')->name('detailUser:admin');
            Route::get('/user/delete/{id}', 'deleteUser')->name('deleteUser:admin');
            Route::get('/user/verify/{id}', 'verifyUser')->name('verifyUser:admin');
            Route::get('/user/unverify/{id}', 'unverifyUser')->name('unverifyUser:admin');
        });
        /* Profiling */
        Route::controller(UserController::class)->group(function () {
            Route::get('/profile', 'profilePageAdmin', function() {
                clearOrRunSchedule();
            })->name('profilePage:admin');
            Route::post('/profile/update', 'updateProfile')->name('updateProfile:admin');
        });
    });
    /* Admin Entry Page */

    /* Owner Page */

    /* User Page */
    Route::group(['prefix' => 'user'], function () {
        Route::get('/reset', function () {
            clearOrRunSchedule();
            return redirect()
                ->route('homePage:user')
                ->with('info', 'Data Cache telah dibersihkan.');
        })->name('user-reset');
        /* Home */
        Route::controller(HomeController::class)->group(function () {
            Route::get('/', 'indexPageUser', function() {
                clearOrRunSchedule();
            })->name('homePage:user');
        });
        /* Building List */
        Route::controller(HomeController::class)->group(function () {
            /* Page, Detail, and Lists */
            Route::get('/building', 'buildingPageUser', function() {
                clearOrRunSchedule();
            })->name('buildingPage:user');
            Route::get('/building/detail/{id}', 'buildingDetailPageUser', function() {
                clearOrRunSchedule();
            })->name('buildingDetailPage:user');
        });
        /* Transaction History */
        Route::controller(TransactionController::class)->group(function () {
            /* Transaction Order */
            Route::post('/building/detail/{id}/transaction/order', 'orderBuildingUser')->name('orderBuilding:user');
            Route::post('/building/detail/{id}/transaction/payment', 'paymentBuildingUser')->name('paymentBuilding:user');
            Route::post('/building/detail/{id}/transaction/await-confirmation', 'confirmationBuildingUser')->name('confirmationBuilding:user');
            /* Transaction History */
            Route::post('/transaction', 'transactionPageUser', function() {
                clearOrRunSchedule();
            })->name('transactionPage:user');
            Route::get('/transaction/{id}', 'transactionPageUser')->name('transactionDetailPage:user');
            Route::get('/transaction/{id}/invoice', 'transactionInvoiceDownloadUser')->name('transactionInvoiceDownload:user');
        });
        /* Profiling */
        Route::controller(UserController::class)->group(function () {
            Route::get('/profile', 'profilePage', function() {
                clearOrRunSchedule();
            })->name('profilePage:user');
            Route::get('/profile/history-transaction', 'dataHistoryTransaction')->name('dataHistoryTransactionUser:user');
            Route::post('/profile/update', 'updateProfile')->name('updateProfile:user');
        });
    });
});
