@extends('layouts.admin')

@section('title', 'Penerimaan Pegawai')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-text-dark">Penerimaan</h1>
        <p class="text-sm text-text-muted">Sistem Informasi Sumber Daya Manusia</p>
    </div>

    <div class="mb-8">
        <h2 class="text-xl font-semibold text-gray-700 mb-3">Data Informasi Penerimaan Dosen</h2>
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="bg-[#1D3F8E] text-white p-4">
                <h3 class="text-lg font-semibold">Tabel Penerimaan Dosen</h3>
            </div>
            <div class="p-4 flex flex-col sm:flex-row justify-between items-center space-y-3 sm:space-y-0 border-b border-gray-200">
                <div class="flex items-center space-x-3 w-full sm:w-auto">
                    <input type="text" placeholder="Cari Dosen...." class="form-input w-full sm:w-60 rounded-md border-gray-300 shadow-sm text-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 py-2">
                    <div class="relative w-full sm:w-auto">
                        <button type="button" id="filterDosenButton" class="w-full sm:w-auto bg-white hover:bg-gray-50 text-gray-700 font-medium py-2 px-4 border border-gray-300 rounded-md shadow-sm inline-flex items-center justify-center text-sm h-full">
                            <span>Filter</span>
                            <i class="fas fa-chevron-down ml-2 text-sm"></i>
                        </button>
                        <div id="filterDosenMenu" class="origin-top-left absolute left-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none hidden z-50" role="menu">
                            <div class="py-1" role="none">
                                <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">Aktif</a>
                                <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">Nonaktif</a>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="w-full sm:w-auto">
                <a href="{{ route('admin.penerimaan.dosen.create') }}" class="w-full sm:w-auto bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-3 rounded-md shadow-sm inline-flex items-center justify-center text-sm">
                    <i class="fas fa-plus mr-2"></i> Input Data Dosen
                </a>
            </div>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Kode</th>
                            <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Nama</th>
                            <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">NIDN</th>
                            <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">NIK</th>
                            <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">NIP</th>
                            <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">No NPWP</th>
                            <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Email</th>
                            <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Gelar Depan</th>
                            <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Gelar Belakang</th>
                            <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Tempat Lahir</th>
                            <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Tanggal Lahir</th>
                            <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Jenis Kelamin</th>
                            <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Golongan Darah</th>
                            <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Agama</th>
                            <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">No HP</th>
                            <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Fakultas</th>
                            <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Prodi</th>
                            <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Bidang Ilmu</th>
                            <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Ikatan Kerja</th>
                            <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Tanggal Mulai Tugas</th>
                            <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Pendidikan Tertinggi</th>
                            <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Jabatan Akademik</th>
                            <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Golongan Dosen</th>
                            <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Status Aktivasi</th>
                            <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Foto</th>
                            <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Dokumen</th>
                            <th class="px-3 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 text-sm text-gray-600">
                        @forelse ($penerimaanDosenData ?? [] as $dosen)
                        <tr>
                            <td class="px-3 py-3 text-sm whitespace-nowrap text-center">{{ $dosen->kode }}</td>
                            <td class="px-3 py-3 whitespace-nowrap text-center font-medium text-gray-900">{{ $dosen->nama }}</td>
                            <td class="px-3 py-3 whitespace-nowrap text-center">{{ $dosen->nidn }}</td>
                            <td class="px-3 py-3 whitespace-nowrap text-center">{{ $dosen->nik }}</td>
                            <td class="px-3 py-3 whitespace-nowrap text-center">{{ $dosen->nip }}</td>
                            <td class="px-3 py-3 whitespace-nowrap text-center">{{ $dosen->no_npwp }}</td>
                            <td class="px-3 py-3 whitespace-nowrap text-center">{{ $dosen->email }}</td>
                            <td class="px-3 py-3 whitespace-nowrap text-center">{{ $dosen->gelar_depan }}</td>
                            <td class="px-3 py-3 whitespace-nowrap text-center">{{ $dosen->gelar_belakang }}</td>
                            <td class="px-3 py-3 whitespace-nowrap text-center">{{ $dosen->tempat_lahir }}</td>
                            <td class="px-3 py-3 whitespace-nowrap text-center">{{ $dosen->tanggal_lahir }}</td>
                            <td class="px-3 py-3 whitespace-nowrap text-center">{{ $dosen->jenis_kelamin }}</td>
                            <td class="px-3 py-3 whitespace-nowrap text-center">{{ $dosen->golongan_darah }}</td>
                            <td class="px-3 py-3 whitespace-nowrap text-center">{{ $dosen->agama }}</td>
                            <td class="px-3 py-3 whitespace-nowrap text-center">{{ $dosen->nomor_hp }}</td>
                            <td class="px-3 py-3 whitespace-nowrap text-center">{{ $dosen->fakultas }}</td>
                            <td class="px-3 py-3 whitespace-nowrap text-center">{{ $dosen->program_studi }}</td>
                            <td class="px-3 py-3 whitespace-nowrap text-center">{{ $dosen->bidang_ilmu_kompetensi }}</td>
                            <td class="px-3 py-3 whitespace-nowrap text-center">{{ $dosen->ikatan_kerja }}</td>
                            <td class="px-3 py-3 whitespace-nowrap text-center">{{ $dosen->tanggal_mulai_bertugas }}</td>
                            <td class="px-3 py-3 whitespace-nowrap text-center">{{ $dosen->pendidikan_tertinggi }}</td>
                            <td class="px-3 py-3 whitespace-nowrap text-center">{{ $dosen->jabatan_akademik }}</td>
                            <td class="px-3 py-3 whitespace-nowrap text-center">{{ $dosen->golongan_dosen }}</td>
                            <td class="px-3 py-3 whitespace-nowrap text-center">
                                <div class="relative inline-block text-center status-dropdown-container w-full min-w-[80px]">
                                    <button type="button" class="status-aktivasi-button inline-flex justify-between items-center w-full rounded-md border shadow-sm px-3 py-1 text-sm font-medium text-white focus:outline-none {{ $dosen->status_aktivasi == 'aktif' ? 'bg-green-500 hover:bg-green-600 border-green-500' : 'bg-red-500 hover:bg-red-600 border-red-500' }}">
                                        <span class="status-aktivasi-text">{{ ucfirst($dosen->status_aktivasi) }}</span>
                                        <i class="fas fa-chevron-down -mr-1 ml-1 h-3 w-3"></i>
                                    </button>
                                    <div class="status-aktivasi-menu origin-top-right absolute right-0 mt-2 w-full rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none hidden z-10">
                                        <div class="py-1" role="none">
                                            <a href="#" data-status="aktif" class="status-aktivasi-item block px-4 py-3 text-sm text-gray-700 hover:bg-gray-100">Aktif</a>
                                            <a href="#" data-status="nonaktif" class="status-aktivasi-item block px-4 py-3 text-sm text-gray-700 hover:bg-gray-100">Nonaktif</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-3 py-3 whitespace-nowrap text-center"><a href="{{ $dosen->foto_dosen_url }}" target="_blank" class="text-blue-600 hover:text-blue-800"><i class="fas fa-image text-lg"></i></a></td>
                            <td class="px-3 py-3 whitespace-nowrap text-center"><a href="{{ $dosen->dokumen_url }}" target="_blank" class="text-green-600 hover:text-green-800"><i class="fas fa-file-alt text-lg"></i></a></td>
                            <td class="px-3 py-2 whitespace-nowrap text-center">
                                <a href="{{ route('admin.penerimaan.dosen.edit', ['id' => $dosen->id]) }}" class="text-blue-600 hover:text-blue-800" title="Edit Data Dosen">
                                    <i class="fas fa-edit text-lg"></i>
                                </a>
                               <form action="{{ route('admin.penerimaan.dosen.destroy', ['id' => $dosen->id]) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data penerimaan dosen ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="text-red-600 hover:text-red-800 transition-colors duration-150 text-lg" 
                                        title="Hapus Data Penerimaan Dosen">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="27" class="text-center py-4 text-gray-500">Tidak ada data penerimaan dosen.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="p-4 flex justify-between items-center">
                 <span class="text-sm text-gray-700">Menampilkan {{ $penerimaanDosenData->count() > 0 ? '1 sampai ' . $penerimaanDosenData->count() : '0' }} dari {{ $penerimaanDosenData->count() }} entri</span>
            </div>
        </div>
    </div>

    <div class="mt-8">
        <h2 class="text-xl font-semibold text-gray-700 mb-3">Data Informasi Penerimaan Karyawan</h2>
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="bg-[#1D3F8E] text-white p-4">
                <h3 class="text-lg font-semibold">Tabel Penerimaan Karyawan</h3>
            </div>
            <div class="p-4 flex flex-col sm:flex-row justify-between items-center space-y-3 sm:space-y-0 border-b border-gray-200">
                 <div class="flex items-center space-x-3 w-full sm:w-auto">
                    <input type="text" placeholder="Cari Karyawan...." class="form-input w-full sm:w-60 rounded-md border-gray-300 shadow-sm text-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 py-2">
                    <div class="relative w-full sm:w-auto">
                        <button type="button" id="filterKaryawanButton" class="w-full sm:w-auto bg-white hover:bg-gray-50 text-gray-700 font-medium py-2 px-4 border border-gray-300 rounded-md shadow-sm inline-flex items-center justify-center text-sm h-full">
                            <span>Filter</span>
                            <i class="fas fa-chevron-down ml-2 text-sm"></i>
                        </button>
                         <div id="filterKaryawanMenu" class="origin-top-left absolute left-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none hidden z-50" role="menu">
                            <div class="py-1" role="none">
                                <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">Semua Unit</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full sm:w-auto">
                <a href="{{ route('admin.penerimaan.karyawan.create') }}" class="w-full sm:w-auto bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-3 rounded-md shadow-sm inline-flex items-center justify-center text-sm">
                    <i class="fas fa-plus mr-2"></i> Input Data Karyawan
                </a>
            </div>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-3 py-2 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Kode</th>
                            <th class="px-3 py-2 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Nama</th>
                            <th class="px-3 py-2 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">NIK</th>
                            <th class="px-3 py-2 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">No NPWP</th>
                            <th class="px-3 py-2 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Tempat Lahir</th>
                            <th class="px-3 py-2 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Tanggal Lahir</th>
                            <th class="px-3 py-2 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Jenis Kelamin</th>
                            <th class="px-3 py-2 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Golongan Darah</th>
                            <th class="px-3 py-2 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Pendidikan Terakhir</th>
                            <th class="px-3 py-2 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Ikatan Kerja</th>
                            <th class="px-3 py-2 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Tanggal Mulai Tugas</th>
                            <th class="px-3 py-2 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">No HP</th>
                            <th class="px-3 py-2 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Unit Kerja</th>
                            <th class="px-3 py-2 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Foto</th>
                            <th class="px-3 py-2 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Dokumen</th>
                            <th class="px-3 py-2 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 text-sm text-gray-600">
                        @forelse ($penerimaanKaryawanData ?? [] as $karyawan)
                        <tr>
                            <td class="px-3 py-2 whitespace-nowrap text-center">{{ $karyawan->kode }}</td>
                            <td class="px-3 py-2 whitespace-nowrap font-medium text-gray-900 text-center">{{ $karyawan->nama }}</td>
                            <td class="px-3 py-2 whitespace-nowrap text-center">{{ $karyawan->nik }}</td>
                            <td class="px-3 py-2 whitespace-nowrap text-center">{{ $karyawan->no_npwp }}</td>
                            <td class="px-3 py-2 whitespace-nowrap text-center">{{ $karyawan->tempat_lahir }}</td>
                            <td class="px-3 py-2 whitespace-nowrap text-center">{{ $karyawan->tanggal_lahir }}</td>
                            <td class="px-3 py-2 whitespace-nowrap text-center">{{ $karyawan->jenis_kelamin }}</td>
                            <td class="px-3 py-2 whitespace-nowrap text-center">{{ $karyawan->gol_darah }}</td>
                            <td class="px-3 py-2 whitespace-nowrap text-center">{{ $karyawan->pendidikan_terakhir }}</td>
                            <td class="px-3 py-2 whitespace-nowrap text-center">{{ $karyawan->ikatan_kerja }}</td>
                            <td class="px-3 py-2 whitespace-nowrap text-center">{{ $karyawan->tanggal_mulai_bertugas }}</td>
                            <td class="px-3 py-2 whitespace-nowrap text-center">{{ $karyawan->nomor_hp }}</td>
                            <td class="px-3 py-2 whitespace-nowrap text-center">{{ $karyawan->unit_kerja }}</td>
                            <td class="px-3 py-2 whitespace-nowrap text-center"><a href="{{ $karyawan->foto_karyawan_url }}" target="_blank" class="text-blue-600 hover:text-blue-800"><i class="fas fa-image text-lg"></i></a></td>
                            <td class="px-3 py-2 whitespace-nowrap text-center"><a href="{{ $karyawan->dokumen_url }}" target="_blank" class="text-green-600 hover:text-green-800"><i class="fas fa-file-alt text-lg"></i></a></td>
                            <td class="px-3 py-2 whitespace-nowrap text-center">
                                <a href="{{ route('admin.penerimaan.karyawan.edit', ['id' => $karyawan->id]) }}" class="text-blue-600 hover:text-blue-800" title="Edit Data Karyawan">
                                    <i class="fas fa-edit text-lg"></i>
                                </a>
                                <form action="{{ route('admin.penerimaan.karyawan.destroy', ['id' => $karyawan->id]) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data penerimaan dosen ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="text-red-600 hover:text-red-800 transition-colors duration-150 text-lg" 
                                        title="Hapus Data Penerimaan Dosen">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="16" class="text-center py-4 text-gray-500">Tidak ada data penerimaan karyawan.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="p-4 flex justify-between items-center">
                <span class="text-sm text-gray-700">Menampilkan {{ $penerimaanKaryawanData->count() > 0 ? '1 sampai ' . $penerimaanKaryawanData->count() : '0' }} dari {{ $penerimaanKaryawanData->count() }} entri</span>
                {{-- Paginasi Placeholder --}}
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    function initializeDropdown(buttonId, menuId) {
        const filterButton = document.getElementById(buttonId);
        const filterMenu = document.getElementById(menuId);

        if (filterButton && filterMenu) {
            filterButton.addEventListener('click', function (event) {
                event.stopPropagation();
                filterMenu.classList.toggle('hidden');
            });
        }
        return { button: filterButton, menu: filterMenu };
    }

    const dosenFilter = initializeDropdown('filterDosenButton', 'filterDosenMenu');
    const karyawanFilter = initializeDropdown('filterKaryawanButton', 'filterKaryawanMenu');
    
    const statusAktivasiContainers = document.querySelectorAll('.status-dropdown-container');
    statusAktivasiContainers.forEach(container => {
        const button = container.querySelector('.status-aktivasi-button');
        const menu = container.querySelector('.status-aktivasi-menu');
        const statusTextSpan = container.querySelector('.status-aktivasi-text');

        if (button && menu) {
            button.addEventListener('click', function(event) {
                event.stopPropagation();
                document.querySelectorAll('.status-aktivasi-menu').forEach(m => {
                    if (m !== menu) m.classList.add('hidden');
                });
                menu.classList.toggle('hidden');
            });

            menu.querySelectorAll('.status-aktivasi-item').forEach(item => {
                item.addEventListener('click', function(event) {
                    event.preventDefault();
                    const newStatus = this.dataset.status;
                    const newText = this.textContent;
                    
                    if (statusTextSpan) statusTextSpan.textContent = newText;
                    
                    let newClasses = 'inline-flex justify-between items-center w-full rounded-md border shadow-sm px-3 py-1 text-sm font-medium text-white focus:outline-none ';
                    newClasses += newStatus === 'aktif' ? 'bg-green-500 hover:bg-green-600 border-green-500' : 'bg-red-500 hover:bg-red-600 border-red-500';
                    button.className = newClasses;

                    console.log('Status Aktivasi diubah menjadi:', newStatus, 'untuk ID:', container.closest('tr').querySelector('td:first-child').textContent);
                    menu.classList.add('hidden');
                });
            });
        }
    });


    window.addEventListener('click', function (event) {
        if (dosenFilter.menu && !dosenFilter.menu.classList.contains('hidden') && dosenFilter.button && !dosenFilter.button.contains(event.target) && !dosenFilter.menu.contains(event.target)) {
            dosenFilter.menu.classList.add('hidden');
        }
        if (karyawanFilter.menu && !karyawanFilter.menu.classList.contains('hidden') && karyawanFilter.button && !karyawanFilter.button.contains(event.target) && !karyawanFilter.menu.contains(event.target)) {
            karyawanFilter.menu.classList.add('hidden');
        }
        document.querySelectorAll('.status-aktivasi-menu').forEach(menu => {
            const container = menu.closest('.status-dropdown-container');
            const button = container ? container.querySelector('.status-aktivasi-button') : null;
             if (button && !menu.classList.contains('hidden') && !button.contains(event.target) && !menu.contains(event.target)) {
                menu.classList.add('hidden');
            }
        });
    });

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            if (dosenFilter.menu && !dosenFilter.menu.classList.contains('hidden')) dosenFilter.menu.classList.add('hidden');
            if (karyawanFilter.menu && !karyawanFilter.menu.classList.contains('hidden')) karyawanFilter.menu.classList.add('hidden');
            document.querySelectorAll('.status-aktivasi-menu').forEach(menu => {
                if (!menu.classList.contains('hidden')) menu.classList.add('hidden');
            });
        }
    });
});
</script>
@endpush