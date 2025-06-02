<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class WawancaraController extends Controller
{
    private static $staticWawancaraData = [
         [
            'id_wawancara' => 1, 'kode_pelamar' => 'D-123', 'nama_pelamar' => 'Muhammad Azir', 
            'nama_pewawancara' => 'Dr. Hidayat Aman, M.Kom.', 'pangkat_pewawancara' => 'Rektor', 
            'tanggal' => '2025-05-20', 'dokumen_ada' => true, 
            'kesimpulan' => 'Keren Sekali, sangat menguasai bidangnya.', 'status' => 'Lulus' 
        ],
        [
            'id_wawancara' => 2, 'kode_pelamar' => 'K-123', 'nama_pelamar' => 'Rizki Apriansyah', 
            'nama_pewawancara' => 'Siti Aminah, S.Psi.', 'pangkat_pewawancara' => 'Manager HRD', 
            'tanggal' => '2025-05-21', 'dokumen_ada' => false, 
            'kesimpulan' => 'Cukup baik, perlu observasi.', 'status' => 'Pending'
        ],
        [
            'id_wawancara' => 3, 'kode_pelamar' => 'D-123', 'nama_pelamar' => 'Muhammad Azir', 
            'nama_pewawancara' => 'Prof. Budi Santoso, Ph.D.', 'pangkat_pewawancara' => 'Dekan FIKOM', 
            'tanggal' => '2025-05-22', 'dokumen_ada' => true, 
            'kesimpulan' => 'Kompetensi teknis sangat baik.', 'status' => 'Lulus' 
        ],
    ];

    private function getWawancaraData() {
        return collect(self::$staticWawancaraData)->map(fn($item) => (object)$item);
    }
    private function findWawancaraById($id) {
        return $this->getWawancaraData()->firstWhere('id_wawancara', (int)$id);
    }
    private function getJabatanOptions() {
        return ['Manager HRD', 'Kepala Divisi Terkait', 'Staff Rekrutmen Senior', 'User Interviewer', 'Rektor', 'Dekan'];
    }


    public function index(Request $request)
    {
        $allWawancaraData = $this->getWawancaraData();
        $wawancaraData = $allWawancaraData;
        if ($request->has('pelamar_kode')) {
            $wawancaraData = $allWawancaraData->where('kode_pelamar', $request->pelamar_kode);
        }
        return view('admin.wawancara.index', compact('wawancaraData'));
    }

    public function create(Request $request)
    {
        $pelamarKode = $request->query('pelamar_id');
        $jabatanOptions = $this->getJabatanOptions();
        return view('admin.wawancara.create', compact('jabatanOptions', 'pelamarKode'));
    }

    public function store(Request $request)
    {
        $pelamarKode = $request->input('pelamar_kode_terkait');
        $redirectRoute = $pelamarKode ? 
                         route('admin.wawancara.index', ['pelamar_kode' => $pelamarKode]) : 
                         route('admin.wawancara.index');

        return redirect($redirectRoute)->with('success', 'Data Wawancara berhasil ditambahkan (simulasi).');
    }

    public function edit($id_wawancara)
    {
        $wawancara = $this->findWawancaraById($id_wawancara);
        if (!$wawancara) {
            return redirect()->route('admin.wawancara.index')->with('error', 'Data wawancara tidak ditemukan.');
        }
        $pelamarKode = $wawancara->kode_pelamar; 
        $jabatanOptions = $this->getJabatanOptions();
        
        return view('admin.wawancara.edit', compact('wawancara', 'jabatanOptions', 'pelamarKode'));
    }

    public function update(Request $request, $id_wawancara)
    {
        $pelamarKode = $request->input('pelamar_kode_terkait');
        $redirectRoute = $pelamarKode ? 
                         route('admin.wawancara.index', ['pelamar_kode' => $pelamarKode]) : 
                         route('admin.wawancara.index');

        return redirect($redirectRoute)->with('success', 'Data Wawancara berhasil diupdate (simulasi).');
    }

    public function destroy($id_wawancara)
    {
        return redirect()->route('admin.wawancara.index')->with('success', 'Data Wawancara berhasil dihapus (simulasi).');
    }
}