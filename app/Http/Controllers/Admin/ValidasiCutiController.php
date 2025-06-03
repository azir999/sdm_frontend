<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ValidasiCutiController extends Controller
{
    public function index(Request $request)
    {
        $pengajuanCutiData = collect([
            (object)[
                'id_cuti' => 1,
                'kode_pegawai' => 'D-123', 
                'nama_pegawai' => 'Muhammad Azir', 
                'ikatan_kerja' => 'Dosen Tetap', 
                'jenis_cuti' => 'Sakit',
                'tanggal_pengajuan' => '20 Mei 2025',
                'tanggal_mulai' => '23 Mei 2025', 
                'tanggal_berakhir' => '28 Mei 2025', 
                'status_validasi' => 'terima'
            ],
            (object)[
                'id_cuti' => 2,
                'kode_pegawai' => 'K-123', 
                'nama_pegawai' => 'Rizki Apriansyah', 
                'ikatan_kerja' => 'Karyawan Kontrak', 
                'jenis_cuti' => 'Sakit',
                'tanggal_pengajuan' => '24 Mei 2025', 
                'tanggal_mulai' => '27 Mei 2025', 
                'tanggal_berakhir' => '02 Jun 2025', 
                'status_validasi' => 'tolak'
            ],
            (object)[
                'id_cuti' => 3,
                'kode_pegawai' => 'S-789', 
                'nama_pegawai' => 'Budi Santoso', 
                'ikatan_kerja' => 'Dosen Honorer', 
                'jenis_cuti' => 'Tahunan',
                'tanggal_pengajuan' => '3 jun 2025', 
                'tanggal_mulai' => '10 Jun 2025', 
                'tanggal_berakhir' => '15 Jun 2025', 
                'status_validasi' => 'pending'
            ],
        ]);

        return view('admin.cuti.index', compact('pengajuanCutiData'));
    }
}