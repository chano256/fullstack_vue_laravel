<?php

use App\Http\Controllers\AuthorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('authors')->group(function () {
    Route::get('/', [AuthorController::class, 'index'])->name('authors.index');
    Route::get('/{author_id}', [AuthorController::class, 'show'])->name('authors.show');
    Route::post('/', [AuthorController::class, 'store'])->name('authors.store');
    Route::patch('/{author_id}', [AuthorController::class, 'update'])->name('authors.update');
    Route::delete('/{author_id}', [AuthorController::class, 'destroy'])->name('authors.destroy');
});
