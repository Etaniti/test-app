<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\XmlReaderController;

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

Route::get('/', [App\Http\Livewire\Organizations::class, 'index']);

Route::match(['get', 'post'], '/xml-upload', [XmlReaderController::class, 'index']);

Route::post('/organizations', [App\Http\Livewire\Organizations::class, 'store']);
Route::get('/organization/{organization}', [App\Http\Livewire\Organizations::class, 'show']);
Route::patch('/organizations/{organization}', [App\Http\Livewire\Organizations::class, 'update']);
Route::get('/organizations/{organization}/delete', [App\Http\Livewire\Organizations::class, 'delete']);
Route::delete('/organizations/{organization}/delete', [App\Http\Livewire\Organizations::class, 'destroy']);

Route::post('/employees', [App\Http\Livewire\Employees::class, 'store']);
Route::get('employee/{employee}', [App\Http\Livewire\Employees::class, 'show']);
Route::patch('/employees/{employee}', [App\Http\Livewire\Employees::class, 'update']);
Route::get('/employees/{employee}/delete', [App\Http\Livewire\Employees::class, 'delete']);
Route::delete('/employees/{employee}/delete', [App\Http\Livewire\Employees::class, 'destroy']);
