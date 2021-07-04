<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::group(['middleware' => ['auth','web', 'role:admin']],function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::post('home/create', [App\Http\Controllers\HomeController::class, 'create']);
    Route::post('home/update', [App\Http\Controllers\HomeController::class, 'update']);
    Route::post('home/delete', [App\Http\Controllers\HomeController::class, 'destroy']);
    Route::get('home/dataTable', [App\Http\Controllers\HomeController::class, 'dataTable'])->name('home.dataTable');

	Route::prefix('Management')->group(function() {
    	Route::get('User/dataTable', [App\Http\Controllers\Management\UserController::class, 'dataTable'])->name('Management.User.dataTable');
    	Route::resource('User', '\App\Http\Controllers\Management\UserController', ['names' => 'Management.User']);

        Route::get('Profile/myProfile', [App\Http\Controllers\Management\ProfileController::class, 'myProfile'])->name('Management.Profile.myProfile');
        Route::get('Profile/dataTable', [App\Http\Controllers\Management\ProfileController::class, 'dataTable'])->name('Management.Profile.dataTable');
        Route::resource('Profile', '\App\Http\Controllers\Management\ProfileController', ['names' => 'Management.Profile']);
    });

    Route::prefix('Master')->group(function() {
        Route::get('Departemen/dataTable', [App\Http\Controllers\Master\DepartemenController::class, 'dataTable'])->name('Master.Departemen.dataTable');
        Route::resource('Departemen', '\App\Http\Controllers\Master\DepartemenController', ['names' => 'Master.Departemen']);

        Route::get('Model/dataTable', [App\Http\Controllers\Master\ModelController::class, 'dataTable'])->name('Master.Model.dataTable');
        Route::resource('Model', '\App\Http\Controllers\Master\ModelController', ['names' => 'Master.Model']);

        Route::get('PartNumber/dataTable', [App\Http\Controllers\Master\PartNumberController::class, 'dataTable'])->name('Master.PartNumber.dataTable');
        Route::resource('PartNumber', '\App\Http\Controllers\Master\PartNumberController', ['names' => 'Master.PartNumber']);

        Route::get('Rak/dataTable', [App\Http\Controllers\Master\RakController::class, 'dataTable'])->name('Master.Rak.dataTable');
        Route::resource('Rak', '\App\Http\Controllers\Master\RakController', ['names' => 'Master.Rak']);

        Route::post('Stock/getPartDetail', [App\Http\Controllers\Master\StockController::class, 'getPartDetail'])->name('Master.Stock.getPartDetail');
        Route::get('Stock/dataTable', [App\Http\Controllers\Master\StockController::class, 'dataTable'])->name('Master.Stock.dataTable');
        Route::resource('Stock', '\App\Http\Controllers\Master\StockController', ['names' => 'Master.Stock']);

    });

    Route::prefix('Transaksi')->group(function() {
        Route::post('Input/getPartNumber', [App\Http\Controllers\Transaksi\InputController::class, 'getPartNumber'])->name('Transaksi.Input.getPartNumber');
        Route::post('Input/getDetail', [App\Http\Controllers\Transaksi\InputController::class, 'getDetail'])->name('Transaksi.Input.getDetail');
        Route::get('Input/print/{id}', [App\Http\Controllers\Transaksi\InputController::class, 'print'])->name('Transaksi.Input.print');
        Route::get('Input/dataTable', [App\Http\Controllers\Transaksi\InputController::class, 'dataTable'])->name('Transaksi.Input.dataTable');
        Route::resource('Input', '\App\Http\Controllers\Transaksi\InputController', ['names' => 'Transaksi.Input']);

        Route::post('Output/getDetail', [App\Http\Controllers\Transaksi\OutputController::class, 'getDetail'])->name('Transaksi.Output.getDetail');
        Route::get('Output/print/{id}', [App\Http\Controllers\Transaksi\OutputController::class, 'print'])->name('Transaksi.Output.print');
        Route::get('Output/dataTable', [App\Http\Controllers\Transaksi\OutputController::class, 'dataTable'])->name('Transaksi.Output.dataTable');
        Route::resource('Output', '\App\Http\Controllers\Transaksi\OutputController', ['names' => 'Transaksi.Output']);

        Route::post('Gap/CreateActual', [App\Http\Controllers\Transaksi\GapController::class, 'CreateActual'])->name('Transaksi.Gap.CreateActual');
        Route::get('Gap/dataTable', [App\Http\Controllers\Transaksi\GapController::class, 'dataTable'])->name('Transaksi.Gap.dataTable');
        Route::resource('Gap', '\App\Http\Controllers\Transaksi\GapController', ['names' => 'Transaksi.Gap']);      
    });
        
});

Route::group(['middleware' => ['auth','web','role:user']], function() {
    Route::get('/Departemen/In', [App\Http\Controllers\Departemen\InController::class, 'index']);

    Route::prefix('Departemen')->group(function() {
        Route::post('In/getDetail', [App\Http\Controllers\Departemen\InController::class, 'getDetail'])->name('Departemen.In.getDetail');
        Route::post('In/getJumlah', [App\Http\Controllers\Departemen\InController::class, 'getJumlah'])->name('Departemen.In.getJumlah');
        Route::get('In/show_dataTable', [App\Http\Controllers\Departemen\InController::class, 'show_dataTable'])->name('Departemen.In.show_dataTable');
        Route::get('In/print/{id}', [App\Http\Controllers\Departemen\InController::class, 'print'])->name('Departemen.In.print');
        Route::get('In/dataTable', [App\Http\Controllers\Departemen\InController::class, 'dataTable'])->name('Departemen.In.dataTable');
        Route::resource('In', '\App\Http\Controllers\Departemen\InController', ['names' => 'Departemen.In']);

        Route::post('Out/getDetail', [App\Http\Controllers\Departemen\OutController::class, 'getDetail'])->name('Departemen.Out.getDetail');
        Route::get('Out/print/{id}', [App\Http\Controllers\Departemen\OutController::class, 'print'])->name('Departemen.Out.print');
        Route::get('Out/dataTable', [App\Http\Controllers\Departemen\OutController::class, 'dataTable'])->name('Departemen.Out.dataTable');
        Route::resource('Out', '\App\Http\Controllers\Departemen\OutController', ['names' => 'Departemen.Out']);

        Route::get('Gap/dataTable', [App\Http\Controllers\Departemen\GapController::class, 'dataTable'])->name('Departemen.Gap.dataTable');
        Route::resource('Gap', '\App\Http\Controllers\Departemen\GapController', ['names' => 'Departemen.Gap']);
    });
});