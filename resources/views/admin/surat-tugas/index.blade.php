@extends('layouts.admin')

@section('title', 'Surat Tugas Masih Berlaku')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-text-dark">Surat Tugas Masih Berlaku</h1>
        <p class="text-sm text-text-muted">Sistem Informasi Sumber Daya Manusia</p>
    </div>

    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="bg-[#1D3F8E] text-white p-4">
            <h2 class="text-xl font-semibold">Tabel Surat Tugas</h2>
        </div>

        <div class="p-4 flex flex-col sm:flex-row justify-between items-center space-y-3 sm:space-y-0 border-b border-gray-200">
            <div class="flex flex-col sm:flex-row items-center space-y-2 sm:space-y-0 sm:space-x-3 w-full sm:w-auto">
                <div class="w-full sm:w-auto">
                    <input type="text" placeholder="Cari...." class="form-input w-full sm:w-60 rounded-md border-gray-300 shadow-sm text-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 py-2">
                </div>
                <div class="relative w-full sm:w-auto">
                    <button type="button" id="filterSuratTugasButton" class="w-full sm:w-auto bg-white hover:bg-gray-50 text-gray-700 font-medium py-2 px-4 border border-gray-300 rounded-md shadow-sm inline-flex items-center justify-center text-sm h-full">
                        <span>Filter</span>
                        <i class="fas fa-chevron-down ml-2 text-sm"></i>
                    </button>
                    <div id="filterSuratTugasMenu" class="origin-top-left absolute left-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none hidden z-50" role="menu" aria-orientation="vertical" aria-labelledby="filterSuratTugasButton">
                        <div class="py-1" role="none">
                            <a href="#" class="filter-item-st text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">Semua</a>
                            <a href="#" class="filter-item-st text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">Aktif</a>
                            <a href="#" class="filter-item-st text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">Kadaluarsa</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-3 text-center text-left text-sm font-semibold text-gray-800 uppercase tracking-wider">Kode</th>
                        <th class="px-4 py-3 text-center text-left text-sm font-semibold text-gray-800 uppercase tracking-wider">Nama</th>
                        <th class="px-4 py-3 text-center text-left text-sm font-semibold text-gray-800 uppercase tracking-wider">NIDN</th>
                        <th class="px-4 py-3 text-center text-left text-sm font-semibold text-gray-800 uppercase tracking-wider">NIK</th>
                        <th class="px-4 py-3 text-center text-left text-sm font-semibold text-gray-800 uppercase tracking-wider">No. SK</th>
                        <th class="px-4 py-3 text-center text-left text-sm font-semibold text-gray-800 uppercase tracking-wider">Tanggal SK</th>
                        <th class="px-4 py-3 text-center text-left text-sm font-semibold text-gray-800 uppercase tracking-wider min-w-[200px]">Keterangan</th>
                        <th class="px-4 py-3 text-center text-left text-sm font-semibold text-gray-800 uppercase tracking-wider">Tengat Waktu</th>
                        {{-- <th class="px-4 py-3 text-center text-sm font-semibold text-gray-800 uppercase tracking-wider">Aksi</th> --}}
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 text-sm text-gray-700">
                    @forelse ($suratTugasData ?? [] as $surat)
                    <tr>
                        <td class="px-4 py-3 text-center whitespace-nowrap">{{ $surat->kode_pegawai }}</td>
                        <td class="px-4 py-3 text-center whitespace-nowrap font-medium">{{ $surat->nama_pegawai }}</td>
                        <td class="px-4 py-3 text-center whitespace-nowrap">{{ $surat->nidn }}</td>
                        <td class="px-4 py-3 text-center whitespace-nowrap">{{ $surat->nik }}</td>
                        <td class="px-4 py-3 text-center whitespace-nowrap">{{ $surat->nomor_sk }}</td>
                        <td class="px-4 py-3 text-center whitespace-nowrap">{{ $surat->tanggal_sk }}</td>
                        <td class="px-4 py-3 text-center">{{ $surat->keterangan }}</td>
                        <td class="px-4 py-3 text-center whitespace-nowrap">{{ $surat->tengat_waktu }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="px-4 py-4 text-center text-sm text-gray-500">
                            Tidak ada data surat tugas yang masih berlaku.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 flex flex-col sm:flex-row justify-between items-center space-y-2 sm:space-y-0">
            <span class="text-sm text-gray-700">
                Menampilkan {{ $suratTugasData->count() > 0 ? '1 sampai ' . $suratTugasData->count() : '0' }} dari {{ $suratTugasData->count() }} entri
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
    const filterButton = document.getElementById('filterSuratTugasButton');
    const filterMenu = document.getElementById('filterSuratTugasMenu');

    if (filterButton && filterMenu) {
        filterButton.addEventListener('click', function (event) {
            event.stopPropagation();
            filterMenu.classList.toggle('hidden');
        });

        filterMenu.querySelectorAll('.filter-item-st').forEach(item => {
            item.addEventListener('click', function(event) {
                event.preventDefault();
                const filterValue = this.dataset.filterValue;
                console.log('Filter Surat Tugas dipilih:', filterValue);
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