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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('/')->namespace('App\Http\Controllers')->group(function(){
    Route::get('/','AdminController@dashboard')->name('dashboard');
    Route::get('/dashboard','AdminController@dashboardLain')->name('dashboard2');
    Route::post('/input','AdminController@store')->name('dashboard.store');
    Route::post('/input_detail','AdminController@store_detail')->name('dashboard.store_detail');
    Route::get('/respon','AdminController@respon')->name('dashboard.respon');
    Route::get('/getsemuadatapengguna/{id}','AdminController@getsemuadatapengguna')->name('dashboard.getsemuadatapengguna');
    Route::post('/getnim','AdminController@getnim')->name('dashboard.getnim');
    Route::get('/hapus/{id}','AdminController@hapus')->name('dashboard.hapus');
    Route::get('/ubahstatus1/{id}/{id1}','AdminController@ubahstatus1')->name('ubahstatus1');
    Route::post('/cekAlat','AdminController@cekAlat')->name('cekAlat');

    Route::controller(LoginController::class)->group(function() {
        Route::get('/login', 'login')->name('login');
        Route::post('/authenticate', 'authenticate')->name('authenticate');
        Route::get('/logout', 'logout')->name('logout');
    });

    Route::controller(ImageController::class)->middleware('auth')->group(function(){
        Route::get('gallery', 'index')->name('gallery');
        Route::post('gallery', 'store')->name('image.store');
    });

    Route::controller(PDFController::class)->middleware('auth')->group(function() {
        Route::get('pdf', 'index')->name('pdf');
        Route::post('generate-pdf', 'generatePDF')->name('generate-pdf');
    });

    Route::controller(ImportExportController::class)->middleware('auth')->group(function(){
        Route::get('excel', 'index')->name('excel');
        Route::get('import_export', 'importExport');
        Route::post('import', 'import')->name('import');
        Route::get('export', 'export')->name('export');
    });

    Route::controller(RuanganController::class)->middleware('auth')->group(function() {
        Route::get('ruangan', 'index')->name('ruangan');
        Route::get('ruangan/create', 'create')->name('create');
        Route::post('ruangan/store', 'store')->name('store');
        Route::get('ruangan/detail/{id}', 'detail')->name('detail');
    });
    Route::controller(PenggunaController::class)->middleware('auth')->group(function() {
        Route::get('pengguna', 'index')->name('pengguna');
        Route::get('pengguna/create', 'create')->name('pengguna.create');
        Route::post('pengguna/store', 'store')->name('pengguna.store');
        Route::get('pengguna/ubahstatus1/{id}/{id1}', 'ubahstatus1')->name('pengguna.ubahstatus1');
        Route::get('pengguna/ubahstatus0/{id}/{id1}', 'ubahstatus0')->name('pengguna.ubahstatus0');
        Route::get('pengguna/detail/{id}/', 'detail')->name('pengguna.detail');
        Route::get('pengguna/exportAll/', 'exportAll')->name('pengguna.exportAll');
        Route::post('pengguna/exportByTahun/', 'exportByTahun')->name('pengguna.exportByTahun');
        Route::get('pengguna/exportByHari/', 'exportByHari')->name('pengguna.exportByHari');
    });
    Route::resource('alat', AlatController::class)->middleware('auth');
    Route::resource('tas', TasController::class)->middleware('auth');
    Route::resource('user', UserController::class)->middleware('auth');
    Route::resource('akun', AccountController::class)->middleware('auth');
});
