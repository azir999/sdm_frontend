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
               <a href="{{ route('admin.pelamar.create') }}" class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-3 rounded-md shadow-sm inline-flex items-center justify-center text-sm">
                    Input Data Pelamar
                </a>
                <a href="{{ route('admin.wawancara.create') }}" class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-3 rounded-md shadow-sm inline-flex items-center justify-center text-sm">
                    Input Data Wawancara
                </a>
               <a href="{{ route('admin.psikologi.create') }}" class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-3 rounded-md shadow-sm inline-flex items-center justify-center text-sm">
                    Input Data Psikologi
                </a>
                <a href="{{ route('admin.validasi.pelamar.index') }}" class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-3 rounded-md shadow-sm inline-flex items-center justify-center text-sm">
                    Data Validasi
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
                    <tr>
                        <td class="px-3 py-3 text-center text-sm whitespace-nowrap">CD-123</td>
                        <td class="px-3 py-3 text-center text-sm whitespace-nowrap">Muhammad Azir</td>
                        <td class="px-3 py-3 text-center text-sm whitespace-nowrap">0211118601</td>
                        <td class="px-3 py-3 text-center text-sm whitespace-nowrap">Paya Besar</td>
                        <td class="px-3 py-3 text-center text-sm whitespace-nowrap">17 Juli 2004</td>
                        <td class="px-3 py-3 text-center text-sm whitespace-nowrap">Laki-Laki</td>
                        <td class="px-3 py-3 text-center text-sm whitespace-nowrap">muhammadazir@gmail.com</td>
                        <td class="px-3 py-3 text-center text-sm whitespace-nowrap">Palembang</td>
                        <td class="px-3 py-3 text-center text-sm whitespace-nowrap">S3</td>
                        <td class="px-3 py-3 text-center text-sm whitespace-nowrap">43</td>
                        <td class="px-3 py-3 text-center text-sm whitespace-nowrap">081366179497</td>
                        <td class="px-3 py-3 text-center text-sm whitespace-nowrap">4</td>
                        <td class="px-3 py-3 text-center text-sm whitespace-nowrap">Desain Antar Muka</td>
                        <td class="px-3 py-3 text-center text-sm whitespace-nowrap">Dosen</td>
                        <td class="px-3 py-3 text-center text-sm whitespace-nowrap">20 Mei 2025</td>
                        <td class="px-3 py-3 text-center whitespace-nowrap">
                            <a href="#" class="text-blue-600 text-2xl hover:text-blue-800 transition-colors duration-150" title="Lihat Dokumen Lamaran">
                                <i class="fas fa-file-alt"></i>
                            </a>
                        </td>
                        <td class="px-3 py-3 text-center text-sm whitespace-nowrap">
                            <button class="text-blue-600 text-2xl hover:text-blue-800 transition-colors duration-150"><i class="fas fa-edit"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-3 py-3 text-center text-sm whitespace-nowrap">CK-123</td>
                        <td class="px-3 py-3 text-center text-sm whitespace-nowrap">Rizki Apriansyah</td>
                        <td class="px-3 py-3 text-center text-sm whitespace-nowrap">-</td>
                        <td class="px-3 py-3 text-center text-sm whitespace-nowrap">KAI</td>
                        <td class="px-3 py-3 text-center text-sm whitespace-nowrap">12 Maret 2004</td>
                        <td class="px-3 py-3 text-center text-sm whitespace-nowrap">Perempuan</td>
                        <td class="px-3 py-3 text-center text-sm whitespace-nowrap">RizkiRizxx@gmail.com</td>
                        <td class="px-3 py-3 text-center text-sm whitespace-nowrap">Palembang</td>
                        <td class="px-3 py-3 text-center text-sm whitespace-nowrap">S1</td>
                        <td class="px-3 py-3 text-center text-sm whitespace-nowrap">23</td>
                        <td class="px-3 py-3 text-center text-sm whitespace-nowrap">086547266446</td>
                        <td class="px-3 py-3 text-center text-sm whitespace-nowrap">2.8</td>
                        <td class="px-3 py-3 text-center text-sm whitespace-nowrap">Jaringan</td>
                        <td class="px-3 py-3 text-center text-sm whitespace-nowrap">Karyawan</td>
                        <td class="px-3 py-3 text-center text-sm whitespace-nowrap">20 Mei 2025</td>
                        <td class="px-3 py-3 text-center whitespace-nowrap">
                            <a href="#" class="text-blue-600 text-2xl hover:text-blue-800 transition-colors duration-150" title="Lihat Dokumen Lamaran">
                                <i class="fas fa-file-alt"></i>
                            </a>
                        </td>
                        <td class="px-3 py-3 text-center text-sm whitespace-nowrap">
                            <button class="text-blue-600 text-2xl hover:text-blue-800 transition-colors duration-150"><i class="fas fa-edit"></i></button>
                        </td>
                    </tr>
                   <!-- tambah data dummy -->
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
                <button class="py-1 px-2 sm:py-2 sm:px-3 leading-tight text-sm text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">2</button>
                <button class="py-1 px-2 sm:py-2 sm:px-3 leading-tight text-sm text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 rounded-r-lg">Berikutnya</button>
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

        // Klik di luar untuk menutup dropdown
        window.addEventListener('click', function (event) {
            if (filterMenu && !filterMenu.classList.contains('hidden') && !filterButton.contains(event.target) && !filterMenu.contains(event.target)) {
                filterMenu.classList.add('hidden');
            }
        });
        // Tombol Escape untuk menutup dropdown
        document.addEventListener('keydown', function (event) {
            if (filterMenu && event.key === 'Escape' && !filterMenu.classList.contains('hidden')) {
                filterMenu.classList.add('hidden');
            }
        });
    }
});
</script>
@endpush