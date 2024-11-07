<?php

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatronController;

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

Route::get('/', function() {
    return response()->json("Library API v1.0", Response::HTTP_OK);
});
Route::get('patrons', [PatronController::class, 'index']);
Route::post('patrons', [PatronController::class, 'store']);
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::fallback(function(){
    return response()->json([
        'message' => 'Endpoint not exists.'], Response::HTTP_NOT_FOUND);
});