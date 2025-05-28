<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthAdminController;   
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/login', [LoginController::class, 'showLogin'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');


Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);                             

Route::get('/produk', [ProdukController::class, 'index']);
Route::get('/produk/{id}', [ProdukController::class, 'show'])->name('produk.show');
Route::post('/produk/{id}/add-to-cart', [CartController::class, 'store'])->name('produk.addToCart');

Route::get('/tentang', function () {
    return view('tentang');
});
Route::get('/kontak', function () {
    return view('kontak');
});


Route::get('/admin/AddProduk', function(){
    return view('admin.AddProduk');
});


Route::get('/admin/login', [AuthAdminController::class, 'showLoginAdmin'])->name('admin.login');
Route::post('/admin/login', [AuthAdminController::class, 'login'])->name('admin.login.submit');
Route::get('/admin/dashboard', [DashboardAdminController::class, 'showDashboard'])->name('admin.dashboard');

Route::get('/transaksi', [TransaksiController::class, 'index']);
Route::post('/transaksi', [TransaksiController::class, 'store']);
Route::post('/transaksi/{id}/status', [TransaksiController::class, 'updateStatus']);

Route::get('/obat', [ObatController::class, 'index'])->name('obat.index');
Route::get('/obat/create', [ObatController::class, 'create'])->name('obat.create');
Route::post('/obat', [ObatController::class, 'store'])->name('obat.store');
Route::get('/obat/{id}', [ObatController::class, 'show'])->name('obat.show');
Route::get('/obat/{id}/edit', [ObatController::class, 'edit'])->name('obat.edit');
Route::put('/obat/{id}', [ObatController::class, 'update'])->name('obat.update');
Route::delete('/obat/{id}', [ObatController::class, 'destroy'])->name('obat.destroy');



Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
    Route::patch('/cart/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');

    // ✅ Route checkout
    Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
});



Route::middleware('auth')->group(function () {
    Route::get('/profil', [UserController::class, 'profile'])->name('profile');
    Route::get('/profil/edit', [UserController::class, 'edit'])->name('profile.edit');
    Route::put('/profil/update', [UserController::class, 'update'])->name('profile.update');
});

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');




