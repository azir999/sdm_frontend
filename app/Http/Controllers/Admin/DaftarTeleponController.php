<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class DaftarTeleponController extends Controller
{
    private static $staticDaftarTeleponData = [
        ['id_pegawai' => 1, 'kode_pegawai' => 'D-123', 'nama_pegawai' => 'Muhammad Azir', 'jenis_kelamin' => 'Laki Laki', 'jenis_pegawai' => 'dosen', 'no_hp' => '081366170407'],
        ['id_pegawai' => 2, 'kode_pegawai' => 'K-123', 'nama_pegawai' => 'Rizki Apriansyah', 'jenis_kelamin' => 'Perempuan',  'jenis_pegawai' => 'karyawan', 'no_hp' => '081366170407'],
        ['id_pegawai' => 3, 'kode_pegawai' => 'K-789', 'nama_pegawai' => 'Rizki Femous', 'jenis_kelamin' => 'Laki Laki',  'jenis_pegawai' => 'karyawan', 'no_hp' => '081234567890'],
    ];

    private function getTeleponData()
    {
        return collect(self::$staticDaftarTeleponData)->map(function ($item) {
            return (object)$item;
        });
    }

    private function findTeleponById($id_pegawai)
    {
        return $this->getTeleponData()->firstWhere('id_pegawai', (int)$id_pegawai);
    }

    public function index(Request $request)
    {
        $daftarTeleponData = $this->getTeleponData();
        return view('admin.daftar-telepon.index', compact('daftarTeleponData'));
    }

    public function create()
    {
        $jenisKelaminOptions = ['Laki Laki', 'Perempuan'];
        return view('admin.daftar-telepon.create', compact('jenisKelaminOptions'));
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.daftar-telepon.index')->with('success', 'Data telepon baru berhasil ditambahkan (simulasi).');
    }

    public function edit($id_pegawai)
    {
        $telepon = $this->findTeleponById($id_pegawai);
        if (!$telepon) {
            return redirect()->route('admin.daftar-telepon.index')->with('error', 'Data telepon tidak ditemukan.');
        }
        
        $jenisKelaminOptions = ['Laki Laki', 'Perempuan'];
        return view('admin.daftar-telepon.edit', compact('telepon', 'jenisKelaminOptions'));
    }

    public function update(Request $request, $id_pegawai)
    {
        return redirect()->route('admin.daftar-telepon.index')->with('success', 'Data telepon berhasil diupdate (simulasi).');
    }

    public function destroy($id_pegawai)
    {

        return redirect()->route('admin.daftar-telepon.index')->with('success', 'Data telepon berhasil dihapus (simulasi).');
    }
}
