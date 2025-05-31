<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PegawaiController;
use App\Http\Controllers\Admin\PelamarController;
use App\Http\Controllers\Admin\PsikologiController;
use App\Http\Controllers\Admin\WawancaraController;
use App\Http\Controllers\Admin\ValidasiPelamarController;

Route::name('admin.') // Nama rute tetap diawali 'admin.' agar konsisten dengan layout Anda
    ->group(function () {   // Mendefinisikan sebuah grup untuk rute-rute berikut:

    // Rute untuk halaman dashboard admin, diakses dari URL root (/)
    Route::get('/', function () {
        // Untuk dashboard, sebaiknya juga menggunakan controller dan mengirim data dinamis
        // Misalnya, total pegawai untuk ditampilkan di kartu dashboard
        // $totalPegawaiKeseluruhan = 200; // Contoh, hitung dari data sebenarnya
        // $jumlahSertifikasi = 90;
        // $periodeAktif = 'Jan - Juni';
        // return view('admin.dashboard', compact('totalPegawaiKeseluruhan', 'jumlahSertifikasi', 'periodeAktif'));
        return view('admin.dashboard');
    })->name('dashboard'); // Nama rute: admin.dashboard -> URL: /

    // Rute untuk halaman Perekrutan (menggantikan /pendataan)
    Route::get('/perekrutan', function () {
        // Akan menampilkan file view 'resources/views/admin/perekrutan-index.blade.php'.
        return view('admin.perekrutan-index');
    })->name('perekrutan.index'); // Nama rute: admin.perekrutan.index -> URL: /perekrutan

    // Rute untuk halaman Penerimaan (menggantikan /pencetakan)
    Route::get('/penerimaan', function () {
        // Akan menampilkan file view 'resources/views/admin/penerimaan-index.blade.php'.
        return view('admin.penerimaan-index');
    })->name('penerimaan.index'); // Nama rute: admin.penerimaan.index -> URL: /penerimaan

    // Rute untuk halaman Update (tetap ada)
    Route::get('/update', function () {
        return view('admin.update-index');
    })->name('update.index'); // Nama rute: admin.update.index -> URL: /update

    // Rute untuk halaman Validasi (tetap ada)
    Route::get('/validasi', function () {
        return view('admin.validasi-index');
    })->name('validasi.index'); // Nama rute: admin.validasi.index -> URL: /validasi

    // Rute untuk halaman Surat Tugas (tetap ada)
    Route::get('/surat-tugas', function () {
        return view('admin.surat-tugas-index');
    })->name('surat-tugas.index'); // Nama rute: admin.surat-tugas.index -> URL: /surat-tugas

    // Rute untuk halaman Daftar Telepon (menggantikan /berita-telepon)
    Route::get('/daftar-telepon', function () {
        // Akan menampilkan file view 'resources/views/admin/daftar-telepon-index.blade.php'.
        return view('admin.daftar-telepon-index');
    })->name('daftar-telepon.index'); // Nama rute: admin.daftar-telepon.index -> URL: /daftar-telepon
    
    // Rute untuk halaman Profile (tetap ada)
    Route::get('/profile', function () {
        return view('admin.profile-index');
    })->name('profile.index'); // Nama rute: admin.profile.index -> URL: /profile

    // RUTE UNTUK RINGKASAN JUMLAH PEGAWAI (tetap ada)
    Route::get('/ringkasan-pegawai', [PegawaiController::class, 'ringkasan'])
         ->name('pegawai.ringkasan'); // Nama rute: admin.pegawai.ringkasan -> URL: /ringkasan-pegawai

    Route::get('/pelamar/input-data', [PelamarController::class, 'create'])->name('pelamar.create');

    Route::get('/psikologi/input-data', [PsikologiController::class, 'create'])->name('psikologi.create');
    // Rute untuk menyimpan data (buat nanti jika diperlukan)
    // Route::post('/psikologi/store', [PsikologiController::class, 'store'])->name('psikologi.store');
    Route::get('/wawancara/input-data', [WawancaraController::class, 'create'])->name('wawancara.create');

    Route::get('/validasi-pelamar', [ValidasiPelamarController::class, 'index'])->name('validasi.pelamar.index');
});