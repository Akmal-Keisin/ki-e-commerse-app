<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthWebController;
use App\Http\Livewire\CategoryLivewire;
use App\Http\Livewire\DashboardLivewire;
use App\Http\Livewire\ProductLivewire;
use App\Http\Livewire\SalesReportLivewire;
use App\Http\Livewire\UserLivewire;
use App\Http\Livewire\AdminLivewire;

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

// Route::get('/simlink', function () {
//     return app('files')->link(storage_path('app/public'), public_path('storage'));
// });

Route::middleware('guest')->group(function() {
    Route::get('/login', [AuthWebController::class, 'getLogin'])->name('login');
    Route::post('/login', [AuthWebController::class, 'authLogin']);
});


// Route::middleware('auth')->group(function() {
    Route::get('/', function () {
        return redirect('/dashboard');
    });

    Route::get('/dashboard', DashboardLivewire::class)->name('home');
    Route::get('/product', ProductLivewire::class);
    Route::get('/sales-report', SalesReportLivewire::class);
    Route::get('/category', CategoryLivewire::class);
    Route::get('/user', UserLivewire::class);
    Route::get('/admin', AdminLivewire::class);

    Route::post('/logout', [AuthWebController::class, 'authLogout']);
// });

