<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class PsikologiController extends Controller
{
    private static $staticPsikologiData = [
        ['id_psikologi' => 1, 'kode_pelamar' => 'D-123', 'nama_pelamar' => 'Muhammad Azir', 'tanggal_tes' => '2025-05-20', 'dokumen_ada' => true, 'kesimpulan' => 'Potensi kepemimpinan tinggi.', 'status' => 'Lulus'],
        ['id_psikologi' => 2, 'kode_pelamar' => 'K-123', 'nama_pelamar' => 'Rizki Apriansyah', 'tanggal_tes' => '2025-05-21', 'dokumen_ada' => true, 'kesimpulan' => 'Hasil standar, tidak ada red flag.', 'status' => 'Lulus'],
        ['id_psikologi' => 3, 'kode_pelamar' => 'X-789', 'nama_pelamar' => 'Budi Cahyono', 'tanggal_tes' => '2025-05-22', 'dokumen_ada' => false, 'kesimpulan' => 'Tidak mengikuti tes.', 'status' => 'Tidak Lulus'],
    ];

    private function getPsikologiData() {
        if (!session()->has('psikologi_data_dummy')) {
            session(['psikologi_data_dummy' => self::$staticPsikologiData]);
        }
        return collect(session('psikologi_data_dummy'))->map(fn($item) => (object)$item);
    }

    private function findPsikologiById($id) {
        return $this->getPsikologiData()->firstWhere('id_psikologi', (int)$id);
    }

    private function getStatusOptions() {
        return ['Lulus', 'Tidak Lulus', 'Pending'];
    }

    public function index(Request $request)
    {
        $allPsikologiData = $this->getPsikologiData();
        $psikologiData = $allPsikologiData;

        if ($request->has('pelamar_kode')) {
            $psikologiData = $allPsikologiData->where('kode_pelamar', $request->pelamar_kode);
        }
        return view('admin.psikologi.index', compact('psikologiData'));
    }

    public function create(Request $request)
    {
        $pelamarKode = $request->query('pelamar_id'); 
        $statusOptions = $this->getStatusOptions();
        return view('admin.psikologi.create', compact('pelamarKode', 'statusOptions'));
    }

    public function store(Request $request)
    {
        $currentData = session('psikologi_data_dummy', []);
        $newId = count($currentData) > 0 ? max(array_column($currentData, 'id_psikologi')) + 1 : 1;
        
        $newData = [
            'id_psikologi' => $newId,
            'kode_pelamar' => $request->input('pelamar_kode_terkait', 'PSIK-' . $newId), 
            'nama_pelamar' => $request->input('nama_pelamar_input', 'Pelamar Tes Psikologi ' . $newId), 
            'dokumen_ada' => $request->hasFile('dokumen_tes'),
            'kesimpulan' => $request->input('kesimpulan'),
            'status' => $request->input('status_tes')
        ];
        $currentData[] = $newData;
        session(['psikologi_data_dummy' => $currentData]);
        
        $pelamarKodeRedirect = $request->input('pelamar_kode_terkait');
        $redirectUrl = $pelamarKodeRedirect ? 
                       route('admin.psikologi.index', ['pelamar_kode' => $pelamarKodeRedirect]) : 
                       route('admin.psikologi.index');

        return redirect($redirectUrl)->with('success', 'Data Tes Psikologi berhasil ditambahkan.');
    }

    public function edit($id_psikologi)
    {
        $psikologi = $this->findPsikologiById($id_psikologi);
        if (!$psikologi) {
            return redirect()->route('admin.psikologi.index')->with('error', 'Data tes psikologi tidak ditemukan.');
        }
        
        $pelamarKode = $psikologi->kode_pelamar; 
        $statusOptions = $this->getStatusOptions();

        return view('admin.psikologi.edit', compact('psikologi', 'pelamarKode', 'statusOptions'));
    }

    public function update(Request $request, $id_psikologi)
    {

        $pelamarKodeRedirect = $request->input('pelamar_kode_terkait');
        $redirectUrl = $pelamarKodeRedirect ? 
                       route('admin.psikologi.index', ['pelamar_kode' => $pelamarKodeRedirect]) : 
                       route('admin.psikologi.index');

        return redirect($redirectUrl)->with('success', 'Data Tes Psikologi berhasil diupdate.');
    }

    public function destroy($id_psikologi)
    {
        return redirect()->route('admin.psikologi.index')->with('success', 'Data Tes Psikologi berhasil dihapus (simulasi).');
    }
}