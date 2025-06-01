<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ValidasiPelamarController extends Controller
{
    public function index()
    {
        $pelamarArray = [
            (object)[
                'kode' => 'D-123', 'nama' => 'Muhammad Azir', 'nidn' => '0211118601', 
                'tempat_lahir' => 'Paya Besar', 'tanggal_lahir' => '17 Juli 2004', 
                'jenis_kelamin' => 'Laki-Laki', 'email' => 'muhammadazir@gmail.com', 
                'alamat' => 'Palembang', 'pendidikan_terakhir' => 'S3', 'usia' => 43, 'ipk' => 4.0, 
                'bidang_ilmu' => 'Desain Antar Muka', 'nomor_hp' => '081366179497', 
                'pilihan_lamaran' => 'Dosen', 'tanggal_lamaran' => '20 Mei 2025', 
                'wawancara_status' => true, 'psikologi_status' => true, 'status_validasi' => 'terima' 
            ],
            (object)[
                'kode' => 'K-123', 'nama' => 'Rizki Apriansyah', 'nidn' => '-', 
                'tempat_lahir' => 'KAI', 'tanggal_lahir' => '12 Maret 2004', 
                'jenis_kelamin' => 'Perempuan', 'email' => 'RizkiRizxx@gmail.com', 
                'alamat' => 'Palembang', 'pendidikan_terakhir' => 'S1', 'usia' => 23, 'ipk' => 2.8, 
                'bidang_ilmu' => 'Jaringan', 'nomor_hp' => '086547266446', 
                'pilihan_lamaran' => 'Karyawan', 'tanggal_lamaran' => '20 Mei 2025', 
                'wawancara_status' => true, 'psikologi_status' => false, 'status_validasi' => 'tolak'
            ],
        ];

        $pelamarData = collect($pelamarArray);

        return view('admin.validasi.index', compact('pelamarData'));
    }
}