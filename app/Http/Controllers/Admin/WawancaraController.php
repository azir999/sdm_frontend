<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
class WawancaraController extends Controller
{
    private function getJabatanOptions()
    {
        return [
            'Manager HRD',
            'Kepala Divisi Terkait',
            'Staff Rekrutmen Senior',
            'User Interviewer',
            'Rektor',
            'Dekan'
        ];
    }

    public function index(Request $request)
    {
        $allWawancaraData = collect([
            (object)[
                'id_wawancara' => 1,
                'kode_pelamar' => 'D-123', 
                'nama_pelamar' => 'Muhammad Azir', 
                'nama_pewawancara' => 'Dr. Hidayat Aman, M.Kom.', 
                'pangkat_pewawancara' => 'Rektor', 
                'tanggal' => '20 Mei 2025', 
                'dokumen_ada' => true, 
                'kesimpulan' => 'Keren Sekali, sangat menguasai bidangnya dan memiliki visi yang jelas.', 
                'status' => 'Direkomendasikan' 
            ],
            (object)[
                'id_wawancara' => 2,
                'kode_pelamar' => 'K-123', 
                'nama_pelamar' => 'Rizki Apriansyah', 
                'nama_pewawancara' => 'Siti Aminah, S.Psi.', 
                'pangkat_pewawancara' => 'Manager HRD', 
                'tanggal' => '21 Mei 2025', 
                'dokumen_ada' => false, 
                'kesimpulan' => 'Cukup baik, perlu observasi lebih lanjut mengenai pengalaman praktis.', 
                'status' => 'Tidak Direkomendasikan'
            ],
             (object)[
                'id_wawancara' => 3,
                'kode_pelamar' => 'D-123', 
                'nama_pelamar' => 'Muhammad Azir', 
                'nama_pewawancara' => 'Prof. Budi Santoso, Ph.D.', 
                'pangkat_pewawancara' => 'Dekan FIKOM', 
                'tanggal' => '22 Mei 2025', 
                'dokumen_ada' => true, 
                'kesimpulan' => 'Kompetensi teknis sangat baik, cocok untuk posisi dosen senior.', 
                'status' => 'Direkomendasikan' 
            ],
        ]);

        $wawancaraData = $allWawancaraData;
        if ($request->has('pelamar_kode')) {
            $wawancaraData = $allWawancaraData->where('kode_pelamar', $request->pelamar_kode);
        }

        return view('admin.wawancara.index', compact('wawancaraData'));
    }

    public function create(Request $request)
    {
        $pelamarId = $request->query('pelamar_id');
        $jabatanOptions = $this->getJabatanOptions();
        return view('admin.wawancara.create', compact('jabatanOptions', 'pelamarId'));
    }

    public function edit($id_wawancara)
    {
        $wawancara = (object) [
            'id_wawancara' => $id_wawancara,
            'kode_pelamar_terkait' => 'D-123',
            'jabatan_pewawancara' => 'Rektor',
            'nama_pewawancara' => 'Dr. Hidayat Aman, M.Kom. (Edit)',
            'tanggal_wawancara' => '2025-05-20', 
            'kesimpulan_wawancara' => 'Kesimpulan lama yang akan diedit.',
            'rekomendasi_wawancara' => 'rekomendasikan'
        ];
        
        $jabatanOptions = $this->getJabatanOptions();

        return view('admin.wawancara.edit', compact('wawancara', 'jabatanOptions'));
    }

    public function update(Request $request, $id_wawancara)
    {
        return redirect()->route('admin.wawancara.index')->with('success', 'Data wawancara berhasil diupdate (simulasi).');
    }

    public function destroy($id_wawancara)
    {
        return redirect()->route('admin.wawancara.index')->with('success', 'Data wawancara berhasil dihapus (simulasi).');
    }
}