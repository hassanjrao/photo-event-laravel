<?php

use App\Http\Controllers\AdminBookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminEventController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HostEventController;
use App\Http\Controllers\HostImagesController;
use App\Http\Controllers\UserBookingController;
use App\Http\Controllers\UserEventController;
use App\Http\Controllers\UserImagesController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes(['verify' => true]);


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get("events/{event_id}", [UserEventController::class, "show"])->name("events.show");

Route::get("events", [UserEventController::class, "index"])->name("events.index");

Route::middleware(["auth","verified"])->group(function () {

    Route::get("bookings/{event_id}/event", [UserBookingController::class, "index"])->name("bookings.index");

    Route::post("store", [UserBookingController::class, "store"])->name("bookings.store");

    Route::get("bookings/{event_id}/event", [UserBookingController::class, "index"])->name("bookings.index");

    Route::get("event-images",[UserImagesController::class,"eventImages"])->name("images.event-images");

    Route::get("images",[UserImagesController::class,"index"])->name("images.index");

    Route::resource("profile",UserProfileController::class);
});

Route::middleware(["role:admin", "auth"])->prefix("admin")->name("admin.")->group(function () {

    Route::get("/", [DashboardController::class, "admin"])->name("dashboard.admin");
    Route::resource("users", AdminUserController::class);
    Route::resource("events", AdminEventController::class);
    Route::resource("bookings",AdminBookingController::class)->except("create","store","edit","update");
});


Route::middleware(["role:host", "auth"])->prefix("host")->name("host.")->group(function () {


    Route::get("/", [DashboardController::class, "host"])->name("dashboard.host");

    Route::resource("events", HostEventController::class);

    Route::resource("images", HostImagesController::class);
});
