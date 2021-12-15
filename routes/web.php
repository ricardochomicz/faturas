<?php

use App\Http\Controllers\InvoiceController;
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

Route::get('/', [InvoiceController::class, 'index']);
Route::get('/upload', [InvoiceController::class, 'create']);
Route::post('/upload-file', [InvoiceController::class, 'store']);
Route::get('/invoices/export', [InvoiceController::class, 'export'])->name('invoice.export');