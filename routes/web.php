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

Route::get('/', function () {
    return view('dashboard.layouts.index');
});

Auth::routes();

Route::resource('dashboard/petugas', 'AdminPetugasController', [
    'names' => [
        'index' => 'dashboard.petugas.index',
        'create' => 'dashboard.petugas.create',
        'edit' => 'dashboard.petugas.edit',
        'store' => 'dashboard.petugas.store',
        'update' => 'dashboard.petugas.update',
        'destroy' => 'dashboard.petugas.destroy',
        // etc...
    ]
]);

Route::resource('dashboard/pasien', 'AdminPasienController', [
    'names' => [
        'index' => 'dashboard.pasien.index',
        'create' => 'dashboard.pasien.create',
        'edit' => 'dashboard.pasien.edit',
        'store' => 'dashboard.pasien.store',
        'update' => 'dashboard.pasien.update',
        'destroy' => 'dashboard.pasien.destroy',
        // etc...
    ]
]);

Route::resource('dashboard/penyakit', 'AdminPenyakitController', [
    'names' => [
        'index' => 'dashboard.penyakit.index',
        'create' => 'dashboard.penyakit.create',
        'edit' => 'dashboard.penyakit.edit',
        'store' => 'dashboard.penyakit.store',
        'update' => 'dashboard.penyakit.update',
        'destroy' => 'dashboard.penyakit.destroy',
        // etc...
    ]
]);
Route::resource('dashboard/cek-pasien', 'AdminCekPasienController', [
    'names' => [
        'index' => 'dashboard.cekpasien.index',
        'create' => 'dashboard.cekpasien.create',
        'edit' => 'dashboard.cekpasien.edit',
        'store' => 'dashboard.cekpasien.store',
        'update' => 'dashboard.cekpasien.update',
        'destroy' => 'dashboard.cekpasien.destroy',
        // etc...
    ]
]);

Route::get('/dashboard/cek-pasien-detail/{id}', 'AdminCekPasienController@indexDetail')->name('cekpasien.indexDetail');
