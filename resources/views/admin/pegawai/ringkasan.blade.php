@extends('layouts.admin')

@section('title', 'Ringkasan Jumlah Pegawai')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.dashboard') }}" 
       class="inline-flex items-center px-4 py-2 bg-white hover:bg-gray-100 text-gray-700 text-sm font-medium rounded-md shadow-sm border border-gray-300 transition-colors duration-150 ease-in-out">
        <i class="fas fa-arrow-left mr-2"></i>
        Kembali ke Dashboard
    </a>
</div>

<div class="bg-white p-0 shadow-lg rounded-lg overflow-hidden">
    <div class="bg-[#1D3F8E] text-white p-4">
        <h2 class="text-xl font-semibold">Tabel Ringkasan Jumlah Pegawai</h2>
    </div>

    <div class="p-4 flex flex-col sm:flex-row justify-between items-center space-y-2 sm:space-y-0 sm:space-x-2 border-b border-gray-200">
        <div class="w-full sm:w-auto">
            <input type="text" placeholder="Cari...." class="form-input w-full sm:w-64 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        </div>
        <div class="w-full sm:w-auto">
            <div class="relative inline-block text-left w-full sm:w-auto">
                <div>
                    <button type="button" id="filterDropdownButton" class="w-full sm:w-auto bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-2 px-4 rounded-md inline-flex items-center justify-center border border-gray-300 shadow-sm" aria-expanded="true" aria-haspopup="true">
                        <span id="filterButtonText">Filter</span>
                        <i class="fas fa-chevron-down ml-2"></i>
                    </button>
                </div>

                <div id="filterDropdownMenu" class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none hidden z-50" role="menu" aria-orientation="vertical" aria-labelledby="filterDropdownButton">
                    <div class="py-1" role="none">
                        <a href="#" data-filter-value="semua" class="filter-item text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100 hover:text-gray-900" role="menuitem" tabindex="-1" id="menu-item-0">Semua</a>
                        <a href="#" data-filter-value="dosen" class="filter-item text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100 hover:text-gray-900" role="menuitem" tabindex="-1" id="menu-item-1">Dosen</a>
                        <a href="#" data-filter-value="karyawan" class="filter-item text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100 hover:text-gray-900" role="menuitem" tabindex="-1" id="menu-item-2">Karyawan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr class="bg-gray-100">
                    <th scope="col" class="px-6 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">
                        Dosen/Karyawan
                    </th>
                    <th scope="col" class="px-6 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">
                        Laki-Laki
                    </th>
                    <th scope="col" class="px-6 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">
                        Perempuan
                    </th>
                    <th scope="col" class="px-6 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">
                        Jumlah
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-900">
                        Dosen
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                        {{ $dataRingkasan['dosen']['laki_laki'] ?? '0' }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                        {{ $dataRingkasan['dosen']['perempuan'] ?? '0' }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                        {{ $dataRingkasan['dosen']['jumlah'] ?? '0' }}
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-900">
                        Karyawan
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                        {{ $dataRingkasan['karyawan']['laki_laki'] ?? '0' }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                        {{ $dataRingkasan['karyawan']['perempuan'] ?? '0' }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                        {{ $dataRingkasan['karyawan']['jumlah'] ?? '0' }}
                    </td>
                </tr>
                <tr class="bg-gray-50 font-semibold">
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-700">
                        Total Keseluruhan
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-700">
                        {{ $totalLakiLaki ?? '0' }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-700">
                        {{ $totalPerempuan ?? '0' }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-700">
                        {{ $totalPegawaiKeseluruhan ?? '0' }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const filterButton = document.getElementById('filterDropdownButton');
    const filterMenu = document.getElementById('filterDropdownMenu');
    const filterButtonText = document.getElementById('filterButtonText');
    const filterItems = document.querySelectorAll('.filter-item');

    if (filterButton && filterMenu) {
        filterButton.addEventListener('click', function (event) {
            event.stopPropagation(); 
            filterMenu.classList.toggle('hidden');
        });

        filterItems.forEach(item => {
            item.addEventListener('click', function (event) {
                event.preventDefault(); 

                const selectedValue = this.dataset.filterValue;
                const selectedText = this.textContent;

                if (filterButtonText) {
                    filterButtonText.textContent = selectedText;
                }

                console.log('Filter dipilih:', selectedValue); 

                filterMenu.classList.add('hidden'); 
            });
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