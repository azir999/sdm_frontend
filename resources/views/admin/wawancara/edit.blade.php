@extends('layouts.admin')

@section('title', 'Update Data Wawancara')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-text-dark">Update Data Wawancara</h1>
        <p class="text-sm text-text-muted">Sistem Informasi Sumber Daya Manusia</p>
        @if(isset($wawancara) && isset($pelamarKode)) {{-- Menggunakan $pelamarKode dari controller --}}
        <p class="text-sm text-gray-500 mt-1">Untuk Pelamar Kode: {{ $pelamarKode }}</p>
        @endif
    </div>

    <div class="bg-white shadow-lg rounded-lg p-6 md:p-8">
        @if(isset($wawancara))
            <form action="{{ route('admin.wawancara.update', $wawancara->id_wawancara) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                @if(isset($pelamarKode) && $pelamarKode)
                    <input type="hidden" name="pelamar_kode_terkait" value="{{ $pelamarKode }}">
                @endif
                
                <div class="space-y-6">

                    <div>
                        <label for="jabatan_pewawancara" class="block text-sm font-medium text-gray-700 mb-1">
                            Jabatan Pewawancara <span class="text-red-500">*</span>
                        </label>
                        <select id="jabatan_pewawancara" name="jabatan_pewawancara" 
                                class="form-select mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2 px-3">
                            <option value="">-Pilih Jabatan-</option>
                            @foreach($jabatanOptions ?? [] as $option)
                                <option value="{{ $option }}" {{ old('jabatan_pewawancara', $wawancara->jabatan_pewawancara ?? '') == $option ? 'selected' : '' }}>
                                    {{ $option }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="nama_pewawancara" class="block text-sm font-medium text-gray-700 mb-1">
                            Nama Pewawancara <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="nama_pewawancara" id="nama_pewawancara" value="{{ old('nama_pewawancara', $wawancara->nama_pewawancara ?? '') }}"
                               class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2 px-3">
                    </div>

                    <div>
                        <label for="tanggal_wawancara" class="block text-sm font-medium text-gray-700 mb-1">
                            Tanggal Wawancara <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input type="date" name="tanggal_wawancara" id="tanggal_wawancara" value="{{ old('tanggal_wawancara', $wawancara->tanggal_wawancara ?? '') }}"
                                   class="form-input block w-full sm:w-1/2 lg:w-1/3 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2 px-3">
                        </div>
                    </div>

                    <div>
                        <label for="dokumen_wawancara" class="block text-sm font-medium text-gray-700 mb-1">
                            Dokumen Wawancara 
                            @if(isset($wawancara->nama_file_dokumen_lama))
                                <span class="text-xs text-gray-500">(File saat ini: {{ $wawancara->nama_file_dokumen_lama }})</span>
                            @endif
                        </label>
                        <div class="mt-1">
                            <input type="file" name="dokumen_wawancara" id="dokumen_wawancara" 
                                   class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 border border-gray-300 rounded-md cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <p class="mt-1 text-xs text-gray-500">Pilih Dokumen Max. 10 MB. Kosongkan jika tidak ingin mengubah.</p>
                        </div>
                    </div>

                    <div>
                        <label for="kesimpulan_wawancara" class="block text-sm font-medium text-gray-700 mb-1">
                            Kesimpulan <span class="text-red-500">*</span>
                        </label>
                        <div class="mt-1">
                            <textarea id="kesimpulan_wawancara" name="kesimpulan_wawancara" rows="8" 
                                      class="form-textarea block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2 px-3">{{ old('kesimpulan_wawancara', $wawancara->kesimpulan_wawancara ?? '') }}</textarea>
                        </div>
                    </div>

                    <div>
                        <label for="rekomendasi_wawancara" class="block text-sm font-medium text-gray-700 mb-1">
                            Rekomendasikan/Tidak <span class="text-red-500">*</span>
                        </label>
                        <select id="rekomendasi_wawancara" name="rekomendasi_wawancara" 
                                class="form-select mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2 px-3">
                            <option value="">-Pilih Rekomendasikan/Tidak-</option>
                            <option value="rekomendasikan" {{ old('rekomendasi_wawancara', $wawancara->rekomendasi_wawancara ?? '') == 'rekomendasikan' ? 'selected' : '' }}>Rekomendasikan</option>
                            <option value="tidak_rekomendasikan" {{ old('rekomendasi_wawancara', $wawancara->rekomendasi_wawancara ?? '') == 'tidak_rekomendasikan' ? 'selected' : '' }}>Tidak Rekomendasikan</option>
                        </select>
                    </div>
                </div>

                <div class="mt-8 pt-6 border-t border-gray-200 flex justify-end space-x-3">
                    <a href="{{ isset($pelamarKode) && $pelamarKode ? route('admin.wawancara.index', ['pelamar_kode' => $pelamarKode]) : route('admin.wawancara.index') }}" 
                       class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Batal
                    </a>
                    <button type="submit" class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-3 rounded-md shadow-sm inline-flex items-center justify-center text-sm">
                        Update Data
                    </button>
                </div>
            </form>
        @else
            <p class="text-center text-gray-500">Data wawancara tidak ditemukan atau ID tidak valid.</p>
             <div class="mt-4 text-center">
                <a href="{{ route('admin.wawancara.index') }}" 
                   class="text-blue-600 hover:text-blue-800">
                    Kembali ke Daftar Wawancara
                </a>
            </div>
        @endif
    </div>
@endsection

@push('scripts')
@endpush