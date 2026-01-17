<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])->name('login.show');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register.show');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| KELOLA ANGGOTA (HANYA ADMIN YANG BISA AKSES)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // user management (admin only, dicek di controller)
    Route::get('/users', [UserController::class, 'index']);        // list anggota
    Route::get('/users/create', [UserController::class, 'create']); // form create
    Route::post('/users', [UserController::class, 'store']);       // simpan anggota

    Route::get('/users/{user}/edit', [UserController::class, 'edit']); // form edit
    Route::put('/users/{user}', [UserController::class, 'update']);  // update anggota
    Route::delete('/users/{user}', [UserController::class, 'destroy']); // hapus anggota
});

/*
|--------------------------------------------------------------------------
| Protected Routes (Login Required)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | BOOKS (ANGGOTA HANYA READ, ADMIN BISA CRUD)
    |--------------------------------------------------------------------------
    */
     // Menampilkan semua buku (admin & anggota)
    Route::get('/books', [BookController::class, 'index'])
        ->name('books.index');

    // Form tambah buku (admin)
    Route::get('/books/create', [BookController::class, 'create'])
        ->name('books.create');

    // Simpan buku baru (admin)
    Route::post('/books', [BookController::class, 'store'])
        ->name('books.store');

    // Form edit buku (admin)
    Route::get('/books/{book}/edit', [BookController::class, 'edit'])
        ->name('books.edit');

    // Update buku (admin)
    Route::put('/books/{book}', [BookController::class, 'update'])
        ->name('books.update');

    // Hapus buku (admin)
    Route::delete('/books/{book}', [BookController::class, 'destroy'])
        ->name('books.destroy');

    /*
    |--------------------------------------------------------------------------
    | TRANSACTIONS (ANGGOTA BISA PINJAM & KEMBALIKAN, ADMIN BISA CRUD)
    |--------------------------------------------------------------------------
    */

    // List transaksi
    Route::get('/transactions', [TransactionController::class, 'index'])
        ->name('transactions.index');

    // Form peminjaman (ambil buku tersedia)
    Route::get('/transactions/create', [TransactionController::class, 'create'])
        ->name('transactions.create');

    // Simpan peminjaman
    Route::post('/transactions', [TransactionController::class, 'store'])
        ->name('transactions.store');

    // Detail transaksi
    Route::get('/transactions/{transaction}', [TransactionController::class, 'show'])
        ->name('transactions.show');

    // Pengembalian buku
    Route::put('/transactions/{transaction}/return', [TransactionController::class, 'returnBook'])
        ->name('transactions.return');

    // Hapus transaksi (admin)
    Route::delete('/transactions/{transaction}', [TransactionController::class, 'destroy'])
        ->name('transactions.destroy');

});