<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PelamarController extends Controller
{
    public function create()
    {
        $jenisKelaminOptions = ['Laki-laki', 'Perempuan', 'Helikopter'];
        $pendidikanOptions = [
            'SMA Sederajat', 
            'SMK Sederajat', 
            'D1 - Diploma', 
            'D2 - Diploma', 
            'D3 - Diploma', 
            'S1 - Sarjana', 
            'S2 - Magister', 
            'S3 - Doktor'
        ];
        $pilihanLamaranOptions = ['Dosen', 'Karyawan'];
        return view('admin.pelamar.create', compact(
            'jenisKelaminOptions',
            'pendidikanOptions',
            'pilihanLamaranOptions'
        ));
    }
}