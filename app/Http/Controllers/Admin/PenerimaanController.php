<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class PenerimaanController extends Controller
{
    public function index(Request $request)
    {
        $penerimaanDosenData = collect([
            (object)[
                'id' => 1, 'kode' => 'DT123', 'nama' => 'Muhammad Azir', 
                'nidn' => '0211118601', 'nik' => '123456780001', 'nip' => '199001012020031001',
                'no_npwp' => '09.254.294.3-407.000', 'email' => 'muhammadazir188@gmail.com', 
                'gelar_depan' => 'Prof. Dr.', 'gelar_belakang' => 'M.Kom.',
                'tempat_lahir' => 'Palembang', 'tanggal_lahir' => '1984-07-17', 
                'jenis_kelamin' => 'Laki Laki',
                'golongan_darah' => 'A', 'agama' => 'Islam', 'nomor_hp' => '081366179497', 
                'fakultas' => 'Sains Teknologi', 'program_studi' => 'Sistem Informasi', 
                'bidang_ilmu_kompetensi' => 'Desain Antar Muka', 'ikatan_kerja' => '1 Tahun',
                'tanggal_mulai_bertugas' => '2025-05-30', 'pendidikan_tertinggi' => 'S3', 
                'jabatan_akademik' => 'Warek', 'golongan_dosen' => 'IV/a',
                'status_aktivasi' => 'aktif', 
                'foto_dosen_url' => '#', 
                'dokumen_url' => '#'
            ],
        ]);

        $penerimaanKaryawanData = collect([
            (object)[
                'id' => 2, 'kode' => 'KT-123', 'nama' => 'Rizki Apriansyah', 
                'nik' => '123456780002', 'no_npwp' => '08.123.456.7-408.000',
                'tempat_lahir' => 'KAI', 'tanggal_lahir' => '2000-03-12', 
                'jenis_kelamin' => 'Perempuan', 'gol_darah' => 'B', 
                'pendidikan_terakhir' => 'S1', 'ikatan_kerja' => '3 Tahun',
                'tanggal_mulai_bertugas' => '2025-05-30', 'nomor_hp' => '086547266446', 
                'unit_kerja' => 'Jaringan IT',
                'foto_karyawan_url' => '#', 
                'dokumen_url' => '#'
            ],
        ]);

        return view('admin.penerimaan.index', compact('penerimaanDosenData', 'penerimaanKaryawanData'));
    }

    public function editDosen($id)
    {
        $dosen = (object)[
            'id' => $id, 'kode' => 'DT123', 'nama' => 'Muhammad Azir (Data Lama)', 
            'nidn' => '0211118601', 'nik' => '123456780001', 'nip' => '199001012020031001',
            'no_npwp' => '09.254.294.3-407.000', 'email' => 'muhammadazir188@gmail.com', 
            'gelar_depan' => 'Prof. Dr.', 'gelar_belakang' => 'M.Kom.',
            'tempat_lahir' => 'Palembang', 'tanggal_lahir' => '1984-07-17', 
            'jenis_kelamin' => 'Laki Laki',
            'golongan_darah' => 'A', 'agama' => 'Islam', 'nomor_hp' => '081366179497', 
            'fakultas' => 'Sains Teknologi', 'program_studi' => 'Sistem Informasi', 
            'bidang_ilmu_kompetensi' => 'Desain Antar Muka', 'ikatan_kerja' => '1 Tahun',
            'tanggal_mulai_bertugas' => '2025-05-30', 'pendidikan_tertinggi' => 'S3', 
            'jabatan_akademik' => 'Warek', 'golongan_dosen' => 'IV/a',
            'status_aktivasi' => 'aktif',
            'foto_dosen_filename' => 'foto_azir.jpg', // Nama file foto lama
            'dokumen_filename' => 'dokumen_azir.pdf' // Nama file dokumen lama
        ];
        $jenisKelaminOptions = ['Laki Laki', 'Perempuan'];
        $pendidikanOptions = ['SD', 'SMP', 'SMA Sederajat', 'SMK Sederajat', 'D1', 'D2', 'D3', 'S1', 'S2', 'S3'];
        $statusAktivasiOptions = ['aktif', 'nonaktif'];


        return view('admin.penerimaan.dosen-edit', compact('dosen', 'jenisKelaminOptions', 'pendidikanOptions', 'statusAktivasiOptions'));
    }
    public function updateDosen(Request $request, $id)
    {

        return redirect()->route('admin.penerimaan.index')->with('success', 'Data Dosen berhasil diupdate (simulasi).');
    }


    public function editKaryawan($id)
    {
        $karyawan = (object)[
            'id' => $id, 'kode' => 'KT-123', 'nama' => 'Rizki Apriansyah (Data Lama)', 
            'nik' => '123456780002', 'no_npwp' => '08.123.456.7-408.000',
            'tempat_lahir' => 'KAI', 'tanggal_lahir' => '2000-03-12', 
            'jenis_kelamin' => 'Perempuan', 
            'gol_darah' => 'B', 
            'pendidikan_terakhir' => 'S1', 'ikatan_kerja' => '3 Tahun',
            'tanggal_mulai_bertugas' => '2025-05-30', 'nomor_hp' => '086547266446', 
            'unit_kerja' => 'Jaringan IT',
            'foto_karyawan_filename' => 'foto_rizki.jpg',
            'dokumen_filename' => 'dokumen_rizki.pdf'
        ];
        $jenisKelaminOptions = ['Laki Laki', 'Perempuan'];
        $pendidikanOptions = ['SD', 'SMP', 'SMA Sederajat', 'SMK Sederajat', 'D1', 'D2', 'D3', 'S1', 'S2', 'S3'];

        return view('admin.penerimaan.karyawan-edit', compact('karyawan', 'jenisKelaminOptions', 'pendidikanOptions'));
    }


    public function updateKaryawan(Request $request, $id)
    {
        return redirect()->route('admin.penerimaan.index')->with('success', 'Data Karyawan berhasil diupdate (simulasi).');
    }
}