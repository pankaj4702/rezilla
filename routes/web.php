<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PaymentController;


// Admin
Route::prefix('/admin')->group(function () {
    Route::get('/',[AdminController::class,'index'])->name('admin');
    Route::post('/login',[AdminController::class,'login'])->name('loginAdmin');
    Route::get('/dashboard',[AdminController::class,'dashboard'])->name('dashboard')->middleware('checkAdminAuth');
    Route::get('/logout',[AdminController::class,'logout'])->name('logoutAdmin');
    Route::get('/add-project',[AdminController::class,'add_project'])->name('addProject')->middleware('checkAdminAuth');
    Route::post('/save-project',[AdminController::class,'save_project'])->name('saveProject');
    Route::get('/properties',[AdminController::class,'all_property'])->name('property');
    Route::get('/add-property-attributes',[AdminController::class,'property_attribute'])->name('property_attribute');
    Route::post('/store-attributes',[AdminController::class,'store_attributes'])->name('store_attribute');
    Route::get('/add-configuration',[AdminController::class,'configuration'])->name('addconfiguration');
    Route::post('/store-configuration',[AdminController::class,'store_configuration'])->name('store_configuration');
    Route::get('/add-city',[AdminController::class,'addCity'])->name('addCity');
    Route::post('/store-city',[AdminController::class,'store_city'])->name('storeCity');
    Route::get('/add-post-user',[AdminController::class,'addPostUser'])->name('addPostUser');
    Route::post('/store-post-user',[AdminController::class,'storePostUser'])->name('storePostUser');
    Route::get('/project-detail/{id}',[AdminController::class,'project_detail'])->name('project_detail');
    Route::get('/add-asset-management',[AdminController::class,'getAssetManagement'])->name('getAssetManagement');
    Route::post('/store-asset-management',[AdminController::class,'storeAsset'])->name('storeAsset');
    Route::get('/asset-delete/{id}',[AdminController::class,'removeAsset'])->name('removeAsset');
});

Route::prefix('/admin/service')->group(function () {
    Route::get('/asset-management',[AdminController::class,'getAssetManagement'])->name('getAssetManagement');
    Route::post('/store-asset-management',[AdminController::class,'storeAsset'])->name('storeAsset');
    Route::get('/asset-delete/{id}',[AdminController::class,'removeAsset'])->name('removeAsset');

    Route::get('/commercial',[AdminController::class,'getAssetCommercial'])->name('getAssetCommercial');
    Route::post('/store-commercial',[AdminController::class,'storeCommercial'])->name('storeCommercial');
    Route::get('/comm-delete/{id}',[AdminController::class,'removeCommercial'])->name('removeCommercial');

    Route::get('/holiday-homes',[AdminController::class,'getHolidayHomes'])->name('getHolidayHomesService');
    Route::post('/store-holidayhome',[AdminController::class,'storeHolidayHomesService'])->name('storeHolidayHomesService');
    Route::get('/holi-homes-delete/{id}',[AdminController::class,'removeHolidayHomesService'])->name('removeHolidayHomesService');

    Route::get('/comprehensive-service',[AdminController::class,'getService'])->name('getService');
    Route::post('/store-comprehensive-service',[AdminController::class,'storeService'])->name('storeService');
    Route::get('/service-delete/{id}',[AdminController::class,'removeService'])->name('removeService');
});



// front-end user
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/login-user',[LoginController::class,'index'])->name('loginpage')->middleware('checkUserAuth');
Route::post('/login',[LoginController::class,'login'])->name('login');

Route::get('/signup',[RegisterController::class,'index'])->name('signup')->middleware('checkUserAuth');
Route::post('/register',[RegisterController::class,'register'])->name('register');

Route::get('/logout',[LoginController::class,'logout'])->name('logout');

// profile
Route::get('/user-profile',[ProfileController::class,'index'])->name('user_profile');
Route::post('/edit-profile',[ProfileController::class,'update_profile'])->name('update_profile');

// sell
Route::get('/sell',[HomeController::class,'sell_property'])->name('sell_property');
Route::post('/sell-property',[HomeController::class,'sell_property_store'])->name('sell_property_store');

Route::get('/properties/{id}',[HomeController::class,'listProperty'])->name('listProperty');

Route::get('/property-detail/{id}',[HomeController::class,'propertyDetail'])->name('propertyDetail');

Route::get('/get-bedroom',[HomeController::class,'getbedroom'])->name('getbedroom');

Route::get('/get-location',[LocationController::class,'getLocation']);

Route::get('/get-configuration',[HomeController::class,'getconfiguration'])->name('configuration');

Route::get('/send-mail',[MailController::class,'index'])->name('subscribe');


// services
Route::prefix('/services')->group(function () {
Route::get('/asset-management',[ServiceController::class,'getAsset'])->name('getAsset');
Route::get('/holiday-homes',[ServiceController::class,'getHolidayHomes'])->name('getHolidayHomes');
Route::get('/commercial',[ServiceController::class,'getCommercial'])->name('getCommercial');
});

Route::get('/monthlyPlan',[PaymentController::class,'createPlan'])->name('montlyPlan');
