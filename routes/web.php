<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PerekrutanController;
use App\Http\Controllers\Admin\PegawaiController;
use App\Http\Controllers\Admin\PelamarController;
use App\Http\Controllers\Admin\PenerimaanController;
use App\Http\Controllers\Admin\WawancaraController;
use App\Http\Controllers\Admin\PsikologiController;
use App\Http\Controllers\Admin\ValidasiPelamarController;
use App\Http\Controllers\Admin\ValidasiCutiController;
use App\Http\Controllers\Admin\SuratTugasController;
use App\Http\Controllers\Admin\DaftarTeleponController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RoleController;

Route::name('admin.')
    ->group(function () {

    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/perekrutan', [PerekrutanController::class, 'index'])->name('perekrutan.index');

    Route::get('/penerimaan', [PenerimaanController::class, 'index'])->name('penerimaan.index');
   
     Route::get('/penerimaan', [PenerimaanController::class, 'index'])->name('penerimaan.index');
    
    // Rute untuk Penerimaan Dosen
    Route::get('/penerimaan/dosen/create', [PenerimaanController::class, 'createDosen'])->name('penerimaan.dosen.create');
    Route::post('/penerimaan/dosen', [PenerimaanController::class, 'storeDosen'])->name('penerimaan.dosen.store');
    Route::get('/penerimaan/dosen/{id}/edit', [PenerimaanController::class, 'editDosen'])->name('penerimaan.dosen.edit');
    Route::put('/penerimaan/dosen/{id}', [PenerimaanController::class, 'updateDosen'])->name('penerimaan.dosen.update');
    Route::delete('/penerimaan/dosen/{id}', [PenerimaanController::class, 'destroyDosen'])->name('penerimaan.dosen.destroy');
    
    // Rute untuk Penerimaan Karyawan
    Route::get('/penerimaan/karyawan/create', [PenerimaanController::class, 'createKaryawan'])->name('penerimaan.karyawan.create');
    Route::post('/penerimaan/karyawan', [PenerimaanController::class, 'storeKaryawan'])->name('penerimaan.karyawan.store');
    Route::get('/penerimaan/karyawan/{id}/edit', [PenerimaanController::class, 'editKaryawan'])->name('penerimaan.karyawan.edit');
    Route::put('/penerimaan/karyawan/{id}', [PenerimaanController::class, 'updateKaryawan'])->name('penerimaan.karyawan.update');
    Route::delete('/penerimaan/karyawan/{id}', [PenerimaanController::class, 'destroyKaryawan'])->name('penerimaan.karyawan.destroy');

    Route::get('/update', function () {
        return view('admin.update');
    })->name('update.index');

    Route::get('/validasi-cuti', function () {
        return view('admin.validasi-cuti');
    })->name('validasi-cuti.index');

    Route::get('/validasi-cuti', [ValidasiCutiController::class, 'index'])->name('validasi-cuti.index'); 

    Route::get('/surat-tugas', [SuratTugasController::class, 'index'])->name('surat-tugas.index');
    Route::get('/surat-tugas/create', [SuratTugasController::class, 'create'])->name('surat-tugas.create');
    Route::post('/surat-tugas', [SuratTugasController::class, 'store'])->name('surat-tugas.store');
    Route::get('/surat-tugas/{id_surat}/edit', [SuratTugasController::class, 'edit'])->name('surat-tugas.edit');
    Route::put('/surat-tugas/{id_surat}', [SuratTugasController::class, 'update'])->name('surat-tugas.update');
    Route::delete('/surat-tugas/{id_surat}', [SuratTugasController::class, 'destroy'])->name('surat-tugas.destroy');

    Route::get('/daftar-telepon', [DaftarTeleponController::class, 'index'])->name('daftar-telepon.index');
    Route::get('/daftar-telepon/create', [DaftarTeleponController::class, 'create'])->name('daftar-telepon.create'); 
    Route::post('/daftar-telepon', [DaftarTeleponController::class, 'store'])->name('daftar-telepon.store');      
    Route::get('/daftar-telepon/{id_pegawai}/edit', [DaftarTeleponController::class, 'edit'])->name('daftar-telepon.edit');
    Route::put('/daftar-telepon/{id_pegawai}', [DaftarTeleponController::class, 'update'])->name('daftar-telepon.update');
    Route::delete('/daftar-telepon/{id_pegawai}', [DaftarTeleponController::class, 'destroy'])->name('daftar-telepon.destroy');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.index');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/ringkasan-pegawai', [PegawaiController::class, 'ringkasan'])
         ->name('pegawai.ringkasan');

    Route::get('/pelamar/input-data', [PelamarController::class, 'create'])->name('pelamar.create');
    Route::get('/pelamar/{id}/edit', [PelamarController::class, 'edit'])->name('pelamar.edit');
    Route::put('/pelamar/{id}', [PelamarController::class, 'update'])->name('pelamar.update');
    Route::delete('/pelamar/{id}', [PelamarController::class, 'destroy'])->name('pelamar.destroy');

    Route::get('/wawancara/input-data', [WawancaraController::class, 'create'])->name('wawancara.create');
    Route::get('/wawancara', [WawancaraController::class, 'index'])->name('wawancara.index');
    Route::post('/wawancara', [WawancaraController::class, 'store'])->name('wawancara.store');
    Route::get('/wawancara/{id_wawancara}/edit', [WawancaraController::class, 'edit'])->name('wawancara.edit');
    Route::put('/wawancara/{id_wawancara}', [WawancaraController::class, 'update'])->name('wawancara.update');
    Route::delete('/wawancara/{id_wawancara}', [WawancaraController::class, 'destroy'])->name('wawancara.destroy');

    Route::get('/psikologi', [PsikologiController::class, 'index'])->name('psikologi.index');
    Route::get('/psikologi/input-data', [PsikologiController::class, 'create'])->name('psikologi.create');
    Route::post('/psikologi', [PsikologiController::class, 'store'])->name('psikologi.store');
    Route::get('/psikologi/{id_psikologi}/edit', [PsikologiController::class, 'edit'])->name('psikologi.edit');
    Route::put('/psikologi/{id_psikologi}', [PsikologiController::class, 'update'])->name('psikologi.update');
    Route::delete('/psikologi/{id_psikologi}', [PsikologiController::class, 'destroy'])->name('psikologi.destroy');

    Route::get('/validasi-pelamar', [ValidasiPelamarController::class, 'index'])->name('validasi.pelamar.index');

      Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/roles/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::put('/roles/{id}', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('/roles/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');

});