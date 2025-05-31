<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function ringkasan()
    {
        // Data dummy untuk tabel
        $dataRingkasan = [
            'dosen' => ['laki_laki' => 70, 'perempuan' => 50, 'jumlah' => 120],
            'karyawan' => ['laki_laki' => 30, 'perempuan' => 50, 'jumlah' => 80],
        ];
        
        $totalPegawaiKeseluruhan = $dataRingkasan['dosen']['jumlah'] + $dataRingkasan['karyawan']['jumlah'];

        $totalLakiLaki = $dataRingkasan['dosen']['laki_laki'] + $dataRingkasan['karyawan']['laki_laki'];
        $totalPerempuan = $dataRingkasan['dosen']['perempuan'] + $dataRingkasan['karyawan']['perempuan'];

        return view('admin.pegawai.ringkasan', compact(
            'dataRingkasan', 
            'totalPegawaiKeseluruhan',
            'totalLakiLaki',
            'totalPerempuan'
        ));
    }
}