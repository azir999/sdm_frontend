@extends('layouts.admin')

@section('title', 'Data Tes Psikologi')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-text-dark">Data Tes Psikologi</h1>
        <p class="text-sm text-text-muted">Sistem Informasi Sumber Daya Manusia</p>
    </div>

    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="bg-[#1D3F8E] text-white p-4 flex justify-between items-center">
            <h2 class="text-xl font-semibold">Tabel Data Tes Psikologi</h2>
            <a href="{{ route('admin.validasi.pelamar.index') }}" class="text-sm bg-white text-[#1D3F8E] hover:bg-gray-100 font-medium py-2 px-3 rounded-md shadow-sm inline-flex items-center">
                <i class="fas fa-arrow-left mr-2"></i>Kembali ke Validasi
            </a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-center text-left text-sm font-semibold text-gray-800 uppercase tracking-wider">ID Pelamar</th>
                        <th class="px-4 py-3 text-center text-left text-sm font-semibold text-gray-800 uppercase tracking-wider">Nama Pelamar</th>
                        <th class="px-4 py-3 text-center text-left text-sm font-semibold text-gray-800 uppercase tracking-wider">Tanggal Tes</th>
                        <th class="px-4 py-3 text-center text-sm font-semibold text-gray-800 uppercase tracking-wider">Dokumen</th>
                        <th class="px-4 py-3 text-center text-left text-sm font-semibold text-gray-800 uppercase tracking-wider min-w-[200px]">Kesimpulan</th>
                        <th class="px-4 py-3 text-center text-left text-sm font-semibold text-gray-800 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-center text-sm font-semibold text-gray-800 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 text-sm text-gray-700">
                    @forelse ($psikologiData ?? [] as $psikologi)
                    <tr>
                        <td class="px-4 py-3 text-center whitespace-nowrap">{{ $psikologi->kode_pelamar }}</td>
                        <td class="px-4 py-3 text-center whitespace-nowrap font-medium">{{ $psikologi->nama_pelamar }}</td>
                        <td class="px-4 py-3 text-center whitespace-nowrap">{{ $psikologi->tanggal }}</td>
                        <td class="px-4 py-3 text-center whitespace-nowrap">
                            @if($psikologi->dokumen_ada)
                                <a href="#" class="text-blue-600 hover:text-blue-800" title="Lihat Dokumen Tes Psikologi">
                                    <i class="fas fa-file-alt text-lg"></i>
                                </a>
                            @else
                                <span class="text-gray-400">-</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-center ">{{ Str::limit($psikologi->kesimpulan, 70) }}</td>
                        <td class="px-4 py-3 text-center whitespace-nowrap">
                            @if($psikologi->status == 'Lulus')
                                <span class="px-2 inline-flex text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Lulus
                                </span>
                            @elseif($psikologi->status == 'Tidak Lulus')
                                <span class="px-2 inline-flex text-sm leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                    Tidak Lulus
                                </span>
                            @else
                                <span class="px-2 inline-flex text-sm leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    {{ $psikologi->status }}
                                </span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-center whitespace-nowrap ">
                            <div class="inline-flex items-center space-x-2">
                                <a href="{{ route('admin.psikologi.edit', ['id_psikologi' => $psikologi->id_psikologi]) }}" 
                                   class="text-blue-600 hover:text-blue-800 transition-colors duration-150 text-lg" 
                                   title="Edit Data Tes Psikologi">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.psikologi.destroy', ['id_psikologi' => $psikologi->id_psikologi]) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data tes psikologi ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="text-red-600 hover:text-red-800 transition-colors duration-150 text-lg" 
                                            title="Hapus Data Tes Psikologi">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-4 py-4 text-center text-sm text-gray-500">
                            Tidak ada data tes psikologi yang ditemukan.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 flex flex-col sm:flex-row justify-between items-center space-y-2 sm:space-y-0">
            <span class="text-sm text-gray-700">
                Menampilkan {{ $psikologiData->count() > 0 ? '1 sampai ' . $psikologiData->count() : '0' }} dari {{ $psikologiData->count() }} entri
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

@endpush