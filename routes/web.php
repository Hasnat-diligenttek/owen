<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Virtual_funding;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebsiteController;

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

Route::get('/index', function () {
    return view('index');
});
Route::get('/thank_you', function () {
    return view('thankyou');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/shop', [App\Http\Controllers\WebsiteController::class, 'shop'])->name('shop');

Route::get('/popup', [App\Http\Controllers\WebsiteController::class, 'popup'])->name('popup');
Route::get('/popupstore/{storecode}', [App\Http\Controllers\WebsiteController::class, 'popupstore'])->name('popupstore');


Route::get('/product', [App\Http\Controllers\WebsiteController::class, 'product'])->name('product');
Route::get('/product-detail/{id}', [App\Http\Controllers\WebsiteController::class, 'product_detail'])->name('product_detail');

Route::resource('/add_to_cart',App\Http\Controllers\AddtocartController::class);

Route::get('/pagination/fetch_data', [App\Http\Controllers\WebsiteController::class, 'fetch_data']);
Route::get('/fetch_cart', [App\Http\Controllers\AddtocartController::class, 'fetch_cart']);

Route::post('/checkout', [App\Http\Controllers\AddtocartController::class, 'checkout']);

Route::post('/process-page', [WebsiteController::class, 'processPayment']);

Route::get('/process-page', function () {
    return view('payment-page');
});
Route::get('/event-payment-successful', function () {
    return view('event_thank_you');
});
Route::post('/process-payment', [WebsiteController::class, 'processPayment']);

Route::post('/event-payment', [WebsiteController::class, 'eventPayment']);


Route::post('/save_order', [WebsiteController::class, 'save_order']);

Route::get('/virtual_fundraising/payment/{event_code}', [WebsiteController::class, 'virtual_fundraising_payment']);



Route::post('/remove_cart', [App\Http\Controllers\AddtocartController::class, 'remove_cart']);


Route::get('/login/v', [App\Http\Controllers\WebsiteController::class, 'v_login']);

Route::post('/send_code', [App\Http\Controllers\WebsiteController::class, 'send_code']);

Route::post('/virtual_login', [Virtual_funding::class, 'virtual_login']);
Route::post('/virtual_login_detail', [Virtual_funding::class, 'virtual_login_detail']);

Route::get('/my-account', [ProfileController::class, 'ecom_dashboard']);
Route::get('/login/b', [ProfileController::class, 'b_login']);
Route::get('/signup/b', [ProfileController::class, 'b_signup']);
Route::post('/create_account', [ProfileController::class, 'create_account']);

Route::post('/profile_login', [ProfileController::class, 'profile_login']);

Route::post('/update_address', [ProfileController::class, 'update_address']);
Route::get('/b_logout', [ProfileController::class, 'logout']);


// Route::controller(Virtual_funding::class)->middleware('virtual_login')->group(function(){

Route::controller(Virtual_funding::class)->group(function(){
    Route::get('/create_event', 'create_event');
    Route::get('/dashboard', 'dashboard');


    Route::get('/dashboard/{code}', 'event_detail');

    Route::post('/get_org_type', 'get_org_type');

    Route::post('/edit_get_org_type', 'edit_get_org_type');

    Route::post('/save_event', 'save_event');

    Route::post('/update_event', 'update_event');


    Route::get('/delete_event/{id}', 'delete_event');

    Route::get('/edit_event/{id}', 'edit_event');

    Route::post('/update_profile', 'update_profile');

    Route::post('/join_event_code', 'join_event_code');

    Route::get('/event_detail/{id}', 'event_join_detail');

    Route::get('/create_store/{id}', 'create_store');

    Route::post('/save_event_store', 'save_event_store');




Route::get('/user_logout', 'user_logout');

});

Route::get('/admin_login', [App\Http\Controllers\AdminController::class, 'login']);
Route::post('/admin/login_check',[App\Http\Controllers\AdminController::class,'login_check']);

Route::prefix('admin')->controller(AdminController::class)->middleware('checkType')->group(function(){
    Route::get('/logout','logout');
    Route::get('/all_product','all_product');
    Route::get('/add_product','add_product');
    Route::post('/save_product','save_product');
});

