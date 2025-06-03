@extends('layouts.admin')

@section('title', 'Pengajuan Cuti')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-text-dark">Pengajuan Cuti</h1>
        <p class="text-sm text-text-muted">Sistem Informasi Sumber Daya Manusia</p>
    </div>

    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="bg-[#1D3F8E] text-white p-4">
            <h2 class="text-xl font-semibold">Tabel Cuti</h2>
        </div>

        <div class="p-4 flex flex-col sm:flex-row justify-between items-center space-y-3 sm:space-y-0 border-b border-gray-200">
            <div class="flex flex-col sm:flex-row items-center space-y-2 sm:space-y-0 sm:space-x-3 w-full sm:w-auto">
                <div class="w-full sm:w-auto">
                    <input type="text" placeholder="Cari...." class="form-input w-full sm:w-60 rounded-md border-gray-300 shadow-sm text-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 py-2">
                </div>
                <div class="relative w-full sm:w-auto">
                    <button type="button" id="filterCutiButton" class="w-full sm:w-auto bg-white hover:bg-gray-50 text-gray-700 font-medium py-2 px-4 border border-gray-300 rounded-md shadow-sm inline-flex items-center justify-center text-sm h-full">
                        <span>Filter Status</span>
                        <i class="fas fa-chevron-down ml-2 text-sm"></i>
                    </button>
                    <div id="filterCutiMenu" class="origin-top-left absolute left-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none hidden z-50" role="menu" aria-orientation="vertical" aria-labelledby="filterCutiButton">
                        <div class="py-1" role="none">
                            <a href="#" data-filter-value="semua" class="filter-item-cuti text-gray-700 block px-4 py-2 text text-sm hover:bg-gray-100" role="menuitem">Semua</a>
                            <a href="#" data-filter-value="terima" class="filter-item-cuti text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">Terima</a>
                            <a href="#" data-filter-value="tolak" class="filter-item-cuti text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">Tolak</a>
                            <a href="#" data-filter-value="pending" class="filter-item-cuti text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">Pending</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-center text-sm font-semibold text-gray-800 uppercase tracking-wider">Kode</th>
                        <th class="px-4 py-3 text-center text-sm font-semibold text-gray-800 uppercase tracking-wider">Nama</th>
                        <th class="px-4 py-3 text-center text-sm font-semibold text-gray-800 uppercase tracking-wider">Ikatan Kerja</th>
                        <th class="px-4 py-3 text-center text-sm font-semibold text-gray-800 uppercase tracking-wider">Jenis Cuti</th>
                        <th class="px-4 py-3 text-center text-sm font-semibold text-gray-800 uppercase tracking-wider">Tanggal Pengajuan</th>
                        <th class="px-4 py-3 text-center text-sm font-semibold text-gray-800 uppercase tracking-wider">Tanggal Mulai Cuti</th>
                        <th class="px-4 py-3 text-center text-sm font-semibold text-gray-800 uppercase tracking-wider">Tanggal Berakhir Cuti</th>
                        <th class="px-4 py-3 text-center text-sm font-semibold text-gray-800 uppercase tracking-wider">Validasi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 text-sm text-gray-700">
                    @forelse ($pengajuanCutiData ?? [] as $cuti)
                    <tr>
                        <td class="px-4 py-3 text-center whitespace-nowrap">{{ $cuti->kode_pegawai }}</td>
                        <td class="px-4 py-3 text-center whitespace-nowrap font-medium">{{ $cuti->nama_pegawai }}</td>
                        <td class="px-4 py-3 text-center whitespace-nowrap">{{ $cuti->ikatan_kerja }}</td>
                        <td class="px-4 py-3 text-center whitespace-nowrap">{{ $cuti->jenis_cuti }}</td>
                        <td class="px-4 py-3 text-center whitespace-nowrap">{{ $cuti->tanggal_pengajuan }}</td>
                        <td class="px-4 py-3 text-center whitespace-nowrap">{{ $cuti->tanggal_mulai }}</td>
                        <td class="px-4 py-3 text-center whitespace-nowrap">{{ $cuti->tanggal_berakhir }}</td>
                        <td class="px-4 py-3 whitespace-nowrap">
                        <div class="relative inline-block status-dropdown-container w-full min-w-[100px]">
                            <button type="button" class="status-cuti-button inline-flex justify-between items-center w-full rounded-md border shadow-sm px-3 py-1 text-sm font-medium text-white focus:outline-none
                                {{ $cuti->status_validasi == 'terima' ? 'bg-green-500 hover:bg-green-600 border-green-500' : ($cuti->status_validasi == 'tolak' ? 'bg-red-500 hover:bg-red-600 border-red-500' : 'bg-yellow-500 hover:bg-yellow-600 border-yellow-500') }}">
                                <span class="status-text-cuti">
                                    @if($cuti->status_validasi == 'terima') Terima
                                    @elseif($cuti->status_validasi == 'tolak') Tolak
                                    @else Pending @endif
                                </span>
                                <i class="fas fa-chevron-down -mr-1 ml-1 h-4 w-4"></i>
                            </button>
                            <div class="status-cuti-menu origin-top-right absolute right-0 mt-2 w-full rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none hidden z-10">
                                <div class="py-1" role="none">
                                    <a href="#" data-id-cuti="{{ $cuti->id_cuti }}" data-status="terima" class="status-cuti-item block px-4 py-2 text-xs text-gray-700 hover:bg-gray-100">Terima</a>
                                    <a href="#" data-id-cuti="{{ $cuti->id_cuti }}" data-status="tolak" class="status-cuti-item block px-4 py-2 text-xs text-gray-700 hover:bg-gray-100">Tolak</a>
                                    <a href="#" data-id-cuti="{{ $cuti->id_cuti }}" data-status="pending" class="status-cuti-item block px-4 py-2 text-xs text-gray-700 hover:bg-gray-100">Pending</a>
                                </div>
                            </div>
                        </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-4 py-4 text-center text-sm text-gray-500">
                            Tidak ada data pengajuan cuti.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 flex flex-col sm:flex-row justify-between items-center space-y-2 sm:space-y-0">
            <span class="text-sm text-gray-700">
                Menampilkan {{ $pengajuanCutiData->count() > 0 ? '1 sampai ' . $pengajuanCutiData->count() : '0' }} dari {{ $pengajuanCutiData->count() }} entri
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
    const mainFilterButton = document.getElementById('filterCutiButton');
    const mainFilterMenu = document.getElementById('filterCutiMenu');

    if (mainFilterButton && mainFilterMenu) {
        mainFilterButton.addEventListener('click', function (event) {
            event.stopPropagation();
            mainFilterMenu.classList.toggle('hidden');
        });
        mainFilterMenu.querySelectorAll('.filter-item-cuti').forEach(item => {
            item.addEventListener('click', function(event) {
                event.preventDefault();
                const filterValue = this.dataset.filterValue;
                console.log('Filter utama dipilih:', filterValue);
                mainFilterMenu.classList.add('hidden');
            });
        });
    }

    const statusDropdownContainers = document.querySelectorAll('.status-dropdown-container');
    statusDropdownContainers.forEach(container => {
        const button = container.querySelector('.status-cuti-button');
        const menu = container.querySelector('.status-cuti-menu');
        const statusTextSpan = container.querySelector('.status-text-cuti');

        if (button && menu) {
            button.addEventListener('click', function(event) {
                event.stopPropagation();
                document.querySelectorAll('.status-cuti-menu').forEach(m => {
                    if (m !== menu) m.classList.add('hidden');
                });
                menu.classList.toggle('hidden');
            });

            menu.querySelectorAll('.status-cuti-item').forEach(item => {
                item.addEventListener('click', function(event) {
                    event.preventDefault();
                    const cutiId = this.dataset.idCuti;
                    const newStatus = this.dataset.status;
                    const newText = this.textContent;
                    
                    if (statusTextSpan) {
                        statusTextSpan.textContent = newText;
                    }
                    
                    let newClasses = 'inline-flex justify-between items-center w-full rounded-md border shadow-sm px-3 py-1 text-sm font-medium text-white focus:outline-none ';
                    if (newStatus === 'terima') {
                        newClasses += 'bg-green-500 hover:bg-green-600 border-green-500';
                    } else if (newStatus === 'tolak') {
                        newClasses += 'bg-red-500 hover:bg-red-600 border-red-500';
                    } else {
                        newClasses += 'bg-yellow-500 hover:bg-yellow-600 border-yellow-500';
                    }
                    button.className = newClasses;

                    console.log('Status Cuti ID:', cutiId, 'diubah menjadi:', newStatus);
                    menu.classList.add('hidden');
                });
            });
        }
    });

    window.addEventListener('click', function (event) {
        if (mainFilterMenu && !mainFilterMenu.classList.contains('hidden') && mainFilterButton && !mainFilterButton.contains(event.target) && !mainFilterMenu.contains(event.target)) {
            mainFilterMenu.classList.add('hidden');
        }
        document.querySelectorAll('.status-cuti-menu').forEach(menu => {
            const container = menu.closest('.status-dropdown-container');
            const button = container ? container.querySelector('.status-cuti-button') : null;
             if (button && !menu.classList.contains('hidden') && !button.contains(event.target) && !menu.contains(event.target)) {
                menu.classList.add('hidden');
            }
        });
    });

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            if (mainFilterMenu && !mainFilterMenu.classList.contains('hidden')) {
                mainFilterMenu.classList.add('hidden');
            }
            document.querySelectorAll('.status-cuti-menu').forEach(menu => {
                if (!menu.classList.contains('hidden')) {
                    menu.classList.add('hidden');
                }
            });
        }
    });
});
</script>
@endpush