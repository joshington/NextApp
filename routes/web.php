
<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\User\BusinessController;
use App\Http\Controllers\User\CollectionsController;
use App\Http\Controllers\User\DeveloperController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\PayemtlinkController;
use App\Http\Controllers\User\WithdrawalsController;

use App\Http\Controllers\NxtBusinessKycController;
use App\Http\Controllers\NxtApiKeysController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/home', function () {
    return redirect()->route('user');
});

// logout
Route::get('/logout', function(Request $request){
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect()->route('login')->with('message','Your session has ended!');
})->name('logout');

// auth group
Route::middleware('guest')->group(function(){
    Route::prefix('auth')->group(function(){
        // login
        Route::controller(LoginController::class)->group(function(){
            Route::match(['get','post'],'/login', 'login')->name('login');
        });
        // register
        Route::controller(RegisterController::class)->group(function(){
            Route::match(['get','post'],'/register', 'register')->name('register');
        });
    });
});


Route::controller(NxtBusinessKycController::class)->group(function(){
    Route::post('/kyc','store')->name('upload');
});



// isUser user
Route::middleware('auth','auth.session')->group(function(){
    Route::prefix('user')->group(function(){
        // user
        Route::controller(HomeController::class)->group(function(){
            Route::get('/home', 'index')->name('user');
            Route::get('/account', 'account')->name('account');
        });

        // collections
        Route::prefix('collections')->group(function(){
            Route::controller(CollectionsController::class)->group(function(){
                Route::get('/', 'index')->name('all_collections');
                Route::get('/new', 'deposit')->name('new_collections');
            });
        });

        // collections
        Route::prefix('withdrawals')->group(function(){
            Route::controller(WithdrawalsController::class)->group(function(){
                Route::get('/', 'index')->name('all_withdrawals');
                Route::get('/new', 'withdrawal')->name('new_withdrawal');
            });
        });

        // payment links
        Route::prefix('paymentlinks')->group(function(){
            Route::controller(PayemtlinkController::class)->group(function(){
                Route::get('/', 'index')->name('all_links');
                Route::post('/new', 'store')->name('new_link');
            });
        });

        // business settings
        Route::prefix('businesses')->group(function(){
            Route::controller(BusinessController::class)->group(function(){
                Route::get('/', 'index')->name('all_businesses');
                Route::post('/new', 'store')->name('new_business');
            });
        });
        //==business kyc


        Route::prefix('businesses')->group(function(){
            Route::controller(NxtBusinessKycController::class)->group(function(){
                Route::post('/kyc', 'store')->name('upload');
            });
        });

        // business settings
        Route::prefix('developer')->group(function(){
            Route::controller(DeveloperController::class)->group(function(){
                Route::get('/', 'index')->name('api_home');
                Route::get('/api', 'api_settings')->name('api_settings');

                Route::get('/webhook', 'api_webhook')->name('api_webhook');
            });
            //====get the api keys from here
        });

    });
});

