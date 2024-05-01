<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Use App\Http\Controllers\HistoryController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\TransactionController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

Auth::routes();
/* Clear Cache */
Route::get('/reset', function () {
    $status1 = Artisan::call('route:clear');
    $status2 = Artisan::call('config:clear');
    $status3 = Artisan::call('cache:clear');
    $status4 = Artisan::call('view:clear');
    $status5 = Artisan::call('optimize:clear');
    return redirect()
        ->back()
        ->with('info', 'Data Cache telah dibersihkan.');
})->name('reset');
/* Login & Logout */
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login')->middleware('guest');
    Route::post('/login/auth', 'login')->name('auth-login');
    Route::get('/logout', 'logout')->name('auth-logout');
    Route::get('/reset-logout', 'password_reset_logout')->name('reset-logout');
});
/* Register */
Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'index')->name('auth-register')->middleware('guest');
    Route::post('/register', 'register')->name('auth-registration');
});
/* User Page without Login */
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'indexWithoutLoginPageUser')->name('landingWithoutLoginPage:user')->middleware('guest');
    Route::get('/building', 'buildingWithoutLoginPageUser')->name('buildingWithoutLoginPage:user')->middleware('guest');
    Route::get('/building/detail/{id}', 'buildingDetailWithoutLoginPageUser')->name('buildingDetailWithoutLoginPage:user')->middleware('guest');
    Route::get('/get-booking-date/{id}', 'getBookingDateUser')->name('getBookingDate:user');
});
Route::controller(TransactionController::class)->group(function () {
    Route::post('/building/detail/{id}/transaction/order-without-login', 'orderBuildingWithoutLoginUser')->name('orderBuildingWithoutLogin:user')->middleware('guest');
    Route::post('/building/detail/{id}/transaction/payment-without-login', 'paymentBuildingWithoutLoginUser')->name('paymentBuildingWithoutLogin:user')->middleware('guest');
    Route::post('/building/detail/{id}/transaction/await-confirmation-without-login', 'confirmationBuildingWithoutLoginUser')->name('confirmationBuildingWithoutLogin:user')->middleware('guest');
});

