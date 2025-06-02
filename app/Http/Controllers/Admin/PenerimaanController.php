<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class PenerimaanController extends Controller
{
    private static $initialDosenData = [
        ['id' => 1, 'kode' => 'DT123', 'nama' => 'Muhammad Azir', 'nidn' => '0211118601', 'nik' => '123456780001', 'nip' => '199001012020031001', 'no_npwp' => '09.254.294.3-407.000', 'email' => 'muhammadazir188@gmail.com', 'gelar_depan' => 'Prof. Dr.', 'gelar_belakang' => 'M.Kom.', 'tempat_lahir' => 'Palembang', 'tanggal_lahir' => '1984-07-17', 'jenis_kelamin' => 'Laki Laki', 'golongan_darah' => 'A', 'agama' => 'Islam', 'nomor_hp' => '081366179497', 'fakultas' => 'Sains Teknologi', 'program_studi' => 'Sistem Informasi', 'bidang_ilmu_kompetensi' => 'Desain Antar Muka', 'ikatan_kerja' => '1 Tahun', 'tanggal_mulai_bertugas' => '2025-05-30', 'pendidikan_tertinggi' => 'S3', 'jabatan_akademik' => 'Warek', 'golongan_dosen' => 'IV/a', 'status_aktivasi' => 'aktif', 'foto_dosen_url' => '#', 'dokumen_url' => '#', 'foto_dosen_filename' => 'foto_azir.jpg', 'dokumen_filename' => 'dokumen_azir.pdf'],
    ];

    private static $initialKaryawanData = [
        ['id' => 2, 'kode' => 'KT-123', 'nama' => 'Rizki Apriansyah', 'nik' => '123456780002', 'no_npwp' => '08.123.456.7-408.000', 'tempat_lahir' => 'KAI', 'tanggal_lahir' => '2000-03-12', 'jenis_kelamin' => 'Perempuan', 'gol_darah' => 'B', 'pendidikan_terakhir' => 'S1', 'ikatan_kerja' => '3 Tahun', 'tanggal_mulai_bertugas' => '2025-05-30', 'nomor_hp' => '086547266446', 'unit_kerja' => 'Jaringan IT', 'foto_karyawan_url' => '#', 'dokumen_url' => '#', 'foto_karyawan_filename' => 'foto_rizki.jpg', 'dokumen_filename' => 'dokumen_rizki.pdf'],
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


    private function getPenerimaanDosenData() {
        return collect($this->getSessionData('penerimaan_dosen_dummy', self::$initialDosenData))->map(fn($item) => (object)$item);
    }
    private function findPenerimaanDosenById($id) {
        return $this->getPenerimaanDosenData()->firstWhere('id', (int)$id);
    }

    private function getPenerimaanKaryawanData() {
        return collect($this->getSessionData('penerimaan_karyawan_dummy', self::$initialKaryawanData))->map(fn($item) => (object)$item);
    }
    private function findPenerimaanKaryawanById($id) {
        return $this->getPenerimaanKaryawanData()->firstWhere('id', (int)$id);
    }
    
    private function getCommonDropdownOptions() {
         return [
            'jenisKelaminOptions' => ['Laki Laki', 'Perempuan'],
            'pendidikanOptions' => ['SD', 'SMP', 'SMA Sederajat', 'SMK Sederajat', 'D1', 'D2', 'D3', 'S1', 'S2', 'S3'],
            'statusAktivasiOptions' => ['aktif', 'nonaktif'] // Untuk Dosen
        ];
    }


    public function index(Request $request)
    {
        $penerimaanDosenData = $this->getPenerimaanDosenData();
        $penerimaanKaryawanData = $this->getPenerimaanKaryawanData();
        return view('admin.penerimaan.index', compact('penerimaanDosenData', 'penerimaanKaryawanData'));
    }

    // --- DOSEN ---
    public function createDosen()
    {
        return view('admin.penerimaan.dosen-create', $this->getCommonDropdownOptions());
    }

    public function storeDosen(Request $request)
    {
        $dosenData = $this->getSessionData('penerimaan_dosen_dummy', self::$initialDosenData);
        $newId = count($dosenData) > 0 ? max(array_column($dosenData, 'id')) + 1 : 1;

        $newDosen = $request->all();
        $newDosen['id'] = $newId;
        
        $dosenData[] = $newDosen;
        $this->setSessionData('penerimaan_dosen_dummy', $dosenData);

        return redirect()->route('admin.penerimaan.index')->with('success', 'Data Dosen baru berhasil ditambahkan (simulasi).');
    }

    public function editDosen($id)
    {
        $dosen = $this->findPenerimaanDosenById($id);
        if (!$dosen) {
            return redirect()->route('admin.penerimaan.index')->with('error', 'Data Dosen tidak ditemukan.');
        }
        return view('admin.penerimaan.dosen-edit', array_merge(['dosen' => $dosen], $this->getCommonDropdownOptions()));
    }

    public function updateDosen(Request $request, $id)
    {
        $dosenData = $this->getSessionData('penerimaan_dosen_dummy', self::$initialDosenData);
        foreach ($dosenData as $key => $data) {
            if ($data['id'] == $id) {
                $dosenData[$key] = array_merge($data, $request->except(['_token', '_method']));
                break;
            }
        }
        $this->setSessionData('penerimaan_dosen_dummy', $dosenData);
        return redirect()->route('admin.penerimaan.index')->with('success', 'Data Dosen berhasil diupdate (simulasi).');
    }

    public function destroyDosen($id)
    {
        $dosenData = $this->getSessionData('penerimaan_dosen_dummy', self::$initialDosenData);
        $updatedData = array_filter($dosenData, function ($item) use ($id) {
            return $item['id'] != $id;
        });
        $this->setSessionData('penerimaan_dosen_dummy', array_values($updatedData));

        return redirect()->route('admin.penerimaan.index')->with('success', 'Data Dosen berhasil dihapus (simulasi).');
    }

    // --- KARYAWAN ---
    public function createKaryawan()
    {
        return view('admin.penerimaan.karyawan-create', $this->getCommonDropdownOptions());
    }

    public function storeKaryawan(Request $request)
    {
        $karyawanData = $this->getSessionData('penerimaan_karyawan_dummy', self::$initialKaryawanData);
        $newId = count($karyawanData) > 0 ? max(array_column($karyawanData, 'id')) + 1 : 1;

        $newKaryawan = $request->all();
        $newKaryawan['id'] = $newId;

        $karyawanData[] = $newKaryawan;
        $this->setSessionData('penerimaan_karyawan_dummy', $karyawanData);

        return redirect()->route('admin.penerimaan.index')->with('success', 'Data Karyawan baru berhasil ditambahkan (simulasi).');
    }

    public function editKaryawan($id)
    {
        $karyawan = $this->findPenerimaanKaryawanById($id);
         if (!$karyawan) {
            return redirect()->route('admin.penerimaan.index')->with('error', 'Data Karyawan tidak ditemukan.');
        }
        return view('admin.penerimaan.karyawan-edit', array_merge(['karyawan' => $karyawan], $this->getCommonDropdownOptions()));
    }

    public function updateKaryawan(Request $request, $id)
    {
        $karyawanData = $this->getSessionData('penerimaan_karyawan_dummy', self::$initialKaryawanData);
        foreach ($karyawanData as $key => $data) {
            if ($data['id'] == $id) {
                $karyawanData[$key] = array_merge($data, $request->except(['_token', '_method']));
                break;
            }
        }
        $this->setSessionData('penerimaan_karyawan_dummy', $karyawanData);
        return redirect()->route('admin.penerimaan.index')->with('success', 'Data Karyawan berhasil diupdate (simulasi).');
    }

    public function destroyKaryawan($id)
    {
        $karyawanData = $this->getSessionData('penerimaan_karyawan_dummy', self::$initialKaryawanData);
        $updatedData = array_filter($karyawanData, function ($item) use ($id) {
            return $item['id'] != $id;
        });
        $this->setSessionData('penerimaan_karyawan_dummy', array_values($updatedData));
        return redirect()->route('admin.penerimaan.index')->with('success', 'Data Karyawan berhasil dihapus (simulasi).');
    }
}