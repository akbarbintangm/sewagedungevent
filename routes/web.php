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
    Route::get('/get-bank-number/{id}', 'getBankNumberOwner')->name('getBankNumberOwner:user');
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
            Route::get('/building', 'buildingPage', function() {
                clearOrRunSchedule();
            })->name('buildingPage:admin');
            Route::get('/building/dashboard', 'dashboardBuilding')->name('dashboardBuilding:admin');
            Route::get('/building/list-verified', 'listBuildingVerified')->name('listBuildingVerified:admin');
            Route::get('/building/list-unverified', 'listBuildingUnverified')->name('listBuildingUnverified:admin');
            Route::get('/building/list-canceled', 'listBuildingCanceled')->name('listBuildingCanceled:admin');
            Route::get('/building/detail-building/{id}', 'detailPageBuilding', function() {
                clearOrRunSchedule();
            })->name('detailPageBuilding:admin');
            Route::get('/building/add-building', 'addPageBuilding')->name('addPageBuilding:admin');
            Route::post('/building/add', 'addBuilding')->name('addBuilding:admin');
            Route::post('/building/update/{id}', 'updateBuilding')->name('updateBuilding:admin');
            Route::get('/building/delete/{id}', 'deleteBuilding')->name('deleteBuilding:admin');
            Route::get('/building/verify/{id}', 'verifyBuilding')->name('verifyBuilding:admin');
            Route::get('/building/cancel/{id}', 'cancelBuilding')->name('cancelBuilding:admin');
        });
        /* Transaction */
        Route::controller(TransactionController::class)->group(function () {
            /* Order */
            Route::get('/order', 'orderPage', function() {
                clearOrRunSchedule();
            })->name('orderPage:admin');
            Route::get('/order/dashboard', 'dashboardOrder')->name('dashboardOrder:admin');
            Route::get('/order/list', 'listOrder')->name('listOrder:admin');
            Route::get('/order/list-canceled', 'listOrderCanceled')->name('listOrderCanceled:admin');
            Route::get('/order/update/{id}', 'updateOrder')->name('updateOrder:admin');
            Route::get('/order/cancel/{id}', 'cancelOrder')->name('cancelOrder:admin');
            /* Transaction History */
            Route::get('/transaction', 'transactionPage', function() {
                clearOrRunSchedule();
            })->name('transactionPage:admin');
            Route::get('/transaction/dashboard', 'dashboardTransaction')->name('dashboardTransaction:admin');
            Route::get('/transaction/list', 'listTransaction')->name('listTransaction:admin');
            Route::get('/transaction/detail/{id}', 'detailTransaction')->name('detailTransaction:admin');
            Route::get('/transaction/update/{id}', 'updateTransaction')->name('updateTransaction:admin');
            Route::get('/transaction/cancel/{id}', 'cancelTransaction')->name('cancelTransaction:admin');
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
            Route::get('/profile', 'profilePage', function() {
                clearOrRunSchedule();
            })->name('profilePage:admin');
            Route::post('/profile/update', 'updateProfile')->name('updateProfile:admin');
        });
    });
    /* Admin Entry Page */
    Route::group(['prefix' => 'admin-entry'], function () {
        Route::get('/reset', function () {
            clearOrRunSchedule();
            return redirect()
                ->route('dashboardPage:admin-entry')
                ->with('info', 'Data Cache telah dibersihkan.');
        })->name('admin-reset');
        /* Dashboard */
        Route::controller(HomeController::class)->group(function () {
            Route::get('/', 'dashboardPage')->name('dashboardPage:admin-entry');
            Route::get('/counter-dashboard', 'dashboardCounter')->name('counterDashboard:admin-entry');
        });
        /* Master Building */
        Route::controller(BuildingController::class)->group(function () {
            Route::get('/building', 'buildingPage', function() {
                clearOrRunSchedule();
            })->name('buildingPage:admin-entry');
            Route::get('/building/dashboard', 'dashboardBuilding')->name('dashboardBuilding:admin-entry');
            Route::get('/building/list-verified', 'listBuildingVerified')->name('listBuildingVerified:admin-entry');
            Route::get('/building/list-unverified', 'listBuildingUnverified')->name('listBuildingUnverified:admin-entry');
            Route::get('/building/list-canceled', 'listBuildingCanceled')->name('listBuildingCanceled:admin-entry');
            Route::get('/building/detail-building/{id}', 'detailPageBuilding', function() {
                clearOrRunSchedule();
            })->name('detailPageBuilding:admin-entry');
            Route::get('/building/add-building', 'addPageBuilding')->name('addPageBuilding:admin-entry');
            Route::post('/building/add', 'addBuilding')->name('addBuilding:admin-entry');
            Route::post('/building/update/{id}', 'updateBuilding')->name('updateBuilding:admin-entry');
            Route::get('/building/delete/{id}', 'deleteBuilding')->name('deleteBuilding:admin-entry');
            Route::get('/building/verify/{id}', 'verifyBuilding')->name('verifyBuilding:admin-entry');
            Route::get('/building/cancel/{id}', 'cancelBuilding')->name('cancelBuilding:admin-entry');
        });
        /* Transaction */
        Route::controller(TransactionController::class)->group(function () {
            /* Order */
            Route::get('/order', 'orderPage', function() {
                clearOrRunSchedule();
            })->name('orderPage:admin-entry');
            Route::get('/order/dashboard', 'dashboardOrder')->name('dashboardOrder:admin-entry');
            Route::get('/order/list', 'listOrder')->name('listOrder:admin-entry');
            Route::get('/order/list-canceled', 'listOrderCanceled')->name('listOrderCanceled:admin-entry');
            Route::get('/order/update/{id}', 'updateOrder')->name('updateOrder:admin-entry');
            Route::get('/order/cancel/{id}', 'cancelOrder')->name('cancelOrder:admin-entry');
            /* Transaction History */
            Route::get('/transaction', 'transactionPage', function() {
                clearOrRunSchedule();
            })->name('transactionPage:admin-entry');
            Route::get('/transaction/dashboard', 'dashboardTransaction')->name('dashboardTransaction:admin-entry');
            Route::get('/transaction/list', 'listTransaction')->name('listTransaction:admin-entry');
            Route::get('/transaction/detail/{id}', 'detailTransaction')->name('detailTransaction:admin-entry');
            Route::get('/transaction/update/{id}', 'updateTransaction')->name('updateTransaction:admin-entry');
            Route::get('/transaction/cancel/{id}', 'cancelTransaction')->name('cancelTransaction:admin-entry');
        });
        /* Master User */
        Route::controller(UserController::class)->group(function () {
            Route::get('/user', 'userPage', function() {
                clearOrRunSchedule();
            })->name('userPage:admin-entry');
            Route::get('/user/dashboard', 'dashboardUser')->name('dashboardUser:admin-entry');
            Route::get('/user/list', 'listUser')->name('listUser:admin-entry');
            Route::get('/user/detail/{id}', 'detailUser')->name('detailUser:admin-entry');
            Route::get('/user/delete/{id}', 'deleteUser')->name('deleteUser:admin-entry');
            Route::get('/user/verify/{id}', 'verifyUser')->name('verifyUser:admin-entry');
            Route::get('/user/unverify/{id}', 'unverifyUser')->name('unverifyUser:admin-entry');
        });
        /* Profiling */
        Route::controller(UserController::class)->group(function () {
            Route::get('/profile', 'profilePage', function() {
                clearOrRunSchedule();
            })->name('profilePage:admin-entry');
            Route::post('/profile/update', 'updateProfile')->name('updateProfile:admin-entry');
        });
    });
    /* Owner Page */
    Route::group(['prefix' => 'owner'], function () {
        Route::get('/reset', function () {
            clearOrRunSchedule();
            return redirect()
                ->route('dashboardPage:owner')
                ->with('info', 'Data Cache telah dibersihkan.');
        })->name('admin-reset');
        /* Dashboard */
        Route::controller(HomeController::class)->group(function () {
            Route::get('/', 'dashboardPage')->name('dashboardPage:owner');
            Route::get('/counter-dashboard', 'dashboardCounter')->name('counterDashboard:owner');
        });
        /* Master Building */
        Route::controller(BuildingController::class)->group(function () {
            Route::get('/building', 'buildingPage', function() {
                clearOrRunSchedule();
            })->name('buildingPage:owner');
            Route::get('/building/dashboard', 'dashboardBuilding')->name('dashboardBuilding:owner');
            Route::get('/building/list-verified', 'listBuildingVerified')->name('listBuildingVerified:owner');
            Route::get('/building/list-unverified', 'listBuildingUnverified')->name('listBuildingUnverified:owner');
            Route::get('/building/list-canceled', 'listBuildingCanceled')->name('listBuildingCanceled:owner');
            Route::get('/building/detail-building/{id}', 'detailPageBuilding', function() {
                clearOrRunSchedule();
            })->name('detailPageBuilding:owner');
            Route::get('/building/add-building', 'addPageBuilding')->name('addPageBuilding:owner');
            Route::post('/building/add', 'addBuilding')->name('addBuilding:owner');
            Route::post('/building/update/{id}', 'updateBuilding')->name('updateBuilding:owner');
            Route::get('/building/delete/{id}', 'deleteBuilding')->name('deleteBuilding:owner');
            Route::get('/building/verify/{id}', 'verifyBuilding')->name('verifyBuilding:owner');
            Route::get('/building/cancel/{id}', 'cancelBuilding')->name('cancelBuilding:owner');
        });
        /* Transaction */
        Route::controller(TransactionController::class)->group(function () {
            /* Order */
            Route::get('/order', 'orderPage', function() {
                clearOrRunSchedule();
            })->name('orderPage:owner');
            Route::get('/order/dashboard', 'dashboardOrder')->name('dashboardOrder:owner');
            Route::get('/order/list', 'listOrder')->name('listOrder:owner');
            Route::get('/order/list-canceled', 'listOrderCanceled')->name('listOrderCanceled:owner');
            Route::get('/order/update/{id}', 'updateOrder')->name('updateOrder:owner');
            Route::get('/order/cancel/{id}', 'cancelOrder')->name('cancelOrder:owner');
            /* Transaction History */
            Route::get('/transaction', 'transactionPage', function() {
                clearOrRunSchedule();
            })->name('transactionPage:owner');
            Route::get('/transaction/dashboard', 'dashboardTransaction')->name('dashboardTransaction:owner');
            Route::get('/transaction/list', 'listTransaction')->name('listTransaction:owner');
            Route::get('/transaction/detail/{id}', 'detailTransaction')->name('detailTransaction:owner');
            Route::get('/transaction/update/{id}', 'updateTransaction')->name('updateTransaction:owner');
            Route::get('/transaction/cancel/{id}', 'cancelTransaction')->name('cancelTransaction:owner');
        });
        /* Master User */
        Route::controller(UserController::class)->group(function () {
            Route::get('/user', 'userPage', function() {
                clearOrRunSchedule();
            })->name('userPage:owner');
            Route::get('/user/dashboard', 'dashboardUser')->name('dashboardUser:owner');
            Route::get('/user/list', 'listUser')->name('listUser:owner');
            Route::get('/user/detail/{id}', 'detailUser')->name('detailUser:owner');
            Route::get('/user/delete/{id}', 'deleteUser')->name('deleteUser:owner');
            Route::get('/user/verify/{id}', 'verifyUser')->name('verifyUser:owner');
            Route::get('/user/unverify/{id}', 'unverifyUser')->name('unverifyUser:owner');
        });
        /* Profiling */
        Route::controller(UserController::class)->group(function () {
            Route::get('/profile', 'profilePage', function() {
                clearOrRunSchedule();
            })->name('profilePage:owner');
            Route::post('/profile/update', 'updateProfile')->name('updateProfile:owner');
        });
    });
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
            Route::get('/get-booking-date/{id}', 'getBookingDateUser')->name('getBookingDate:user');
            Route::get('/get-bank-number/{id}', 'getBankNumberOwner')->name('getBankNumberOwner:user');
            /* Building List */
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
