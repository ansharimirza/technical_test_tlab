<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResepController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/resep', [ResepController::class, 'Show']);
Route::post('/resep', [ResepController::class, 'Store']);
Route::put('/resep/{id}', [ResepController::class, 'Update']);
Route::delete('/resep/{id}', [ResepController::class, 'Delete']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
