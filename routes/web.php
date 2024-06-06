<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ChartsController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\MechanicController;
use App\Http\Controllers\RepairController;
use App\Http\Controllers\SparePartController;
use App\Http\Controllers\VehicleController;
use App\Models\Vehicle;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

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


/**
 * Home Routes
 */




 Route::get('/', [HomeController::class, 'index'])->name('home.index'); 
    
 Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
 Route::post('/register', [RegisterController::class, 'register'])->name('register.perform');

 /**
  * Login Routes
  */
 Route::get('/login', [LoginController::class,'show'])->name('login.show');
 Route::post('/login', [LoginController::class, 'login'])->name('login.perform');


 /**
  * Logout Routes
  */
 Route::get('/logout', [LogoutController::class, 'perform'])->name('logout.perform');

// fallback
 Route::fallback(function () {
   return view('notFound');
});

//forget Password Rootes
 Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
 Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
 Route::get('reset-password', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
 Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

//admin routes
/* ADMINS */
 Route::resource('admins', AdminController::class);
/* 
Route::post('/Admins/search',[AdminController::class,'search'])->name('products.search');

Route::post('/Admins/showModal',[AdminController::class,'showModal'])->name('products.showModal');
 */



/* CLIENTS */
 Route::resource('clients', ClientController::class);

 
/*Route::post('/clients/search',[AdminController::class,'search'])->name('Clients.search');

Route::post('/clients/delete',[AdminController::class,'delete'])->name('Clients.delete');

Route::post('/clients/showModal',[AdminController::class,'showModal'])->name('Clients.showModal'); */
//Route::get('/changeLocale/{locale}',[ProductController::class,'changeLocale'])->name('products.changeLocale');



/* MECHANICS */
 Route::resource('mechanics', MechanicController::class);
 /*
Route::post('/Mechanics/search',[AdminController::class,'search'])->name('Mechanics.search');

Route::post('/Mechanics/delete',[AdminController::class,'delete'])->name('Mechanics.delete');

Route::post('/Mechanics/showModal',[AdminController::class,'showModal'])->name('Mechanics.showModal'); */

Route::resource('vehicles', VehicleController::class);
// Route::get('/vehicles/{vehicleId}/owner',[VehicleController::class,'vehicleOwner']);

Route::get('/vehicles/{vehicleId}/owner', function ($vehicleId) {
    // Find the vehicle by its ID
    
    $vehicle = Vehicle::with('user')->findOrFail($vehicleId);
  
    // Retrieve the owner (user) associated with the vehicle
    $owner = $vehicle->user;

    // Return the owner data as JSON response
    return response()->json($owner);
});

Route::resource('spareparts', SparePartController::class);
Route::resource('repairs', RepairController::class);
Route::get('/invoice/{repairId}', [InvoiceController::class,'printInvoice'])->name('invoices.print');
Route::get('/chart', [ChartsController::class,'chart'])->name('chart');

 /* LANGUE */

Route::get('/changeLocale/{locale}',function($locale){
    session()->put('locale',$locale);
    return redirect()->back();
})->name('products.changeLocale');






/////////////////////////////////
Route::middleware('guest')->group(function () {
   

});

Route::middleware('auth')->group(function () {
   
    Route::middleware('check_admin')->group(function () {
   

    });
    
    Route::middleware('check_client')->group(function () {
       
    
    });
    
    Route::middleware('check_mechanic')->group(function () {
       
    
    });

});








    /**
     * Register Routes
     */


