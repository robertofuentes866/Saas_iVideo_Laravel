<?php

use App\Http\Controllers\Auth\ChangePasswordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\FileShareController;
use App\Http\Controllers\UserUsageController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\StripeIntentController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserPlanAvailableController;

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

Route::post('/changePassword',[ChangePasswordController::class,"cambiaPassword"]);

Route::post('/registrarUsuario',[RegisterController::class,'register']);
Route::post('/login',[LoginController::class,'login']);
Route::post('/logout',[LogoutController::class,'logout']);

Route::get('/user',[UserController::class,'getUser']);

Route::get('/user/usage',[UserUsageController::class,'getStorageUsage']);

Route::get('/getFilesUser',[FileController::class,'index']);
Route::post('/storeFilesUser',[FileController::class,'store']);
Route::delete('deleteFileUser/{file:uuid}',[FileController::class,'destroy']);
Route::post('/files/signed',[FileController::class,'signedURL']);
Route::post('/genToken',[LoginController::class,'genToken']);
Route::get('/plans',[PlanController::class,'getPlans']);
Route::get('/subscriptions/intent',[StripeIntentController::class,'getClientSecret']);
Route::post('/subscriptions',[SubscriptionController::class,'createSubscription']);
Route::get('subscriptions/getPlans',[UserPlanAvailableController::class,'getAvailablePlans']);
Route::post('/subscriptions/swap',[SubscriptionController::class,'swapSubscription']);
Route::post('/file/{file:uuid}/share',[FileShareController::class,'createShareURL']);
Route::get('/file/{file:uuid}/download',[FileShareController::class,'downloadVideo']);


