<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class SuratTugasController extends Controller
{
    public function index(Request $request)
    {
        $suratTugasData = collect([
            (object)[
                'id_surat' => 1,
                'kode_pegawai' => 'D-123', 
                'nama_pegawai' => 'Muhammad Azir', 
                'nidn' => '123456789', 
                'nik' => '9876543210123456', 
                'nomor_sk' => 'SK-001/UNIV/V/2025',
                'tanggal_sk' => '23 Mei 2025',
                'keterangan' => 'Segera Diperbarui - Tugas Penelitian Blockchain', 
                'tengat_waktu' => '1 Bulan' 
            ],
            (object)[
                'id_surat' => 2,
                'kode_pegawai' => 'K-123', 
                'nama_pegawai' => 'Rizki Apriansyah', 
                'nidn' => '-', 
                'nik' => '1234567890987654', 
                'nomor_sk' => 'SK-002/UNIV/V/2025',
                'tanggal_sk' => '27 Mei 2025', 
                'keterangan' => 'Segera Diperbarui - Penugasan Proyek Sistem Informasi', 
                'tengat_waktu' => '2 Bulan'
            ],
        ]);

        return view('admin.surat-tugas.index', compact('suratTugasData'));
    }
}