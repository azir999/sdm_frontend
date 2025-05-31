@extends('layouts.admin')

@section('title', 'Data Validasi Pelamar')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-text-dark">Data Validasi</h1>
        <p class="text-sm text-text-muted">Sistem Informasi Sumber Daya Manusia</p>
    </div>

    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="bg-[#1D3F8E] text-white p-4">
            <h2 class="text-xl font-semibold">Tabel Data Validasi</h2>
        </div>

        <div class="p-4 flex flex-col sm:flex-row justify-between items-center space-y-3 sm:space-y-0 border-b border-gray-200">
            <div class="flex flex-col sm:flex-row items-center space-y-2 sm:space-y-0 sm:space-x-3 w-full sm:w-auto">
                <div class="w-full sm:w-auto">
                    <input type="text" placeholder="Cari...." class="form-input w-full sm:w-60 rounded-md border-gray-300 shadow-sm text-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 py-2">
                </div>
                <div class="relative w-full sm:w-auto">
                    <button type="button" id="filterValidasiButton" class="w-full sm:w-auto bg-white hover:bg-gray-50 text-gray-700 font-medium py-2 px-4 border border-gray-300 rounded-md shadow-sm inline-flex items-center justify-center text-sm h-full">
                        <span>Filter</span>
                        <i class="fas fa-chevron-down ml-2 text-sm"></i>
                    </button>
                    <div id="filterValidasiMenu" class="origin-top-left absolute left-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none hidden z-50" role="menu" aria-orientation="vertical" aria-labelledby="filterValidasiButton">
                        <div class="py-1" role="none">
                            <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">Semua</a>
                            <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">Terima</a>
                            <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">Tolak</a>
                            <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">Pending</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap items-center space-x-0 sm:space-x-2 space-y-2 sm:space-y-0 w-full sm:w-auto justify-start sm:justify-end">
                <a href="{{ route('admin.pelamar.create') }}" class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-3 rounded-md shadow-sm inline-flex items-center justify-center text-sm">
                    Input Data Pelamar
                </a>
                <a href="{{ route('admin.wawancara.create') }}" class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-3 rounded-md shadow-sm inline-flex items-center justify-center text-sm">
                    Input Data Wawancara
                </a>
                <a href="{{ route('admin.psikologi.create') }}" class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-3 rounded-md shadow-sm inline-flex items-center justify-center text-sm">
                    Input Data Psikologi
                </a>
                <button class="w-full sm:w-auto bg-red-500 hover:bg-red-600 text-white font-medium py-2 px-3 rounded-md shadow-sm inline-flex items-center justify-center text-sm opacity-50 cursor-not-allowed" disabled>
                    Data Validasi
                </button>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Kode</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Nama</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">NIDN</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Tempat Lahir</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Tanggal Lahir</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Jenis Kelamin</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Email</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider ">Alamat</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Pendidikan Terakhir</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Usia</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">IPK</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider ">Bidang Ilmu Kompetensi</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Nomor HP</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Pilihan Lamaran</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Tanggal Lamaran</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-800 uppercase tracking-wider">Wawancara</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-800 uppercase tracking-wider">Tes Psikologi</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Status</th>
                        <th class="px-3 py-3 text-center text-sm font-semibold text-gray-800 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 text-sm text-gray-600">
                    @forelse ($pelamarData ?? [] as $pelamar)
                    <tr>
                        <td class="px-3 py-3 text-center text-sm whitespace-nowrap">{{ $pelamar->kode }}</td>
                        <td class="px-3 py-3 text-center text-sm whitespace-nowrap">{{ $pelamar->nama }}</td>
                        <td class="px-3 py-3 text-center text-sm whitespace-nowrap">{{ $pelamar->nidn }}</td>
                        <td class="px-3 py-3 text-center text-sm whitespace-nowrap">{{ $pelamar->tempat_lahir }}</td>
                        <td class="px-3 py-3 text-center text-sm whitespace-nowrap">{{ $pelamar->tanggal_lahir }}</td>
                        <td class="px-3 py-3 text-center text-sm whitespace-nowrap">{{ $pelamar->jenis_kelamin }}</td>
                        <td class="px-3 py-3 text-center text-sm whitespace-nowrap">{{ $pelamar->email }}</td>
                        <td class="px-3 py-3 text-center text-sm whitespace-nowrap">{{ $pelamar->alamat }}</td>
                        <td class="px-3 py-3 text-center text-sm whitespace-nowrap">{{ $pelamar->pendidikan_terakhir }}</td>
                        <td class="px-3 py-3 text-center text-sm whitespace-nowrap">{{ $pelamar->usia }}</td>
                        <td class="px-3 py-3 text-center text-sm whitespace-nowrap">{{ $pelamar->ipk }}</td>
                        <td class="px-3 py-3 text-center text-sm whitespace-nowrap">{{ $pelamar->bidang_ilmu }}</td>
                        <td class="px-3 py-3 text-center text-sm whitespace-nowrap">{{ $pelamar->nomor_hp }}</td>
                        <td class="px-3 py-3 text-center text-sm whitespace-nowrap">{{ $pelamar->pilihan_lamaran }}</td>
                        <td class="px-3 py-3 text-center text-sm whitespace-nowrap">{{ $pelamar->tanggal_lamaran }}</td>
                        <td class="px-3 py-3 text-center text-sm whitespace-nowrap">
                            <i class="fas {{ $pelamar->wawancara_status ? 'fas fa-file-alt text-blue-600 text-2xl hover:text-blue-800 transition-colors duration-150' : 'fa-times-circle text-2xl text-red-500' }}" title="{{ $pelamar->wawancara_status ? 'Sudah Wawancara' : 'Belum Wawancara' }}"></i>
                        </td>
                        <td class="px-3 py-3 text-center text-sm whitespace-nowrap">
                            <i class="fas {{ $pelamar->psikologi_status ? 'fas fa-file-alt text-blue-600 text-2xl hover:text-blue-800 transition-colors duration-150' : 'fa-times-circle text-2xl text-red-500' }}" title="{{ $pelamar->psikologi_status ? 'Sudah Tes Psikologi' : 'Belum Tes Psikologi' }}"></i>
                        </td>
                        <td class="px-3 py-3 text-center text-sm whitespace-nowrap">
                            <div class="relative inline-block text-left status-dropdown-container w-full">
                                <button type="button" class="status-dropdown-button inline-flex justify-between items-center w-full rounded-md border shadow-sm px-3 py-1 text-sm font-medium text-white focus:outline-none
                                    {{ $pelamar->status_validasi == 'terima' ? 'bg-green-500 hover:bg-green-600 border-green-500' : ($pelamar->status_validasi == 'tolak' ? 'bg-red-500 hover:bg-red-600 border-red-500' : 'bg-yellow-500 hover:bg-yellow-600 border-yellow-500') }}">
                                    <span class="status-text">
                                        @if($pelamar->status_validasi == 'terima') Terima
                                        @elseif($pelamar->status_validasi == 'tolak') Tolak
                                        @else Pending @endif
                                    </span>
                                    <i class="fas fa-chevron-down -mr-1 ml-1 h-4 w-4"></i>
                                </button>
                                <div class="status-dropdown-menu origin-top-right absolute right-0 mt-2 w-full rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none hidden z-10">
                                    <div class="py-1" role="none">
                                        <a href="#" data-status="terima" class="status-item block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Terima</a>
                                        <a href="#" data-status="tolak" class="status-item block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Tolak</a>
                                        <a href="#" data-status="pending" class="status-item block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Pending</a>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-3 py-3 text-center text-sm whitespace-nowrap">
                            <button class="text-blue-600 text-2xl hover:text-blue-800 transition-colors duration-150" title="Edit Data Validasi"><i class="fas fa-edit"></i></button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="19" class="px-3 py-4 text-center text-sm text-gray-500">
                            Tidak ada data pelamar untuk divalidasi.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 flex flex-col sm:flex-row justify-between items-center space-y-2 sm:space-y-0">
            <span class="text-sm text-gray-700">
                Menampilkan 1 dari 2
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
    // Script untuk filter dropdown utama (jika ada lebih dari satu filter)
    const mainFilterButton = document.getElementById('filterValidasiButton');
    const mainFilterMenu = document.getElementById('filterValidasiMenu');

    if (mainFilterButton && mainFilterMenu) {
        mainFilterButton.addEventListener('click', function (event) {
            event.stopPropagation();
            mainFilterMenu.classList.toggle('hidden');
        });
    }

    // Script untuk dropdown status di setiap baris tabel
    const statusDropdownContainers = document.querySelectorAll('.status-dropdown-container');
    statusDropdownContainers.forEach(container => {
        const button = container.querySelector('.status-dropdown-button');
        const menu = container.querySelector('.status-dropdown-menu');
        const statusTextSpan = container.querySelector('.status-text');

        if (button && menu) {
            button.addEventListener('click', function(event) {
                event.stopPropagation();
                // Sembunyikan semua menu status lain yang mungkin terbuka
                document.querySelectorAll('.status-dropdown-menu').forEach(m => {
                    if (m !== menu) m.classList.add('hidden');
                });
                menu.classList.toggle('hidden');
            });

            menu.querySelectorAll('.status-item').forEach(item => {
                item.addEventListener('click', function(event) {
                    event.preventDefault();
                    const newStatus = this.dataset.status;
                    const newText = this.textContent;
                    
                    // Update tampilan tombol
                    statusTextSpan.textContent = newText;
                    button.className = button.className.replace(/bg-(green|red|yellow)-500/, `bg-${newStatus === 'terima' ? 'green' : (newStatus === 'tolak' ? 'red' : 'yellow')}-500`)
                                             .replace(/hover:bg-(green|red|yellow)-600/, `hover:bg-${newStatus === 'terima' ? 'green' : (newStatus === 'tolak' ? 'red' : 'yellow')}-600`)
                                             .replace(/border-(green|red|yellow)-500/, `border-${newStatus === 'terima' ? 'green' : (newStatus === 'tolak' ? 'red' : 'yellow')}-500`);

                    console.log('Status diubah menjadi:', newStatus, 'untuk pelamar:', container.closest('tr').querySelector('td:nth-child(2)').textContent);
                    // Di sini Anda akan menambahkan logika AJAX untuk menyimpan perubahan status ke server
                    menu.classList.add('hidden');
                });
            });
        }
    });

    // Sembunyikan semua dropdown jika diklik di luar
    window.addEventListener('click', function (event) {
        if (mainFilterMenu && !mainFilterMenu.classList.contains('hidden') && mainFilterButton && !mainFilterButton.contains(event.target) && !mainFilterMenu.contains(event.target)) {
            mainFilterMenu.classList.add('hidden');
        }
        document.querySelectorAll('.status-dropdown-menu').forEach(menu => {
            const button = menu.previousElementSibling; // Asumsi tombol adalah sibling sebelumnya
             if (!menu.classList.contains('hidden') && button && !button.contains(event.target) && !menu.contains(event.target)) {
                menu.classList.add('hidden');
            }
        });
    });

    // Sembunyikan semua dropdown jika tombol Escape ditekan
    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            if (mainFilterMenu && !mainFilterMenu.classList.contains('hidden')) {
                mainFilterMenu.classList.add('hidden');
            }
            document.querySelectorAll('.status-dropdown-menu').forEach(menu => {
                if (!menu.classList.contains('hidden')) {
                    menu.classList.add('hidden');
                }
            });
        }
    });
});
</script>
@endpush