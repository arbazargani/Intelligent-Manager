<?php

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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
Auth::routes();

Route::get('logout', function () {
    Auth::logout();
});

Route::middleware(['auth'])->group(function () {

    Route::get('/', 'App\Http\Controllers\PublicController@Index')->name('Index');

    Route::prefix('add')->group( function () {
        Route::any('customer', 'App\Http\Controllers\CustomerController@AddCustomer')->name('Customers > Add');;
        Route::any('service', 'App\Http\Controllers\ServiceController@AddService')->name('Services > Add');;
    });

    Route::prefix('list')->group( function () {
        Route::get('customers', 'App\Http\Controllers\CustomerController@ListCustomers')->name('Customers > List');
        Route::get('services', 'App\Http\Controllers\ServiceController@ListServices')->name('Services > List');
    });

    Route::prefix('customer')->group( function () {
        Route::get('{hash}', 'App\Http\Controllers\CustomerController@ShowCustomer')->name('Customer > Show');
    });

    Route::prefix('services')->group( function () {
        Route::get('{hash}', 'App\Http\Controllers\ServiceController@ListServices')->name('Service > Show');
        Route::any('update/{hash}', 'App\Http\Controllers\ServiceController@UpdateService')->name('Service > Update');
        Route::post('delete/{hash}', 'App\Http\Controllers\ServiceController@DeleteService')->name('Service > Delete');
    });
});





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
