@extends('layouts.admin')

@section('title', 'Data Wawancara Pelamar')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-text-dark">Data Wawancara</h1>
        <p class="text-sm text-text-muted">Sistem Informasi Sumber Daya Manusia</p>
    </div>

    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="bg-[#1D3F8E] text-white p-4 flex justify-between items-center">
            <h2 class="text-xl font-semibold">Tabel Data Wawancara</h2>
            <a href="{{ route('admin.validasi.pelamar.index') }}" class="text-sm bg-white text-[#1D3F8E] hover:bg-gray-100 font-medium py-2 px-3 rounded-md shadow-sm inline-flex items-center">
                <i class="fas fa-arrow-left mr-2"></i>Kembali ke Validasi
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-center text-left text-sm font-semibold text-gray-800 uppercase tracking-wider">Kode Pelamar</th>
                        <th class="px-4 py-3 text-center text-left text-sm font-semibold text-gray-800 uppercase tracking-wider">Nama Pelamar</th>
                        <th class="px-4 py-3 text-center text-left text-sm font-semibold text-gray-800 uppercase tracking-wider">Nama Pewawancara</th>
                        <th class="px-4 py-3 text-center text-left text-sm font-semibold text-gray-800 uppercase tracking-wider">Pangkat</th>
                        <th class="px-4 py-3 text-center text-left text-sm font-semibold text-gray-800 uppercase tracking-wider">Tanggal</th>
                        <th class="px-4 py-3 text-center text-sm font-semibold text-gray-800 uppercase tracking-wider">Dokumen</th>
                        <th class="px-4 py-3 text-center text-left text-sm font-semibold text-gray-800 uppercase tracking-wider min-w-[200px]">Kesimpulan</th>
                        <th class="px-4 py-3 text-center text-left text-sm font-semibold text-gray-800 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-center text-sm font-semibold text-gray-800 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 text-sm text-gray-700">
                    @forelse ($wawancaraData ?? [] as $wawancara)
                    <tr>
                        <td class="px-4 py-3 text-center whitespace-nowrap">{{ $wawancara->kode_pelamar }}</td>
                        <td class="px-4 py-3 text-center whitespace-nowrap font-medium">{{ $wawancara->nama_pelamar }}</td>
                        <td class="px-4 py-3 text-center whitespace-nowrap">{{ $wawancara->nama_pewawancara }}</td>
                        <td class="px-4 py-3 text-center whitespace-nowrap">{{ $wawancara->pangkat_pewawancara }}</td>
                        <td class="px-4 py-3 text-center whitespace-nowrap">{{ $wawancara->tanggal }}</td>
                        <td class="px-4 py-3 text-center whitespace-nowrap">
                            @if($wawancara->dokumen_ada)
                                {{-- Ganti href dengan link ke dokumen wawancara jika ada --}}
                                <a href="#" class="text-blue-600 hover:text-blue-800" title="Lihat Dokumen Wawancara">
                                    <i class="fas fa-file-alt text-lg"></i>
                                </a>
                            @else
                                <span class="text-gray-400">-</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-center ">{{ Str::limit($wawancara->kesimpulan, 70) }}</td>
                        <td class="px-4 py-3 text-center whitespace-nowrap">
                            @if($wawancara->status == 'Direkomendasikan')
                                <span class="px-2 inline-flex text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Direkomendasikan
                                </span>
                            @elseif($wawancara->status == 'Pending')
                                <span class="px-2 inline-flex text-sm leading-5 font-semibold rounded-full bg-yellow-100 text-red-800">
                                   Pending
                                </span>
                            @else
                                <span class="px-2 inline-flex text-sm leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                    {{ $wawancara->status }}
                                </span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-center whitespace-nowrap ">
                            <div class="inline-flex items-center space-x-2">
                                <a href="{{ route('admin.wawancara.edit', ['id_wawancara' => $wawancara->id_wawancara]) }}" 
                                   class="text-blue-600 hover:text-blue-800 transition-colors duration-150 text-lg" 
                                   title="Edit Data Wawancara">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.wawancara.destroy', ['id_wawancara' => $wawancara->id_wawancara]) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data wawancara ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="text-red-600 hover:text-red-800 transition-colors duration-150 text-lg" 
                                            title="Hapus Data Wawancara">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="px-4 py-4 text-center text-sm text-gray-500">
                            Tidak ada data wawancara yang ditemukan.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 flex flex-col sm:flex-row justify-between items-center space-y-2 sm:space-y-0">
            <span class="text-sm text-gray-700">
                Menampilkan {{ $wawancaraData->count() > 0 ? '1 sampai ' . $wawancaraData->count() : '0' }} dari {{ $wawancaraData->count() }} entri
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