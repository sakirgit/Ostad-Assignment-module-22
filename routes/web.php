<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmailCampaignController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::post('/register',[UserController::class,'UserRegistration']);
Route::post('/login',[UserController::class,'UserLogin']);
Route::post('/send-otp',[UserController::class,'SendOTPCode']);
Route::post('/verify-otp',[UserController::class,'VerifyOTP']);
Route::post('/reset-password',[UserController::class,'ResetPassword'])->middleware([TokenVerificationMiddleware::class]);


// Page Routes
Route::get('/login',[UserController::class,'LoginPage']);
Route::get('/register',[UserController::class,'RegistrationPage']);
Route::get('/send-otp',[UserController::class,'SendOtpPage']);
Route::get('/verify-otp',[UserController::class,'VerifyOTPPage']);
Route::get('/reset-password',[UserController::class,'ResetPasswordPage']);
Route::get('/dashboard',[DashboardController::class,'DashboardPage']);



// Customer 
Route::post("/create-customer",[CustomerController::class,'CustomerCreate'])->middleware([TokenVerificationMiddleware::class]);
Route::get("/list-customer",[CustomerController::class,'CustomerList'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/delete-customer",[CustomerController::class,'CustomerDelete'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/update-customer",[CustomerController::class,'CustomerUpdate'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/customer-by-id",[CustomerController::class,'CustomerByID'])->middleware([TokenVerificationMiddleware::class]);




//  email campaign
Route::get('/email-campaigns/create', [EmailCampaignController::class, 'create'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/email-campaigns', [EmailCampaignController::class, 'store'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/email-campaigns/{email_campaign}/edit', [EmailCampaignController::class, 'edit'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/email-campaigns/{email_campaign}', [EmailCampaignController::class, 'update'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/email-campaigns/{email_campaign}', [EmailCampaignController::class, 'update'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/email-campaigns', [EmailCampaignController::class, 'index'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/email-campaigns/{email_campaign}', [EmailCampaignController::class, 'show'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/email-campaigns/{email_campaign}', [EmailCampaignController::class, 'destroy'])->middleware([TokenVerificationMiddleware::class]);


