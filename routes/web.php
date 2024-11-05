<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\AdminController;

Route::get('/', [HomeController::class, 'home']);

Route::get('/contact_us', [HomeController::class, 'contact_us']);

Route::get('/product', [HomeController::class, 'product']);

Route::get('/why', [HomeController::class, 'why']);

Route::get('/about_us', [HomeController::class, 'about_us']);

Route::get('/privacy', [HomeController::class, 'privacy']);

Route::get('/profile_app', [HomeController::class, 'profile_app']);

Route::get('/edit_profile', [HomeController::class, 'edit_profile']);

Route::get('/dashboard', [HomeController::class, 'login_home'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/myorders', [HomeController::class, 'myorders'])->middleware(['auth', 'verified']);

Route::get('/staffs', [HomeController::class, 'staffs']);

Route::get('/vehicle', [HomeController::class, 'vehicle']);

Route::get('/vehicles', [HomeController::class, 'vehicles']);



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('admin/dashboard', [HomeController::class, 'index'])->middleware(['auth','admin']);


Route::get('view_category', [AdminController::class, 'view_category'])->middleware(['auth','admin']);


Route::post('add_category', [AdminController::class, 'add_category'])->middleware(['auth', 'admin'])->name('add_category');


Route::delete('delete_category/{id}', [AdminController::class, 'delete_category'])->middleware(['auth','admin'])->name('delete_category');


Route::get('edit_category/{id}', [AdminController::class, 'edit_category'])->middleware(['auth','admin']);

Route::post('update_category/{id}', [AdminController::class, 'update_category'])->middleware(['auth', 'admin'])->name('update_category');



Route::get('add_vehicle', [AdminController::class, 'add_vehicle'])->middleware(['auth', 'admin']);

// Route to handle the form submission for adding staff (POST request)
Route::post('add_vehicle', [AdminController::class, 'upload_vehicle'])->middleware(['auth', 'admin']);

// Route to view staff
Route::get('view_vehicle', [AdminController::class, 'view_vehicle'])->middleware(['auth', 'admin']);

// Route to delete staff
Route::get('delete_vehicle/{id}', [AdminController::class, 'delete_vehicle'])->middleware(['auth', 'admin']);

// Route to show the form to update staff (GET request)
Route::get('update_vehicle/{id}', [AdminController::class, 'update_vehicle'])->middleware(['auth', 'admin']);

// Route to handle the form submission for updating staff (POST request)
Route::post('edit_vehicle/{id}', [AdminController::class, 'edit_vehicle'])->middleware(['auth', 'admin']);




// Route to show the form to add staff (GET request)
Route::get('add_staff', [AdminController::class, 'add_staff'])->middleware(['auth', 'admin']);

// Route to handle the form submission for adding staff (POST request)
Route::post('add_staff', [AdminController::class, 'upload_staff'])->middleware(['auth', 'admin']);

// Route to view staff
Route::get('view_staff', [AdminController::class, 'view_staff'])->middleware(['auth', 'admin']);

// Route to delete staff
Route::get('delete_staff/{id}', [AdminController::class, 'delete_staff'])->middleware(['auth', 'admin']);

// Route to show the form to update staff (GET request)
Route::get('update_staff/{id}', [AdminController::class, 'update_staff'])->middleware(['auth', 'admin']);

// Route to handle the form submission for updating staff (POST request)
Route::post('edit_staff/{id}', [AdminController::class, 'edit_staff'])->middleware(['auth', 'admin']);


Route::get('add_product', [AdminController::class, 'add_product'])->middleware(['auth','admin']);

Route::post('upload_product', [AdminController::class, 'upload_product'])->middleware(['auth','admin']);

Route::get('view_product', [AdminController::class, 'view_product'])->middleware(['auth','admin']);

Route::get('delete_product/{id}', [AdminController::class, 'delete_product'])->middleware(['auth','admin']);

Route::get('/checkProductUsage/{id}', [AdminController::class, 'checkProductUsage']);

// Route to check if the staff is in use
Route::get('/checkStaffUsage/{id}', [AdminController::class, 'checkStaffUsage']);



Route::get('/checkVehicleUsage/{id}', [AdminController::class, 'checkVehicleUsage']);

Route::get('update_product/{id}', [AdminController::class, 'update_product'])->middleware(['auth','admin']);

Route::post('edit_product/{id}', [AdminController::class, 'edit_product'])->middleware(['auth','admin']);

Route::get('search_staff', [AdminController::class, 'search_staff'])->middleware(['auth','admin']);

Route::get('search_vehicles', [AdminController::class, 'search_vehicles'])->middleware(['auth','admin']);

Route::get('product_search', [AdminController::class, 'product_search'])->middleware(['auth','admin']);

Route::get('product_details/{id}', [HomeController::class, 'product_details']);

Route::get('add_cart/{id}', [HomeController::class, 'add_cart'])->middleware(['auth', 'verified']);

Route::get('mycart', [HomeController::class, 'mycart'])->middleware(['auth', 'verified']);

Route::get('delete_cart/{id}', [HomeController::class, 'delete_cart'])->middleware(['auth', 'verified']);

Route::post('confirm_order', [HomeController::class, 'confirm_order'])->middleware(['auth', 'verified']);

Route::post('/orders/{order}/rate', [HomeController::class, 'rate'])->name('orders.rate');



Route::get('/fetch-service-datetimes', [HomeController::class, 'fetchServiceDatetimes'])->name('fetchServiceDatetimes');

// In web.php
Route::get('/fetch-unavailable-datetimes', [HomeController::class, 'fetchUnavailableDatetimes']);


// In your web.php file
Route::get('view_orders', [AdminController::class, 'view_orders'])
    ->middleware(['auth', 'admin'])
    ->name('view_orders'); // This should match the name used in the form action


Route::get('ongoing_service/{id}', [AdminController::class, 'ongoing_service'])->middleware(['auth','admin']);

Route::get('finished/{id}', [AdminController::class, 'finished'])->middleware(['auth','admin']);

Route::get('print_pdf/{id}', [AdminController::class, 'print_pdf'])->middleware(['auth','admin']);

Route::get('search_product', [HomeController::class, 'search_product'])->middleware(['auth', 'verified']);


