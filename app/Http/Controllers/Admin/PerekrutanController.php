<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class PerekrutanController extends Controller
{
   
    public function index(Request $request)
    {

        $daftarPelamar = collect([
            (object)[
                'id_unik_dummy' => 'CD-123',
                'kode' => 'CD-123', 
                'nama' => 'Muhammad Azir', 
                'nidn' => '0211118601', 
                'tempat_lahir' => 'Paya Besar', 
                'tanggal_lahir' => '17 Juli 2004', 
                'jenis_kelamin' => 'Laki-Laki', 
                'email' => 'muhammadazir@gmail.com', 
                'alamat' => 'Palembang', 
                'pendidikan_terakhir' => 'S3', 
                'usia' => 43, 
                'nomor_hp' => '081366179497',
                'ipk' => 4.0, 
                'bidang_ilmu' => 'Desain Antar Muka', 
                'pilihan_lamaran' => 'Dosen', 
                'tanggal_lamaran' => '20 Mei 2025',
                'dokumen_url' => '#'
            ],
            (object)[
                'id_unik_dummy' => 'CK-123',
                'kode' => 'CK-123', 
                'nama' => 'Rizki Apriansyah', 
                'nidn' => '-', 
                'tempat_lahir' => 'KAI', 
                'tanggal_lahir' => '12 Maret 2004', 
                'jenis_kelamin' => 'Perempuan', 
                'email' => 'RizkiRizxx@gmail.com', 
                'alamat' => 'Palembang', 
                'pendidikan_terakhir' => 'S1', 
                'usia' => 23, 
                'nomor_hp' => '086547266446',
                'ipk' => 2.8, 
                'bidang_ilmu' => 'Jaringan', 
                'pilihan_lamaran' => 'Karyawan', 
                'tanggal_lamaran' => '20 Mei 2025',
                'dokumen_url' => '#'
            ],
    
        ]);


        return view('admin.perekrutan.index', compact('daftarPelamar'));
    }
}