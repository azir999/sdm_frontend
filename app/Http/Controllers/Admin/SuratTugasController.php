<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class SuratTugasController extends Controller
{
    private static $initialSuratTugasData = [
        ['id_surat' => 1, 'kode_pegawai' => 'D-123', 'nama_pegawai' => 'Muhammad Azir', 'nidn' => '123456789', 'nik' => '9876543210123456', 'nomor_sk' => 'SK-001/UNIV/V/2025', 'tanggal_sk' => '2025-05-23', 'keterangan' => 'Segera Diperbarui - Tugas Penelitian Blockchain', 'tengat_waktu' => '1 Bulan'],
        ['id_surat' => 2, 'kode_pegawai' => 'K-123', 'nama_pegawai' => 'Rizki Apriansyah', 'nidn' => '-', 'nik' => '1234567890987654', 'nomor_sk' => 'SK-002/UNIV/V/2025', 'tanggal_sk' => '2025-05-27', 'keterangan' => 'Segera Diperbarui - Penugasan Proyek Sistem Informasi', 'tengat_waktu' => '2 Bulan'],
    ];

    private function getSessionData($key, $initialData) {
        if (!session()->has($key)) {
            session([$key => $initialData]);
        }
        return session($key);
    }
    private function setSessionData($key, $data) {
        session([$key => $data]);
    }

    private function getSuratTugasData() {
        return collect($this->getSessionData('surat_tugas_dummy', self::$initialSuratTugasData))->map(fn($item) => (object)$item);
    }
    private function findSuratTugasById($id) {
        return $this->getSuratTugasData()->firstWhere('id_surat', (int)$id);
    }

    public function index(Request $request)
    {
        $suratTugasData = $this->getSuratTugasData();
        return view('admin.surat-tugas.index', compact('suratTugasData'));
    }

    public function create()
    {
        $pegawaiOptions = [
            'D-123' => 'Muhammad Azir (D-123)',
            'K-123' => 'Rizki Apriansyah (K-123)',
            'S-789' => 'Budi Santoso (S-789)',
        ];
        return view('admin.surat-tugas.create', compact('pegawaiOptions'));
    }


    public function store(Request $request)
    {
    

        $currentData = $this->getSessionData('surat_tugas_dummy', self::$initialSuratTugasData);
        $newId = count($currentData) > 0 ? max(array_column($currentData, 'id_surat')) + 1 : 1;
        
        $nama_pegawai = 'Nama Pegawai ' . $request->input('kode_pegawai'); 
        $selectedPegawai = collect(self::$initialSuratTugasData)->firstWhere('kode_pegawai', $request->input('kode_pegawai'));
        if ($selectedPegawai) {
            $nama_pegawai = $selectedPegawai['nama_pegawai'];
        }


        $newData = [
            'id_surat' => $newId,
            'kode_pegawai' => $request->input('kode_pegawai'),
            'nama_pegawai' => $nama_pegawai, 
            'nidn' => $selectedPegawai ? $selectedPegawai['nidn'] : '-', 
            'nik' => $selectedPegawai ? $selectedPegawai['nik'] : '-',
            'nomor_sk' => $request->input('nomor_sk'),
            'tanggal_sk' => $request->input('tanggal_sk'),
            'keterangan' => $request->input('keterangan'),
            'tengat_waktu' => $request->input('tengat_waktu')
        ];
        $currentData[] = $newData;
        $this->setSessionData('surat_tugas_dummy', $currentData);

        return redirect()->route('admin.surat-tugas.index')->with('success', 'Surat Tugas berhasil ditambahkan (simulasi).');
    }

    public function edit($id_surat)
    {
        $surat = $this->findSuratTugasById($id_surat);
        if (!$surat) {
            return redirect()->route('admin.surat-tugas.index')->with('error', 'Surat Tugas tidak ditemukan.');
        }
         $pegawaiOptions = [
            'D-123' => 'Muhammad Azir (D-123)',
            'K-123' => 'Rizki Apriansyah (K-123)',
            'S-789' => 'Budi Santoso (S-789)',
        ];
        return view('admin.surat-tugas.edit', compact('surat', 'pegawaiOptions'));
    }

    public function update(Request $request, $id_surat)
    {
        $currentData = $this->getSessionData('surat_tugas_dummy', self::$initialSuratTugasData);
        foreach ($currentData as $key => $data) {
            if ($data['id_surat'] == $id_surat) {
                $currentData[$key]['kode_pegawai'] = $request->input('kode_pegawai', $data['kode_pegawai']);
                $selectedPegawai = collect(self::$initialSuratTugasData)->firstWhere('kode_pegawai', $request->input('kode_pegawai'));
                 if ($selectedPegawai) {
                     $currentData[$key]['nama_pegawai'] = $selectedPegawai['nama_pegawai'];
                     $currentData[$key]['nidn'] = $selectedPegawai['nidn'];
                     $currentData[$key]['nik'] = $selectedPegawai['nik'];
                 }

                $currentData[$key]['nomor_sk'] = $request->input('nomor_sk', $data['nomor_sk']);
                $currentData[$key]['tanggal_sk'] = $request->input('tanggal_sk', $data['tanggal_sk']);
                $currentData[$key]['keterangan'] = $request->input('keterangan', $data['keterangan']);
                $currentData[$key]['tengat_waktu'] = $request->input('tengat_waktu', $data['tengat_waktu']);
                break;
            }
        }
        $this->setSessionData('surat_tugas_dummy', $currentData);
        return redirect()->route('admin.surat-tugas.index')->with('success', 'Surat Tugas berhasil diupdate (simulasi).');
    }

    public function destroy($id_surat)
    {
        $currentData = $this->getSessionData('surat_tugas_dummy', self::$initialSuratTugasData);
        $updatedData = array_filter($currentData, function ($item) use ($id_surat) {
            return $item['id_surat'] != $id_surat;
        });
        $this->setSessionData('surat_tugas_dummy', array_values($updatedData));

        return redirect()->route('admin.surat-tugas.index')->with('success', 'Surat Tugas berhasil dihapus (simulasi).');
    }
}