@extends('layouts.admin')

@section('title', 'Daftar Telepon')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-text-dark">Daftar Telepon</h1>
        <p class="text-sm text-text-muted">Sistem Informasi Sumber Daya Manusia</p>
    </div>
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="bg-[#1D3F8E] text-white p-4">
            <h2 class="text-xl font-semibold">Tabel Daftar Telepon</h2>
        </div>

        <div class="p-4 flex flex-col sm:flex-row justify-between items-center space-y-3 sm:space-y-0 border-b border-gray-200">
            <div class="flex flex-col sm:flex-row items-center space-y-2 sm:space-y-0 sm:space-x-3 w-full sm:w-auto">
                <div class="w-full sm:w-auto">
                    <input type="text" placeholder="Cari...." class="form-input w-full sm:w-60 rounded-md border-gray-300 shadow-sm text-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 py-2">
                </div>
                <div class="relative w-full sm:w-auto">
                    <button type="button" id="filterTeleponButton" class="w-full sm:w-auto bg-white hover:bg-gray-50 text-gray-700 font-medium py-2 px-4 border border-gray-300 rounded-md shadow-sm inline-flex items-center justify-center text-sm h-full">
                        <span>Filter</span>
                        <i class="fas fa-chevron-down ml-2 text-xs"></i>
                    </button>
                    <div id="filterTeleponMenu" class="origin-top-left absolute left-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none hidden z-50" role="menu" aria-orientation="vertical" aria-labelledby="filterTeleponButton">
                        <div class="py-1" role="none">
                            <a href="#" data-filter-value="semua" class="filter-item-telepon text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">Semua</a>
                            <a href="#" data-filter-value="laki-laki" class="filter-item-telepon text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">Laki-Laki</a>
                            <a href="#" data-filter-value="perempuan" class="filter-item-telepon text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">Perempuan</a>
                            <a href="#" data-filter-value="dosen" class="filter-item-telepon text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">Pegawai</a>
                            <a href="#" data-filter-value="karyawan" class="filter-item-telepon text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">Karyawan</a>
                            </div>
                    </div>
                </div>
            </div>
            <div class="w-full sm:w-auto">
                <a href="{{ route('admin.daftar-telepon.create') }}" class="w-full sm:w-auto bg-green-500 hover:bg-green-600 text-white font-medium py-2 px-3 rounded-md shadow-sm inline-flex items-center justify-center text-">
                    <i class="fas fa-plus mr-2"></i> Tambah Data Telepon
                </a>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-3 text-center text-sm font-semibold text-gray-800 uppercase tracking-wider">Kode</th>
                        <th class="px-4 py-3 text-center text-sm font-semibold text-gray-800 uppercase tracking-wider">Nama</th>
                        <th class="px-4 py-3 text-center text-sm font-semibold text-gray-800 uppercase tracking-wider">Jenis Kelamin</th>
                        <th class="px-4 py-3 text-center text-sm font-semibold text-gray-800 uppercase tracking-wider">Jenis Pegawai</th>
                        <th class="px-4 py-3 text-center text-sm font-semibold text-gray-800 uppercase tracking-wider">No Hp</th>
                        <th class="px-4 py-3 text-center text-sm font-semibold text-gray-800 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 text-sm text-gray-700">
                    @forelse ($daftarTeleponData ?? [] as $telepon)
                    <tr>
                        <td class="px-4 py-3 whitespace-nowrap text-center">{{ $telepon->kode_pegawai }}</td>
                        <td class="px-4 py-3 whitespace-nowrap text-center font-medium">{{ $telepon->nama_pegawai }}</td>
                        <td class="px-4 py-3 whitespace-nowrap text-center">{{ $telepon->jenis_kelamin }}</td>
                        <td class="px-4 py-3 whitespace-nowrap text-center">{{ $telepon->jenis_pegawai ?? '-' }}</td>
                        <td class="px-4 py-3 whitespace-nowrap text-center">{{ $telepon->no_hp }}</td>
                        <td class="px-4 py-3 whitespace-nowrap text-center">
                            <div class="inline-flex items-center space-x-2">
                                <a href="{{ route('admin.daftar-telepon.edit', ['id_pegawai' => $telepon->id_pegawai]) }}" class="text-blue-600 hover:text-blue-800" title="Edit Nomor Telepon">
                                    <i class="fas fa-edit text-lg"></i>
                                </a>
                                <form action="{{ route('admin.daftar-telepon.destroy', ['id_pegawai' => $telepon->id_pegawai]) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data telepon ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800" title="Hapus Nomor Telepon">
                                        <i class="fas fa-trash-alt text-lg"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-4 py-4 text-center text-sm text-gray-500">
                            Tidak ada data telepon yang ditemukan.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 flex flex-col sm:flex-row justify-between items-center space-y-2 sm:space-y-0">
            <span class="text-sm text-gray-700">
                Menampilkan {{ $daftarTeleponData->count() > 0 ? '1 sampai ' . $daftarTeleponData->count() : '0' }} dari {{ $daftarTeleponData->count() }} entri
            </span>
            <div class="inline-flex -space-x-px rounded-md shadow-sm">
                <button class="py-1 px-2 sm:py-2 sm:px-3 leading-tight text-sm text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 rounded-l-lg">Sebelumnya</button>
                <button class="py-1 px-2 sm:py-2 sm:px-3 leading-tight text-sm text-blue-600 bg-blue-50 border border-gray-300 hover:bg-blue-100 hover:text-blue-700">1</button>
                <button class="py-1 px-2 sm:py-2 sm:px-3 leading-tight text-sm text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 rounded-r-lg">Berikutnya</button>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const filterButton = document.getElementById('filterTeleponButton');
    const filterMenu = document.getElementById('filterTeleponMenu');

    if (filterButton && filterMenu) {
        filterButton.addEventListener('click', function (event) {
            event.stopPropagation();
            filterMenu.classList.toggle('hidden');
        });

        filterMenu.querySelectorAll('.filter-item-telepon').forEach(item => {
            item.addEventListener('click', function(event) {
                event.preventDefault();
                const filterValue = this.dataset.filterValue;
                console.log('Filter Daftar Telepon dipilih:', filterValue);
                filterMenu.classList.add('hidden');
            });
        });
    }

    window.addEventListener('click', function (event) {
        if (filterMenu && !filterMenu.classList.contains('hidden') && filterButton && !filterButton.contains(event.target) && !filterMenu.contains(event.target)) {
            filterMenu.classList.add('hidden');
        }
    });

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            if (filterMenu && !filterMenu.classList.contains('hidden')) {
                filterMenu.classList.add('hidden');
            }
        }
    });
});
</script>
@endpush