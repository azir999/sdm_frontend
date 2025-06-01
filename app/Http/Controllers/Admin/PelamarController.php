<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PelamarController extends Controller
{
    private function getDropdownOptions()
    {
        return [
            'jenisKelaminOptions' => ['Laki-laki', 'Perempuan'],
            'pendidikanOptions' => [
                'SMA Sederajat', 
                'SMK Sederajat', 
                'D1 - Diploma', 
                'D2 - Diploma', 
                'D3 - Diploma', 
                'S1 - Sarjana', 
                'S2 - Magister', 
                'S3 - Doktor'
            ],
            'pilihanLamaranOptions' => ['Dosen', 'Karyawan'],
        ];
    }

    public function create()
    {
        return view('admin.pelamar.create', $this->getDropdownOptions());
    }

  
   public function edit($id) 
{
   
    $pelamar = (object) [
        'id_dummy' => $id, 
        'nama_pelamar' => 'Data Lama Nama Pelamar',
        'nidn' => '00112233_LAMA',
        'tempat_lahir' => 'Kota Lama',
        'tanggal_lahir' => '1995-05-10',
        'jenis_kelamin' => 'perempuan',
        'email_pelamar' => 'lama@example.com',
        'alamat_pelamar' => 'Jl. Kenangan No. 1, Kota Lama',
        'pendidikan_terakhir' => 'S2 - Magister',
        'usia' => 29,
        'no_hp' => '081100001111',
        'ipk' => '3.50',
        'bidang_ilmu' => 'Sistem Informasi Lama',
        'pilihan_lamaran' => 'karyawan',
        'tanggal_lamaran' => '2024-10-15',
        'nama_dokumen_lama' => 'cv_lama.pdf' 
    ];

    $viewData = array_merge(['pelamar' => $pelamar], $this->getDropdownOptions());
    
    return view('admin.pelamar.edit', $viewData);
}

 
    public function update(Request $request, $id)
    {

        return redirect()->route('admin.perekrutan.index')->with('success', 'Data pelamar dengan ID ' . $id . ' berhasil diupdate (simulasi).');
    }

    public function destroy($id)
    {

        return redirect()->route('admin.perekrutan.index')->with('success', 'Data pelamar dengan ID ' . $id . ' berhasil dihapus (simulasi).');
    }

}

