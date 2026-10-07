<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LaporanKeuanganController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\BookingController;

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

// PAGE ADMIN
// Data Pengguna
Route::resource('user', UserController::class);
Route::resource('kategori', KategoriController::class);
Route::resource('pengeluaran', PengeluaranController::class);
Route::resource('katalog', KatalogController::class);
Route::resource('pesanan1', PesananController::class);



// Tambahan fungsi khusus
Route::get('/pengeluaran/cetak', [PengeluaranController::class, 'cetak'])->name('pengeluaran.cetak');
Route::post('/pesanan/{id}/update-status', [PesananController::class, 'updateStatus'])->name('pesanan.updateStatus');
Route::get('/pengguna', [UserController::class, 'index'])->name('user.index');
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/pengeluaran', [PengeluaranController::class, 'index'])->name('pengeluaran.index');
Route::get('/pesanan', [PesananController::class, 'index'])->name('pesanan.index');
Route::delete('/pesanan/destroy/{id}', [PesananController::class, 'destroy'])->name('pesanan.destroy');
Route::post('/pesanan/{id_pesanan}/cancel', [CustomerController::class, 'cancel'])->name('customer.cancel');
Route::get('/pesanan/{id}', [CustomerController::class, 'detailPesanan'])->name('customer.detail');
Route::get('/jadwal', [PesananController::class, 'index3'])->name('pesanan.index3');
Route::get('/laporan-keuangan', [LaporanKeuanganController::class, 'index'])->name('laporan.keuangan');
Route::get('/laporan-keuangan/cetak', [LaporanKeuanganController::class, 'cetak'])->name('laporan.keuangan.cetak');
Route::get('/laporan-keuangan/filter', [LaporanKeuanganController::class, 'filter'])->name('laporankeuangan.filter');

// Halaman Admin
Route::get('/home', function () {
    $user = Auth::user();
    return view('page-admin.v_home-admin', compact('user'));
})->name('home');

Route::get('/pembayaran/dp', [PesananController::class, 'index6'])->name('pesanan.index6');
Route::get('/pembayaran/pelunasan', [PembayaranController::class, 'index2'])->name('pembayaran.index2');







// PAGE CUSTOMER
Route::get('/home2', function () {
    $user = Auth::user();
    return view('page-customer.v_home-customer',compact('user'));
})->name('home2');

Route::get('/katalog', [KatalogController::class, 'index'])->name('katalog.index');
Route::get('/katalog/pesan/{id}', [KatalogController::class, 'pesan'])->name('katalog.pesan');
Route::get('/pesan/{id}', [PesananController::class, 'create'])->name('pesanan.create');
Route::post('/pesan', [PesananController::class, 'store'])->name('pesanan.store');
Route::get('/history', [PesananController::class, 'index2'])->name('history.index2');
Route::get('/jadwal', [PesananController::class, 'index3'])->name('jadwal.index3');
Route::post('/pesanan/bayar', [PesananController::class, 'bayar'])->name('pesanan.bayar');
Route::get('/uangmuka', [PesananController::class, 'index5'])->name('pesanan.index5');
Route::get('/pelunasan', [PembayaranController::class, 'index'])->name('pelunasan.index');
Route::post('/pelunasan/bayar', [PembayaranController::class, 'bayar'])->name('pelunasan.bayar');
Route::post('/dp/bayar', [PembayaranController::class, 'bayar2'])->name('dp.bayar2');




// PAGE PUBLIC
Route::get('/', function () {
    return view('v_index', ['title' => 'landingpage']);
})->name('landingpage');
Route::get('/register', function () {
    return view('v_register');
});

// AUTHENTICATION ROUTES
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.action');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.action');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/payment/sukses', [PesananController::class, 'paymentSukses']);
Route::get('/pelunasan/sukses', [PembayaranController::class, 'pelunasanSukses']);


use App\Http\Controllers\KalenderController;

Route::get('/layanan/{id}', [KalenderController::class, 'showKalender']);

