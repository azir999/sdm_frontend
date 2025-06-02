@extends('layouts.admin')

@section('title', 'Perekrutan Calon Pegawai')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-text-dark">Perekrutan</h1>
        <p class="text-sm text-text-muted">Sistem Informasi Sumber Daya Manusia</p>
    </div>

    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="bg-[#1D3F8E] text-white p-4">
            <h2 class="text-xl font-semibold">Tabel Perekrutan</h2>
        </div>

    
        <div class="p-4 flex flex-col sm:flex-row justify-between items-center space-y-3 sm:space-y-0 border-b border-gray-200">
            <div class="flex flex-col sm:flex-row items-center space-y-2 sm:space-y-0 sm:space-x-3 w-full sm:w-auto">
                <div class="w-full sm:w-auto">
                    <input type="text" placeholder="Cari...." class="form-input w-full sm:w-60 rounded-md border-gray-300 shadow-sm text-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 py-2">
                </div>
                <div class="relative w-full sm:w-auto">
                    <button type="button" id="filterPerekrutanButton" class="w-full sm:w-auto bg-white hover:bg-gray-50 text-gray-700 font-medium py-2 px-4 border border-gray-300 rounded-md shadow-sm inline-flex items-center justify-center text-sm h-full">
                        <span>Filter</span>
                        <i class="fas fa-chevron-down ml-2 text-sm"></i> 
                    </button>
                    <div id="filterPerekrutanMenu" class="origin-top-left absolute left-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none hidden z-50" role="menu" aria-orientation="vertical" aria-labelledby="filterPerekrutanButton">
                        <div class="py-1" role="none">
                            <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">Semua</a>
                            <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">Dosen</a>
                            <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">Karyawan</a>
                        </div>
                    </div>
                </div>
            </div>
                <div class="flex flex-wrap items-center space-x-0 sm:space-x-2 space-y-2 sm:space-y-0 w-full sm:w-auto justify-start sm:justify-end">
                <a href="{{ route('admin.pelamar.create') }}" class="w-full sm:w-auto bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-3 rounded-md shadow-sm inline-flex items-center justify-center text-sm">
                    <i class="fas fa-plus mr-2"></i>Input Data Pelamar
                </a>
                <a href="{{ route('admin.validasi.pelamar.index') }}" class="w-full sm:w-auto bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-3 rounded-md shadow-sm inline-flex items-center justify-center text-sm">
                    <i class="fas fa-check-double mr-2"></i>Data Validasi
                </a>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">ID</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Nama</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">NIDN</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Tempat Lahir</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Tanggal Lahir</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Jenis Kelamin</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Email</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Alamat</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Pendidikan Terakhir</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Usia</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Nomor HP</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">IPK</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Bidang Ilmu Kompetensi</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Pilihan Lamaran</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Tanggal Lamaran</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Dokumen</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 text-sm text-gray-600">
                    @forelse ($daftarPelamar ?? [] as $key => $pelamar)
                    <tr>
                        <td class="px-3 py-3 text-center whitespace-nowrap">{{ $pelamar->kode }}</td>
                        <td class="px-3 py-3 text-left whitespace-nowrap font-medium text-gray-900">{{ $pelamar->nama }}</td>
                        <td class="px-3 py-3 text-center whitespace-nowrap">{{ $pelamar->nidn }}</td>
                        <td class="px-3 py-3 text-center whitespace-nowrap">{{ $pelamar->tempat_lahir }}</td>
                        <td class="px-3 py-3 text-center whitespace-nowrap">{{ $pelamar->tanggal_lahir }}</td>
                        <td class="px-3 py-3 text-center whitespace-nowrap">{{ $pelamar->jenis_kelamin }}</td>
                        <td class="px-3 py-3 text-left whitespace-nowrap">{{ $pelamar->email }}</td>
                        <td class="px-3 py-3 text-left whitespace-nowrap">{{ $pelamar->alamat }}</td>
                        <td class="px-3 py-3 text-center whitespace-nowrap">{{ $pelamar->pendidikan_terakhir }}</td>
                        <td class="px-3 py-3 text-center whitespace-nowrap">{{ $pelamar->usia }}</td>
                        <td class="px-3 py-3 text-center whitespace-nowrap">{{ $pelamar->nomor_hp }}</td>
                        <td class="px-3 py-3 text-center whitespace-nowrap">{{ $pelamar->ipk }}</td>
                        <td class="px-3 py-3 text-left whitespace-nowrap">{{ $pelamar->bidang_ilmu }}</td>
                        <td class="px-3 py-3 text-center whitespace-nowrap">{{ $pelamar->pilihan_lamaran }}</td>
                        <td class="px-3 py-3 text-center whitespace-nowrap">{{ $pelamar->tanggal_lamaran }}</td>
                        <td class="px-3 py-3 text-center whitespace-nowrap">
                            <a href="{{ $pelamar->dokumen_url ?? '#' }}" class="text-green-600 hover:text-green-800 transition-colors duration-150 text-lg" title="Lihat Dokumen Lamaran">
                                <i class="fas fa-file-alt"></i>
                            </a>
                        </td>
                        <td class="px-3 py-3 text-center whitespace-nowrap">
                            <div class="inline-flex items-center space-x-2">
                                <a href="{{ route('admin.pelamar.edit', ['id' => $pelamar->id_unik_dummy]) }}" class="text-blue-600 hover:text-blue-800 transition-colors duration-150 text-lg" title="Edit Data Pelamar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.pelamar.destroy', ['id' => $pelamar->id_unik_dummy]) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data pelamar ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 transition-colors duration-150 text-lg" title="Hapus Data Pelamar">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="17" class="text-center py-4">Tidak ada data perekrutan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 flex flex-col sm:flex-row justify-between items-center space-y-2 sm:space-y-0">
            <span class="text-sm text-gray-700">
                Menampilkan {{ $daftarPelamar->count() > 0 ? '1 sampai ' . $daftarPelamar->count() : '0' }} dari {{ $daftarPelamar->count() }} entri
            </span>
            <div class="inline-flex -space-x-px rounded-md shadow-sm">
                <button class="py-1 px-2 sm:py-3 sm:px-3 leading-tight text-sm text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 rounded-l-lg">Sebelumnya</button>
                <button class="py-1 px-2 sm:py-3 sm:px-3 leading-tight text-sm text-blue-600 bg-blue-50 border border-gray-300 hover:bg-blue-100 hover:text-blue-700">1</button>
                <button class="py-1 px-2 sm:py-3 sm:px-3 leading-tight text-sm text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">2</button>
                <button class="py-1 px-2 sm:py-3 sm:px-3 leading-tight text-sm text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 rounded-r-lg">Berikutnya</button>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const filterButton = document.getElementById('filterPerekrutanButton');
    const filterMenu = document.getElementById('filterPerekrutanMenu');

    if (filterButton && filterMenu) {
        filterButton.addEventListener('click', function (event) {
            event.stopPropagation();
            filterMenu.classList.toggle('hidden');
        });

        window.addEventListener('click', function (event) {
            if (filterMenu && !filterMenu.classList.contains('hidden') && !filterButton.contains(event.target) && !filterMenu.contains(event.target)) {
                filterMenu.classList.add('hidden');
            }
        });
        document.addEventListener('keydown', function (event) {
            if (filterMenu && event.key === 'Escape' && !filterMenu.classList.contains('hidden')) {
                filterMenu.classList.add('hidden');
            }
        });
    }
});
</script>
@endpush