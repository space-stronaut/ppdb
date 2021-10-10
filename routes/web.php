<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\SmpController;
use App\Models\Jurusan;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', [DashboardController::class, 'index']);

Auth::routes();

Route::resource('jurusan', JurusanController::class);
Route::get('/jurusan/{id}/delete', [JurusanController::class, 'destroy']);
Route::resource('smp', SmpController::class);
Route::get('/smp/{id}/delete', [SmpController::class, 'destroy']);
Route::resource('role', RolesController::class);
Route::resource('pendaftaran', PendaftaranController::class);
Route::get('/role/{id}/delete', [RolesController::class, 'destroy']);
Route::get('/pendaftaran/{id}/delete', [PendaftaranController::class, 'destroy']);
Route::get('/unduh/{id}', [PendaftaranController::class, 'unduh']);
Route::post('/status/{id}', [PendaftaranController::class, 'status']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
