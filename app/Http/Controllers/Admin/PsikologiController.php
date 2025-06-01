<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class PsikologiController extends Controller
{
    public function create(Request $request)
    {
        $pelamarId = $request->query('pelamar_id');
        return view('admin.psikologi.create', compact('pelamarId'));
    }

    public function index(Request $request)
    {
        $allPsikologiData = collect([
            (object)[
                'id_psikologi' => 1, 
                'kode_pelamar' => 'D-123', 
                'nama_pelamar' => 'Muhammad Azir', 
                'tanggal' => '20 Mei 2025', 
                'dokumen_ada' => true, 
                'kesimpulan' => 'Keren Sekali, potensi kepemimpinan tinggi.', 
                'status' => 'Lulus' 
            ],
            (object)[
                'id_psikologi' => 2,
                'kode_pelamar' => 'K-123', 
                'nama_pelamar' => 'Rizki Apriansyah', 
                'tanggal' => '21 Mei 2025', 
                'dokumen_ada' => true, 
                'kesimpulan' => 'Hasil standar, tidak ada red flag signifikan.', 
                'status' => 'Lulus'
            ],
            (object)[ 
                'id_psikologi' => 3,
                'kode_pelamar' => 'X-789', 
                'nama_pelamar' => 'Budi Cahyono', 
                'tanggal' => '22 Mei 2025', 
                'dokumen_ada' => false, 
                'kesimpulan' => 'Tidak mengikuti tes sesuai jadwal.', 
                'status' => 'Tidak Lulus' 
            ],
        ]);

        $psikologiData = $allPsikologiData;

        if ($request->has('pelamar_kode')) {
            $psikologiData = $allPsikologiData->where('kode_pelamar', $request->pelamar_kode);
        }

        return view('admin.psikologi.index', compact('psikologiData'));
    }

    public function edit($id_psikologi)
    {
        $psikologi = (object) [
            'id_psikologi' => $id_psikologi,
            'kode_pelamar_terkait' => 'D-123',
            'tanggal_tes' => '2025-05-20',
            'kesimpulan' => 'Kesimpulan lama dari tes psikologi yang akan diedit.',
            'rekomendasi' => 'rekomendasikan'
        ];
        
    
        return view('admin.psikologi.edit', compact('psikologi'));
    }

    public function update(Request $request, $id_psikologi)
    {

        return redirect()->route('admin.psikologi.index')->with('success', 'Data Tes Psikologi berhasil diupdate (simulasi).');
    }


    public function destroy($id_psikologi)
    {
        return redirect()->route('admin.psikologi.index')->with('success', 'Data Tes Psikologi berhasil dihapus (simulasi).');
    }
}