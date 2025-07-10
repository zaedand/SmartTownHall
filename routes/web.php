<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KritikController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\KTPController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\PajakController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DecisionController;

Route::get('/', function () {
    return view('Decision');
})->name('decision');



Route::get('/login-decision', [DecisionController::class, 'showDecisionForm'])->name('login-decision');
Route::post('/login-decision', [DecisionController::class, 'processDecision'])->name('process-decision');


Route::get('/login-user', function(){
    return view('login-user');
})->name('login-user');


Route::get('/register', function(){
    return view('register');
});

//login
Route::get('/login', [LoginController::class, 'halamanlogin'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');

//group middleware user

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home-admin', function() {
        return view('home-admin');
    })->name('home-admin');

    Route::post('/index', function(){
        return view('baru.index');
    })->name('home');
    Route::get('/ktp', function(){
        return view('ktp');
    })->name('ktp');
    Route::get('/pajak', function(){
        return view('pajak');
    })->name('pajak');
    Route::get('/pengaduan', function(){
        return view('pengaduan');
    })->name('pengaduan');
    Route::get('/kritik', function(){
        return view('kritik');
    })->name('kritik');
    Route::get('/pengajuan', function(){
        return view('pengajuan');
    })->name('pengajuan');
    Route::post('/download-tanah', [PengajuanController::class,'downloadTanah'])->name('download-tanah');
    Route::post('/download-domisili', [PengajuanController::class,'downloadDomisili'])->name('download-domisili');
    Route::post('/donwload-skck', [PengajuanController::class,'downloadSKCK'])->name('download-skck');
    Route::post('/surat1', function(){
        return view('surat1');
    })->name('submit-surat1');
    Route::post('/surat2', function(){
        return view('surat2');
    })->name('submit-surat2');
    Route::post('/surat3', function(){
        return view('surat3');
    })->name('submit-surat3');
    Route::post('/surat4', function(){
        return view('surat4');
    })->name('submit-surat4');
    Route::post('/surat5', function(){
        return view('surat5');
    })->name('submit-surat5');
    Route::post('/surat6', function(){
        return view('surat6');
    })->name('submit-surat6');
    Route::post('/ktp-submit', [KTPController::class, 'store'])->name('ktp-submit');
    Route::get('/tambah-kritik', [KritikController::class, 'create'])->name('tambah-kritik');
    Route::post('/tambahkan-kritik', [KritikController::class, 'store'])->name('tambahkan-kritik');
    Route::post('/tambah-pengajuan', [PengajuanController::class, 'store'])->name('tambah-pengajuan');
    Route::post('/tambah-pajak', [PajakController::class, 'store'])->name('pajak-store');
    Route::get('/index', [BeritaController::class, 'index'])->name('berita');
    Route::post('/pengaduan-kirim', [PengaduanController::class, 'store'])->name('pengaduan-store');
    Route::get('/notif-pengaduan', [PengaduanController::class, 'showNotif'])->name('notif-pengaduan');
});


// Routes accessible by specific level

Route::group(['middleware' => ['auth', 'checkLevel:admin,complaint']], function() {
    Route::get('/admin-pengaduan', [PengaduanController::class, 'index'])->name('admin-pengaduan');
    Route::get('/tambah-pengaduan', [PengaduanController::class, 'create'])->name('tambah-pengaduan');
    Route::post('/tambahkan-pengaduan', [PengaduanController::class, 'store'])->name('tambahkan-pengaduan');
    Route::get('/edit-pengaduan/{id}', [PengaduanController::class, 'edit'])->name('edit-pengaduan');
    Route::put('/update-pengaduan/{id}', [PengaduanController::class, 'update'])->name('update-pengaduan');
    Route::post('/update-status-pengaduan', [PengaduanController::class,'updateStatus'])->name('update-status-pengaduan');
    Route::delete('/hapus-pengaduan/{id}', [PengaduanController::class, 'destroy'])->name('hapus-pengaduan');
});

