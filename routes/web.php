<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController; //user controller
use App\Http\Controllers\SalesController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController; // barang controller
use App\Http\Controllers\SupplierController; // supplier controller
use App\Http\Controllers\AuthController;

//P7
Route::pattern('id', '[0-9]+');

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'postlogin']);
Route::get('logout', [AuthController::class, 'logout'])->middleware('auth');

Route::middleware(['auth'])->group(function () {
    // Halaman User
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', [UserController::class, 'index']); // menampilkan halaman awal user
        Route::post('/list', [UserController::class, 'list']); // menampilkan data user dalam bentuk json untuk datatables
        Route::get('/create', [UserController::class, 'create']); // menampilkan halaman form tambah user
        Route::post('/', [UserController::class, 'store']); // menyimpan data user baru
        Route::get('/create_ajax', [UserController::class, 'create_ajax']); // menampilkan halaman form tambah user ajax
        Route::post('/ajax', [UserController::class, 'store_ajax']); // menyimpan data user baru ajax
        Route::get('/{id}', [UserController::class, 'show']); // menampilkan detail user
        Route::get('/{id}/edit', [UserController::class, 'edit']); // menampilkan halaman form edit user
        Route::put('/{id}', [UserController::class, 'update']); // menyimpan perubahan data user
        Route::get('/{id}/edit_ajax', [UserController::class, 'edit_ajax']); // menampilkan halaman form edit user ajax
        Route::put('/{id}/update_ajax', [UserController::class, 'update_ajax']); // menyimpan perubahan data user ajax
        Route::get('/{id}/delete_ajax', [UserController::class, 'confirm_ajax']); //Untuk tampilkan confirm delete ajax
        Route::delete('/{id}/delete_ajax', [UserController::class, 'delete_ajax']); //Untuk delete data user ajax
        Route::delete('/{id}', [UserController::class, 'destroy']); // menghapus data user
    });

    // Halaman Barang
    Route::prefix('barang')->group(function () {
        Route::get('/', [BarangController::class, 'index'])->name('barang.index');
        Route::get('/create', [BarangController::class, 'create'])->name('barang.create');
        Route::post('/', [BarangController::class, 'store'])->name('barang.store');
        Route::get('/create_ajax', [BarangController::class, 'create_ajax']);
        Route::post('/ajax', [BarangController::class, 'store_ajax']);
        Route::get('/{id}', [BarangController::class, 'show'])->name('barang.show');
        Route::get('/{id}/edit', [BarangController::class, 'edit'])->name('barang.edit');
        Route::put('/{id}', [BarangController::class, 'update'])->name('barang.update');
        Route::delete('/{id}', [BarangController::class, 'destroy'])->name('barang.destroy');
        Route::get('/{id}/edit_ajax', [BarangController::class, 'edit_ajax']);
        Route::put('/{id}/update_ajax', [BarangController::class, 'update_ajax']);
        Route::get('/{id}/delete_ajax', [BarangController::class, 'confirm_ajax']);
        Route::delete('/{id}/delete_ajax', [BarangController::class, 'delete_ajax']);
    });

    // Halaman Level
    Route::group(['prefix' => 'level'], function () {
        Route::get('/', [LevelController::class, 'index']);          // Menampilkan halaman awal level
        Route::post('/list', [LevelController::class, 'list']);      // Menampilkan data level dalam bentuk JSON untuk DataTables
        Route::get('/create', [LevelController::class, 'create']);   // Menampilkan halaman form tambah level
        Route::post('/', [LevelController::class, 'store']);         // Menyimpan data level baru
        Route::get('/create_ajax', [LevelController::class, 'create_ajax']); // Menampilkan halaman form tambah level Ajax
        Route::get('/{id}', [LevelController::class, 'show']);       // Menampilkan detail level
        Route::get('/{id}/edit', [LevelController::class, 'edit']);  // Menampilkan halaman form edit level
        Route::put('/{id}', [LevelController::class, 'update']);     // Menyimpan perubahan data level
        Route::delete('/{id}', [LevelController::class, 'destroy']); // Menghapus data level
        Route::post('/ajax', [LevelController::class, 'store_ajax']);        // Menyimpan data level baru Ajax
        Route::get('/{id}/edit_ajax', [LevelController::class, 'edit_ajax']); // Menampilkan halaman form edit level Ajax
        Route::put('/{id}/update_ajax', [LevelController::class, 'update_ajax']); // Menyimpan perubahan data level Ajax
        Route::get('/{id}/delete_ajax', [LevelController::class, 'confirm_ajax']); // Untuk tampilkan form confirm delete level Ajax
        Route::delete('/{id}/delete_ajax', [LevelController::class, 'delete_ajax']); // Untuk hapus data level Ajax
    });

    //Halaman Kategori
    Route::prefix('kategori')->group(function () {
        Route::get('/', [KategoriController::class, 'index'])->name('kategori.index'); // Halaman daftar kategori
        Route::get('/list', [KategoriController::class, 'list'])->name('kategori.list'); // DataTables JSON
        Route::get('/create', [KategoriController::class, 'create']); // Form tambah kategori
        Route::post('/', [KategoriController::class, 'store'])->name('kategori.store'); // Simpan kategori baru
        Route::get('/create_ajax', [KategoriController::class, 'create_ajax']);
        Route::get('/{id}', [KategoriController::class, 'show'])->name('kategori.show'); // Detail kategori
        Route::get('/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit'); // Form edit kategori
        Route::put('/{id}', [KategoriController::class, 'update'])->name('kategori.update'); // Simpan perubahan kategori
        Route::delete('/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy'); // Hapus kategori
        Route::post('/ajax', [KategoriController::class, 'store_ajax']);
        Route::get('/{id}/edit_ajax', [KategoriController::class, 'edit_ajax']);
        Route::put('/{id}/update_ajax', [KategoriController::class, 'update_ajax']);
        Route::get('/{id}/delete_ajax', [KategoriController::class, 'confirm_ajax']);
        Route::delete('/{id}/delete_ajax', [KategoriController::class, 'delete_ajax']);
    });

    //Halaman Supplier
    Route::prefix('supplier')->group(function () {
        Route::get('/', [SupplierController::class, 'index'])->name('supplier.index');
        Route::get('/create', [SupplierController::class, 'create']);
        Route::post('/', [SupplierController::class, 'store'])->name('supplier.store');
        Route::get('/create_ajax', [SupplierController::class, 'create_ajax']);
        Route::get('/{id}', [SupplierController::class, 'show'])->name('supplier.show'); // Perbaikan di sini
        Route::get('/{id}/edit', [SupplierController::class, 'edit'])->name('supplier.edit');
        Route::put('/{id}', [SupplierController::class, 'update'])->name('supplier.update');
        Route::delete('/{id}', [SupplierController::class, 'destroy'])->name('supplier.destroy');
        Route::post('/ajax', [SupplierController::class, 'store_ajax']);
        Route::get('/{id}/edit_ajax', [SupplierController::class, 'edit_ajax']);
        Route::put('/{id}/update_ajax', [SupplierController::class, 'update_ajax']);
        Route::get('/{id}/delete_ajax', [SupplierController::class, 'confirm_ajax']);
        Route::delete('/{id}/delete_ajax', [SupplierController::class, 'delete_ajax']);
    });

});

// Halaman Home
// Route::get('/', [HomeController::class, 'index']);
Route::get('/', [WelcomeController::class, 'index']);

// Halaman Products (Dengan Prefix)
Route::prefix('category')->group(function () {
    Route::get('/food-beverage', [ProductController::class, 'foodBeverage']);
    Route::get('/beauty-health', [ProductController::class, 'beautyHealth']);
    Route::get('/home-care', [ProductController::class, 'homeCare']);
    Route::get('/baby-kid', [ProductController::class, 'babyKid']);
});




// Halaman User dengan Parameter ID & Name
Route::get('/user/{id}/name/{name}', [UserController::class, 'profile']);

// Halaman Penjualan (POS)
Route::get('/sales', [SalesController::class, 'index']);

Route::get('/level', [LevelController::class, 'index']);
Route::get('/kategori', [KategoriController::class, 'index']);
Route::get('/user', [UserController::class, 'index']);
Route::get('/user/tambah', [UserController::class, 'tambah']);
Route::post('/user/tambah_simpan', [UserController::class, 'tambah_simpan']);
Route::get('/user/ubah/{id}', [UserController::class, 'ubah']);
Route::get('/user/hapus/{id}', [UserController::class, 'hapus']);