/* Middleware */
Route::middleware(['auth'])->group(function () {
    /* Histories API for All User with their Login Info */
    Route::controller(HistoryController::class)->group(function () {
        Route::get('/notifications', 'notifications')->name('notifications');
    });
    /* Admin Page */
    Route::group(['prefix' => 'admin'], function () {
        /* Dashboard */
        Route::controller(HomeController::class)->group(function () {
            Route::get('/', 'dashboardPageAdmin')->name('dashboardPage:admin');
        });
        /* Master Building */
        Route::controller(BuildingController::class)->group(function () {
            /* Admin */
            Route::get('/building', 'buildingPageAdmin')->name('buildingPage:admin');
            Route::get('/building/dashboard', 'dashboardBuildingAdmin')->name('dashboardBuilding:admin');
            Route::get('/building/list-verified', 'listBuildingAdminVerified')->name('listBuildingVerified:admin');
            Route::get('/building/list-unverified', 'listBuildingAdminUnverified')->name('listBuildingUnverified:admin');
            // Route::get('/building/detail', 'detailBuildingAdmin')->name('detailBuilding:admin');
            Route::get('/building/detail-building/{id}', 'detailPageBuildingAdmin')->name('detailPageBuilding:admin');
            Route::get('/building/add-building', 'addPageBuildingAdmin')->name('addPageBuilding:admin');
            Route::post('/building/add', 'addBuildingAdmin')->name('addBuilding:admin');
            Route::post('/building/update/{id}', 'updateBuildingAdmin')->name('updateBuilding:admin');
            Route::get('/building/delete/{id}', 'deleteBuildingAdmin')->name('deleteBuilding:admin');
            Route::get('/building/verify/{id}', 'verifyBuildingAdmin')->name('verifyBuilding:admin');
        });
        /* Transaction */
        Route::controller(TransactionController::class)->group(function () {
            /* Order */
            Route::get('/order', 'orderPageAdmin')->name('orderPage:admin');
            Route::get('/order/{id}/detail', 'orderDetailPageAdmin')->name('orderDetailPage:admin');
            Route::get('/order/dashboard', 'dashboardOrderAdmin')->name('dashboardOrder:admin');
            Route::get('/order/list', 'listOrderAdmin')->name('listOrder:admin');
            Route::get('/order/detail', 'detailOrderAdmin')->name('detailOrder:admin');
            // Route::post('/order/add', 'addOrderAdmin')->name('addOrder:admin');
            Route::post('/order/update', 'updateOrderAdmin')->name('updateOrder:admin');
            Route::get('/order/delete', 'deleteOrderAdmin')->name('deleteOrder:admin');
            /* Transaction History */
            Route::get('/transaction', 'transactionPageAdmin')->name('transactionPage:admin');
            Route::get('/transaction/{id}/detail', 'transactionDetailPageAdmin')->name('transactionDetailPage:admin');
            Route::get('/transaction/dashboard', 'dashboardTransactionAdmin')->name('dashboardTransaction:admin');
            Route::get('/transaction/list', 'listTransactionAdmin')->name('listTransaction:admin');
            Route::get('/transaction/detail', 'detailTransactionAdmin')->name('detailTransaction:admin');
            // Route::post('/transaction/add', 'addTransactionAdmin')->name('addTransaction:admin');
            // Route::post('/transaction/update', 'updateTransactionAdmin')->name('updateTransaction:admin');
            Route::get('/transaction/delete', 'deleteTransactionAdmin')->name('deleteTransaction:admin');
        });
        /* Master User */
        Route::controller(UserController::class)->group(function () {
            Route::get('/user', 'userPageAdmin')->name('userPage:admin');
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
            Route::get('/profile', 'profilePageAdmin')->name('profilePage:admin');
            Route::post('/profile/update', 'updateProfileAdmin')->name('updateProfile:admin');
            Route::post('/profile/password', 'updatePasswordProfileAdmin')->name('updatePasswordProfile:admin');
        });
    });
    /* Owner Page */
    Route::group(['prefix' => 'owner'], function () {
        /* Dashboard */
        Route::controller(HomeController::class)->group(function () {
            Route::get('/', 'dashboardPageOwner')->name('dashboardPage:owner');
        });
        /* Master Building */
        Route::controller(BuildingController::class)->group(function () {
            /* Owner */
            Route::get('/building', 'buildingPageOwner')->name('buildingPage:owner');
            Route::get('/building/dashboard', 'dashboardBuildingOwner')->name('dashboardBuilding:owner');
            Route::get('/building/list', 'listBuildingOwner')->name('listBuilding:owner');
            // Route::get('/building/detail', 'detailBuildingOwner')->name('detailBuilding:owner');
            Route::get('/building/detail-building/{id}', 'detailPageBuildingOwner')->name('detailPageBuilding:owner');
            Route::get('/building/add-building', 'addPageBuildingOwner')->name('addPageBuilding:owner');
            Route::post('/building/add', 'addBuildingOwner')->name('addBuilding:owner');
            Route::post('/building/update', 'updateBuildingOwner')->name('updateBuilding:owner');
            Route::get('/building/delete', 'deleteBuildingOwner')->name('deleteBuilding:owner');
            Route::get('/building/verify', 'verifyBuildingOwner')->name('verifyBuilding:owner');
        });
        /* Transaction */
        Route::controller(TransactionController::class)->group(function () {
            /* Order */
            Route::get('/order', 'orderPageOwner')->name('orderPage:owner');
            Route::get('/order/{id}/detail', 'orderDetailPageOwner')->name('orderDetailPage:owner');
            Route::get('/order/dashboard', 'dashboardOrderOwner')->name('dashboardOrder:owner');
            Route::get('/order/list', 'listOrderOwner')->name('listOrder:owner');
            Route::get('/order/detail', 'detailOrderOwner')->name('detailOrder:owner');
            // Route::post('/order/add', 'addOrderOwner')->name('addOrder:owner');
            Route::post('/order/update', 'updateOrderOwner')->name('updateOrder:owner');
            // Route::get('/order/delete', 'deleteOrderOwner')->name('deleteOrder:owner');
            /* Transaction History */
            Route::get('/transaction', 'transactionPageOwner')->name('transactionPage:owner');
            Route::get('/transaction/{id}/detail', 'transactionDetailPageOwner')->name('transactionDetailPage:owner');
            Route::get('/transaction/dashboard', 'dashboardTransactionOwner')->name('dashboardTransaction:owner');
            Route::get('/transaction/list', 'listTransactionOwner')->name('listTransaction:owner');
            Route::get('/transaction/detail', 'detailTransactionOwner')->name('detailTransaction:owner');
            // Route::post('/transaction/add', 'addTransactionOwner')->name('addTransaction:owner');
            // Route::post('/transaction/update', 'updateTransactionOwner')->name('updateTransaction:owner');
            // Route::get('/transaction/delete', 'deleteTransactionOwner')->name('deleteTransaction:owner');
        });
        /* Profiling */
        Route::controller(UserController::class)->group(function () {
            Route::get('/profile', 'profilePageOwner')->name('profilePage:owner');
            Route::post('/profile/update', 'updateProfileOwner')->name('updateProfile:owner');
            Route::post('/profile/password', 'updatePasswordProfileOwner')->name('updatePasswordProfile:owner');
        });
    });
    /* User Page */
    Route::group(['prefix' => 'user'], function () {
        /* Home */
        Route::controller(HomeController::class)->group(function () {
            Route::get('/', 'indexPageUser')->name('homePage:user');
        });
        /* Building List */
        Route::controller(BuildingController::class)->group(function () {
            /* Page, Detail, and Lists */
            Route::get('/building', 'buildingPageUser')->name('buildingPage:user');
            Route::get('/building/detail/{id}', 'buildingDetailPageUser')->name('buildingDetailPage:user');
        });
        /* Transaction History */
        Route::controller(TransactionController::class)->group(function () {
            // Perlu perbaikan route untuk User Order Ruangan
            /* Building Order */
            Route::get('/building/detail/{id}/transaction/order', 'orderBuildingUser')->name('orderBuilding:user');
            /* Payment */
            Route::get('/building/detail/{id}/transaction/payment', 'paymentBuildingUser')->name('paymentBuilding:user');
            /* Awaiting Confirmation */
            Route::get('/building/detail/{id}/transaction/await-confirmation', 'confirmationBuildingUser')->name('confirmationBuilding:user');
            /* Invoice Page */
            // Route::get('/building/detail/{id}/transaction/invoice/{sid}', 'invoiceBuildingPageUser')->name('invoiceBuildingPage:user');
            /* Transaction History */
            Route::post('/transaction', 'transactionPageUser')->name('transactionPage:user');
            Route::get('/transaction/{id}', 'transactionPageUser')->name('transactionDetailPage:user');
            Route::get('/transaction/{id}/invoice', 'transactionInvoiceDownloadUser')->name('transactionInvoiceDownload:user');
        });
        /* Profiling */
        Route::controller(UserController::class)->group(function () {
            Route::get('/profile', 'profilePageUser')->name('profilePage:user');
            Route::post('/profile/update', 'updateProfileUser')->name('updateProfile:user');
            Route::post('/profile/password', 'updatePasswordProfileUser')->name('updatePasswordProfile:user');
        });
    });
});