Route::group(['middleware' => ['auth', 'checkLevel:admin,submission']], function() {
    Route::get('/admin-pengajuan', [PengajuanController::class, 'index'])->name('admin-pengajuan');
    Route::post('/update-status-pengajuan', [PengajuanController::class,'updateStatus'])->name('update-status-pengajuan');
    Route::get('/edit-pengajuan/{id}', [PengajuanController::class, 'edit'])->name('edit-pengajuan');
    Route::put('/update-pengajuan/{id}', [PengajuanController::class, 'update'])->name('update-pengajuan');
    Route::delete('/hapus-pengajuan/{id}', [PengajuanController::class, 'destroy'])->name('hapus-pengajuan');
});

Route::group(['middleware' => ['auth', 'checkLevel:admin,ktp']], function() {
    Route::get('/admin-ktp', [KTPController::class, 'index'])->name('admin-ktp');
    Route::get('/admin-ktp/create', [KTPController::class, 'create'])->name('admin-ktp.create');
    Route::post('/admin-ktp', [KTPController::class, 'store'])->name('admin-ktp.store');
    Route::post('/update-status-ktp', [KTPController::class,'updateStatus'])->name('update-status-ktp');
    Route::get('/admin-ktp/{id}/edit', [KTPController::class, 'edit'])->name('admin-ktp.edit');
    Route::put('/admin-ktp/{id}', [KTPController::class, 'update'])->name('admin-ktp.update');
    Route::delete('/admin-ktp/{id}', [KTPController::class, 'destroy'])->name('hapus-ktp');
});

Route::group(['middleware' => ['checkLevel:admin']], function() {
    Route::get('/admin-berita', [BeritaController::class, 'indexAdmin'])->name('admin-berita');
    Route::get('/tambah-berita', [BeritaController::class, 'create'])->name('tambah-berita');
    Route::post('/tambahkan-berita', [BeritaController::class, 'store'])->name('tambahkan-berita');
    Route::get('/edit-berita/{id}', [BeritaController::class, 'edit'])->name('edit-berita');
    Route::put('/update-berita/{id}', [BeritaController::class, 'update'])->name('update-berita');
    Route::delete('/hapus-berita/{id}', [BeritaController::class, 'destroy'])->name('hapus-berita');
});

Route::group(['middleware' => ['auth', 'checkLevel:admin,tax']], function() {
    Route::get('/admin-pajak',[PajakController::class, 'indexAdmin'])->name('admin-pajak');
    Route::post('/update-status-pajak', [PajakController::class,'updateStatus'])->name('update-status-pajak');
    Route::delete('/hapus-pajak/{id}', [PajakController::class, 'destroy'])->name('hapus-pajak');
});

Route::group(['middleware' => ['auth', 'checkLevel:admin']], function() {
    Route::get('/admin-berita', [BeritaController::class, 'indexAdmin'])->name('admin-berita');
    Route::get('/tambah-berita', [BeritaController::class, 'create'])->name('tambah-berita');
    Route::post('/tambahkan-berita', [BeritaController::class, 'store'])->name('tambahkan-berita');
    Route::get('/edit-berita/{id}', [BeritaController::class, 'edit'])->name('edit-berita');
    Route::put('/update-berita/{id}', [BeritaController::class, 'update'])->name('update-berita');
    Route::delete('/hapus-berita/{id}', [BeritaController::class, 'destroy'])->name('hapus-berita');
});

Route::group(['middleware' => ['checkLevel:admin,user,complaint,submission,ktp,tax']], function() {
    Route::get('/admin-kritik', [KritikController::class, 'index'])->name('admin-kritik');
    Route::get('/edit-kritik/{id}', [KritikController::class, 'edit'])->name('edit-kritik');
    Route::put('/update-kritik/{id}', [KritikController::class, 'update'])->name('update-kritik');
    Route::delete('/hapus-kritik/{id}', [KritikController::class, 'destroy'])->name('hapus-kritik-saran');
});
