<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware(['authApi'])->group(function(){

Route::post("/all", [CourController::class, 'get_all']);
Route::post("/cours/{id}", [CourController::class, 'get']);
Route::post("/delete_cours", [CourController::class, 'delete_cours']);
Route::post("/add_categorie", [CategorieController::class, "create"]);
Route::post("/get_categorie", [CategorieController::class, "all"]);
Route::post("/post_cour", [CourController::class, 'create']);

});
Route::get("/all", [CourController::class, 'get_all']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/me', [AuthController::class, 'me']);
