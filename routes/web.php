<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AdminCartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Models\User;

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

// client

//home
Route::get('/',[ ProductController::class, 'index'])->name('home');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product-details');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');



//quản trị review
Route::prefix('admin')->name('admin.')->group(function () {
     // Hiển thị danh sách review
    Route::get('reviews', [ReviewController::class, 'index'])->name('reviews.index');
    
    // Tạo review
    Route::get('reviews/create', [ReviewController::class, 'create'])->name('reviews.create');
    Route::post('reviews', [ReviewController::class, 'store'])->name('reviews.store');
    
    // Sửa review
    Route::get('reviews/{id}/edit', [ReviewController::class, 'edit'])->name('reviews.edit');
    Route::put('reviews/{id}', [ReviewController::class, 'update'])->name('reviews.update');
    
    // Xóa review
    Route::delete('reviews/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
});


//cart
Route::delete('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');

Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
Route::post('/cart/update/{productId}', [CartController::class, 'updateItem'])->name('cart.update.post');
Route::delete('/cart/remove/{productId}', [CartController::class, 'removeItem'])->name('cart.remove');
Route::put('/cart/update/{productId}', [CartController::class, 'updateItem'])->name('cart.update.put');

Route::get('/hihi', [CartController::class, 'index'])->name('hihi');

//checkout
Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout.index');
Route::post('/checkout/process', [CheckoutController::class, 'processCheckout'])->name('checkout.process');

Route::get('/order/success', function () {
    return view('checkout.success');
})->name('order.success');


//mini cart


// admin cart
Route::get('/carts', [AdminCartController::class, 'index'])->name('admin.carts.index');
Route::get('/cart/{id}', [AdminCartController::class, 'show'])->name('admin.cart.show');
Route::delete('/cart/{id}', [AdminCartController::class, 'destroy'])->name('admin.cart.destroy');

// login-logout-register
Route::get('/login',[UserController::class,'login'])->name('login');
Route::post('/login',[UserController::class,'postlogin']);

Route::get('/register',[UserController::class,'register'])->name('register');
Route::post('/register',[UserController::class,'postRegister']);

Route::post('/logout',[UserController::class, 'logout'])->name('logout');
//dashboard 
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// admin
Route::group(['prefix' => 'admin'], function () {
Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');


//category
Route::resource('categories', CategoryController::class);
});