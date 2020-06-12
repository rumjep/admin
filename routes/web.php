<?php

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
//Clear Cache facade value:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});

//Route cache:
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});



// // Utama
// Route::get('/', 'Utamacontroller@index');
// Route::get('/acara/daftar/{macara}', 'Utamacontroller@daftar');
// Route::post('/postdaftar', 'Utamacontroller@postdaftar');
// Route::get('/passdaftar', 'Utamacontroller@passdaftar');

// // Data Peserta Terverifikasi
// Route::get('/datapeserta/verif/{id}', 'Datapesertaverif@index');

// //Data Pemenang Doorprize
// Route::get('/datapemenang/dorprize/{id}', 'Datapemenang@index');

// Login
Route::get('/login', 'Authcontroller@index')->name('login');
Route::post('/postlogin', 'Authcontroller@postlogin');
Route::get('/logout', 'Authcontroller@logout');


// Halaman admin
// Dashboard
Route::group(['middleware'=>'auth'], function(){
	Route::get('/', 'DashboardController@index');
	// Acara
	Route::get('/acara', 'Acaracontroller@index');
	Route::post('/acara', 'Acaracontroller@store');
	Route::get('/acara/edit/{macara}', 'Acaracontroller@edit');
	Route::patch('/acara/{macara}', 'Acaracontroller@update');
	Route::get('/acara/del/{macara}', 'Acaracontroller@destroy');
	// Peserta
	Route::get('/peserta', 'Pesertacontroller@index');
	Route::get('/peserta/ver/{mpeserta}', 'Pesertacontroller@verif');
	Route::get('/peserta/unver/{mpeserta}', 'Pesertacontroller@unverif');
	Route::get('/peserta/del/{mpeserta}', 'Pesertacontroller@destroy');
	// Peserta Verif
	Route::get('/pesertav', 'Pesertaverif@index');
	// Admin
	Route::get('/user', 'Usercontroller@index');
	Route::post('/user', 'Usercontroller@store');
	Route::get('/user/del/{user}', 'Usercontroller@destroy');
	// Hadiah
	Route::get('/hadiah', 'Hadiahcontroller@index');
	Route::post('/hadiah', 'Hadiahcontroller@store');
	Route::get('/hadiah/del/{hadiahmodel}', 'Hadiahcontroller@destroy');
	// Pememang
	Route::get('/pemenang', 'Pemenangcontroller@index');
	Route::post('/pemenang', 'Pemenangcontroller@store');
	Route::get('/pemenang/del/{pemenangmodel}', 'Pemenangcontroller@destroy');
});

// Change status
Route::get('/user/changestatus/{user}', 'Usercontroller@changestatus');