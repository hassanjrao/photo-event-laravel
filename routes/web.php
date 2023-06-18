<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AdminBookingController;
use App\Http\Controllers\AdminContactUsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminEventController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\HeroSectionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HostEventController;
use App\Http\Controllers\HostImagesController;
use App\Http\Controllers\OurWorkController;
use App\Http\Controllers\UserBookingController;
use App\Http\Controllers\UserEventController;
use App\Http\Controllers\UserImagesController;
use App\Http\Controllers\UserProfileController;
use App\Models\HeroSection;
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

Route::get("test",function (){
    return symlink("/home/ly2decayltxx/laravel/storage/app/public","/home/ly2decayltxx/public_html/storage");
});

Auth::routes(['verify' => true]);


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get("events/{event_id}", [UserEventController::class, "show"])->name("events.show");

Route::get("events", [UserEventController::class, "index"])->name("events.index");

Route::resource("contact-us", ContactUsController::class)->only("index", "store");

Route::middleware(["auth", "verified"])->group(function () {

    Route::get("bookings/{event_id}/event", [UserBookingController::class, "index"])->name("bookings.index");

    Route::post("store", [UserBookingController::class, "store"])->name("bookings.store");

    Route::get("bookings/{event_id}/event", [UserBookingController::class, "index"])->name("bookings.index");

    Route::get("event-images", [UserImagesController::class, "eventImages"])->name("images.event-images");

    Route::get("images/{id?}", [UserImagesController::class, "index"])->name("images.index");


    Route::resource("profile", UserProfileController::class);
});

Route::middleware(["role:admin", "auth"])->prefix("admin")->name("admin.")->group(function () {

    Route::get("/", [DashboardController::class, "admin"])->name("dashboard.admin");
    Route::resource("users", AdminUserController::class);
    Route::resource("events", AdminEventController::class);
    Route::resource("bookings", AdminBookingController::class)->except("create", "store", "edit", "update");

    Route::put('hero-section-images/{id}', [HeroSectionController::class, "updateImages"])->name("hero-section-images.update");
    Route::resource("hero-section", HeroSectionController::class)->except("show", "edit", "destroy", "create");

    Route::resource("about-us", AboutUsController::class)->except("show", "edit", "destroy", "create");

    Route::resource("our-work", OurWorkController::class);

    Route::resource("contact-us", AdminContactUsController::class)->only("index");
});


Route::middleware(["role:host", "auth"])->prefix("host")->name("host.")->group(function () {


    Route::get("/", [DashboardController::class, "host"])->name("dashboard.host");

    Route::resource("events", HostEventController::class);

    Route::resource("images", HostImagesController::class);
});


Route::controller(FacebookController::class)->group(function () {
    Route::get('auth/facebook', 'redirectToFacebook')->name('auth.facebook');
    Route::get('auth/facebook/callback', 'handleFacebookCallback');
});


Route::get('auth/google', [GoogleController::class, 'signInwithGoogle']);
Route::get('callback/google', [GoogleController::class, 'callbackToGoogle']);
