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
Route::controller(TransactionController::class)->group(function () {
    Route::post('/building/detail/{id}/transaction/order-without-login', 'orderBuildingUser')->name('orderBuildingWithoutLogin:user');
    Route::post('/building/detail/{id}/transaction/payment-without-login', 'paymentBuildingUser')->name('paymentBuildingWithoutLogin:user');
    Route::post('/building/detail/{id}/transaction/await-confirmation-without-login', 'confirmationBuildingUser')->name('confirmationBuildingWithoutLogin:user');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/user/profile', 'profilePageUser', function() {
        clearOrRunSchedule();
    })->name('profilePage:user');
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
            Route::get('/', 'dashboardPageAdmin')->name('dashboardPage:admin');
            Route::get('/counter-dashboard', 'dashboardCounterAdmin')->name('counterDashboard:admin');
        });
        /* Master Building */
        Route::controller(BuildingController::class)->group(function () {
            /* Admin */
            Route::get('/building', 'buildingPageAdmin', function() {
                clearOrRunSchedule();
            })->name('buildingPage:admin');
            Route::get('/building/dashboard', 'dashboardBuildingAdmin')->name('dashboardBuilding:admin');
            Route::get('/building/list-verified', 'listBuildingAdminVerified')->name('listBuildingVerified:admin');
            Route::get('/building/list-unverified', 'listBuildingAdminUnverified')->name('listBuildingUnverified:admin');
            Route::get('/building/detail-building/{id}', 'detailPageBuildingAdmin', function() {
                clearOrRunSchedule();
            })->name('detailPageBuilding:admin');
            Route::get('/building/add-building', 'addPageBuildingAdmin')->name('addPageBuilding:admin');
            Route::post('/building/add', 'addBuildingAdmin')->name('addBuilding:admin');
            Route::post('/building/update/{id}', 'updateBuildingAdmin')->name('updateBuilding:admin');
            Route::get('/building/delete/{id}', 'deleteBuildingAdmin')->name('deleteBuilding:admin');
            Route::get('/building/verify/{id}', 'verifyBuildingAdmin')->name('verifyBuilding:admin');
        });
        /* Transaction */
        Route::controller(TransactionController::class)->group(function () {
            /* Order */
            Route::get('/order', 'orderPageAdmin', function() {
                clearOrRunSchedule();
            })->name('orderPage:admin');
            Route::get('/order/dashboard', 'dashboardOrderAdmin')->name('dashboardOrder:admin');
            Route::get('/order/list', 'listOrderAdmin')->name('listOrder:admin');
            Route::get('/order/update/{id}', 'updateOrderAdmin')->name('updateOrder:admin');
            /* Transaction History */
            Route::get('/transaction', 'transactionPageAdmin', function() {
                clearOrRunSchedule();
            })->name('transactionPage:admin');
            Route::get('/transaction/dashboard', 'dashboardTransactionAdmin')->name('dashboardTransaction:admin');
            Route::get('/transaction/list', 'listTransactionAdmin')->name('listTransaction:admin');
            Route::get('/transaction/detail/{id}', 'detailTransactionAdmin')->name('detailTransaction:admin');
            Route::get('/transaction/update/{id}', 'updateTransactionAdmin')->name('updateTransaction:admin');
        });
        /* Master User */
        Route::controller(UserController::class)->group(function () {
            Route::get('/user', 'userPageAdmin', function() {
                clearOrRunSchedule();
            })->name('userPage:admin');
            Route::get('/user/dashboard', 'dashboardUserAdmin')->name('dashboardUser:admin');
            Route::get('/user/list', 'listUserAdmin')->name('listUser:admin');
            Route::get('/user/detail', 'detailUserAdmin')->name('detailUser:admin');
            Route::post('/user/add', 'addUserAdmin')->name('addUser:admin');
            Route::post('/user/update', 'updateUserAdmin')->name('updateUser:admin');
            Route::get('/user/delete', 'deleteUserAdmin')->name('deleteUser:admin');
            Route::get('/user/verify', 'verifyUserAdmin')->name('verifyUser:admin');
        });
        /* Profiling */
        Route::controller(UserController::class)->group(function () {
            Route::get('/profile', 'profilePageAdmin', function() {
                clearOrRunSchedule();
            })->name('profilePage:admin');
            Route::post('/profile/update', 'updateProfileAdmin')->name('updateProfile:admin');
            Route::post('/profile/password', 'updatePasswordProfileAdmin')->name('updatePasswordProfile:admin');
        });
    });
    /* Owner Page */
    /* Admin Entry Page */
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
            // Perlu perbaikan route untuk User Order Ruangan
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
            Route::get('/profile', 'profilePageUser', function() {
                clearOrRunSchedule();
            })->name('profilePage:user');
            Route::post('/profile/update', 'updateProfileUser')->name('updateProfile:user');
            Route::post('/profile/password', 'updatePasswordProfileUser')->name('updatePasswordProfile:user');
        });
    });
});
