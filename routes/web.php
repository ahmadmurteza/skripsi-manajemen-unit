<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/asdasd', function () {
    return 'asdasd';
});

Route::get('/update-location', [App\Http\Controllers\HomeController::class, 'location'])->name('unit.update.location');
route::post('/incident', [App\Http\Controllers\HomeController::class, 'incident'])->name('incident.store');
Route::get('/unit/pakai', [App\Http\Controllers\MasterUnitController::class, 'pakai'])->name('unit.pakai');
Route::post('/unit/info', [App\Http\Controllers\MasterUnitController::class, 'info'])->name('unit.info.location');
Route::post('/unit/keluar', [App\Http\Controllers\MasterUnitController::class, 'keluar'])->name('unit.info.keluar');
Route::get('/unit/semua', [App\Http\Controllers\MasterUnitController::class, 'semua'])->name('unit.info.semua');

Auth::routes();

Route::group(['middleware' => 'auth'], function()
{

    Route::get('/', function() {
        if (auth()->user()->role == 'operator') {
            return redirect()->route('unit.update.location');
        } else {
            
            return redirect()->route('home');
        }
    });

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // User
    Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user');
    Route::get('/user/create', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
    Route::get('/user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
    Route::delete('/user/delete/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('user.delete');

    // Location
    Route::get('/location', [App\Http\Controllers\LocationController::class, 'index'])->name('location');
    Route::get('/location/create', [App\Http\Controllers\LocationController::class, 'create'])->name('location.create');
    Route::post('/location/store', [App\Http\Controllers\LocationController::class, 'store'])->name('location.store');
    Route::get('/location/edit/{id}', [App\Http\Controllers\LocationController::class, 'edit'])->name('location.edit');
    Route::put('/location/update/{id}', [App\Http\Controllers\LocationController::class, 'update'])->name('location.update');
    Route::delete('/location/delete/{id}', [App\Http\Controllers\LocationController::class, 'delete'])->name('location.delete');

    // Warehouse
    Route::get('/warehouse', [App\Http\Controllers\WarehouseController::class, 'index'])->name('warehouse');
    Route::get('/warehouse/create', [App\Http\Controllers\WarehouseController::class, 'create'])->name('warehouse.create');
    Route::post('/warehouse/store', [App\Http\Controllers\WarehouseController::class, 'store'])->name('warehouse.store');
    Route::get('/warehouse/edit/{id}', [App\Http\Controllers\WarehouseController::class, 'edit'])->name('warehouse.edit');
    Route::put('/warehouse/update/{id}', [App\Http\Controllers\WarehouseController::class, 'update'])->name('warehouse.update');
    Route::delete('/warehouse/delete/{id}', [App\Http\Controllers\WarehouseController::class, 'delete'])->name('warehouse.delete');

    // Pembelian Sparepart
    Route::get('/sparepart-beli', [App\Http\Controllers\SparepartBeliController::class, 'index'])->name('sparepart-beli');
    Route::get('/sparepart-beli/create', [App\Http\Controllers\SparepartBeliController::class, 'create'])->name('sparepart-beli.create');
    Route::post('/sparepart-beli/store', [App\Http\Controllers\SparepartBeliController::class, 'store'])->name('sparepart-beli.store');
    Route::get('/sparepart-beli/edit/{id}', [App\Http\Controllers\SparepartBeliController::class, 'edit'])->name('sparepart-beli.edit');
    Route::put('/sparepart-beli/update/{id}', [App\Http\Controllers\SparepartBeliController::class, 'update'])->name('sparepart-beli.update');
    Route::delete('/sparepart-beli/delete/{id}', [App\Http\Controllers\SparepartBeliController::class, 'delete'])->name('sparepart-beli.delete');

    // Penggunaan Sparepart
    Route::get('/sparepart-pakai', [App\Http\Controllers\SparepartPakaiController::class, 'index'])->name('sparepart-pakai');
    Route::get('/sparepart-pakai/create', [App\Http\Controllers\SparepartPakaiController::class, 'create'])->name('sparepart-pakai.create');
    Route::post('/sparepart-pakai/store', [App\Http\Controllers\SparepartPakaiController::class, 'store'])->name('sparepart-pakai.store');
    Route::get('/sparepart-pakai/edit/{id}', [App\Http\Controllers\SparepartPakaiController::class, 'edit'])->name('sparepart-pakai.edit');
    Route::put('/sparepart-pakai/update/{id}', [App\Http\Controllers\SparepartPakaiController::class, 'update'])->name('sparepart-pakai.update');
    Route::delete('/sparepart-pakai/delete/{id}', [App\Http\Controllers\SparepartPakaiController::class, 'delete'])->name('sparepart-pakai.delete');

    // Service Berkala
    Route::get('/service', [App\Http\Controllers\ServiceController::class, 'index'])->name('service');
    Route::get('/service/create', [App\Http\Controllers\ServiceController::class, 'create'])->name('service.create');
    Route::post('/service/store', [App\Http\Controllers\ServiceController::class, 'store'])->name('service.store');
    Route::get('/service/edit/{id}', [App\Http\Controllers\ServiceController::class, 'edit'])->name('service.edit');
    Route::put('/service/update/{id}', [App\Http\Controllers\ServiceController::class, 'update'])->name('service.update');
    Route::delete('/service/delete/{id}', [App\Http\Controllers\ServiceController::class, 'delete'])->name('service.delete');

    // Master Unit
    Route::get('/unit', [App\Http\Controllers\MasterUnitController::class, 'index'])->name('unit');
    Route::get('/unit/create', [App\Http\Controllers\MasterUnitController::class, 'create'])->name('unit.create');
    Route::post('/unit/store', [App\Http\Controllers\MasterUnitController::class, 'store'])->name('unit.store');
    Route::get('/unit/edit/{id}', [App\Http\Controllers\MasterUnitController::class, 'edit'])->name('unit.edit');
    Route::put('/unit/update/{id}', [App\Http\Controllers\MasterUnitController::class, 'update'])->name('unit.update');
    Route::delete('/unit/delete/{id}', [App\Http\Controllers\MasterUnitController::class, 'delete'])->name('unit.delete');
    

    // Report
    Route::get('/report', [App\Http\Controllers\ReportController::class, 'index'])->name('report');
    Route::get('/report/create', [App\Http\Controllers\ReportController::class, 'create'])->name('report.create');
    Route::post('/report/store', [App\Http\Controllers\ReportController::class, 'store'])->name('report.store');
    Route::get('/report/edit/{id}', [App\Http\Controllers\ReportController::class, 'edit'])->name('report.edit');
    Route::put('/report/update/{id}', [App\Http\Controllers\ReportController::class, 'update'])->name('report.update');
    Route::delete('/report/delete/{id}', [App\Http\Controllers\ReportController::class, 'delete'])->name('report.delete');
    Route::post('/report/priority', [App\Http\Controllers\ReportController::class, 'priority'])->name('report.priority');
    Route::get('/report/show/{id}', [App\Http\Controllers\ReportController::class, 'show'])->name('report.show');
    Route::post('/report/discus', [App\Http\Controllers\ReportController::class, 'discus'])->name('report.discus');
    Route::get('/report/operator', [App\Http\Controllers\ReportController::class, 'operator'])->name('report.operator');

    // Pemberitahuan
    Route::get('/announcement', [App\Http\Controllers\AnnouncementController::class, 'index'])->name('announcement');
    // Cetak
    Route::get('/pdf', [App\Http\Controllers\PdfController::class, 'index'])->name('pdf');
    Route::get('/pdf/unit', [App\Http\Controllers\PdfController::class, 'printUnit'])->name('pdf.unit');
    Route::get('/pdf/service', [App\Http\Controllers\PdfController::class, 'printService'])->name('pdf.service');
    Route::get('/pdf/user', [App\Http\Controllers\PdfController::class, 'printUser'])->name('pdf.user');
    Route::get('/pdf/location', [App\Http\Controllers\PdfController::class, 'printLokasi'])->name('pdf.location');
    Route::get('/pdf/warehouse', [App\Http\Controllers\PdfController::class, 'printGudang'])->name('pdf.warehouse');
    Route::get('/pdf/pembelian', [App\Http\Controllers\PdfController::class, 'printPembelian'])->name('pdf.pembelian');
    Route::get('/pdf/penggunaan', [App\Http\Controllers\PdfController::class, 'printPenggunaan'])->name('pdf.penggunaan');
    Route::get('/pdf/rusak', [App\Http\Controllers\PdfController::class, 'printRusak'])->name('pdf.rusak');


    Route::get('/pasien', [App\Http\Controllers\PasienController::class, 'index'])->name('pasien');
    Route::get('/cetak', [App\Http\Controllers\PasienController::class, 'cetak'])->name('pasien.cetak');
    Route::get('/pasien/create', [App\Http\Controllers\PasienController::class, 'create'])->name('pasien.create');
    Route::post('/pasien/store', [App\Http\Controllers\PasienController::class, 'store'])->name('pasien.store');
    Route::get('/pasien/edit/{id}', [App\Http\Controllers\PasienController::class, 'edit'])->name('pasien.edit');
    Route::put('/pasien/update/{id}', [App\Http\Controllers\PasienController::class, 'update'])->name('pasien.update');
    Route::delete('/pasien/delete/{id}', [App\Http\Controllers\PasienController::class, 'delete'])->name('pasien.delete');
    
});