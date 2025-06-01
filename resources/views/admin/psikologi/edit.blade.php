@extends('layouts.admin')

@section('title', 'Update Data Tes Psikologi')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-text-dark">Update Data Tes Psikologi</h1>
        <p class="text-sm text-text-muted">Sistem Informasi Sumber Daya Manusia</p>
        @if(isset($psikologi->kode_pelamar_terkait))
            <p class="text-sm text-gray-500 mt-1">Untuk Pelamar Kode: {{ $psikologi->kode_pelamar_terkait }}</p>
        @endif
    </div>

    <div class="bg-white shadow-lg rounded-lg p-6 md:p-8">
        @if(isset($psikologi))
            <form action="{{ route('admin.psikologi.update', $psikologi->id_psikologi) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="space-y-6">
                    <div>
                        <label for="tanggal_tes" class="block text-sm font-medium text-gray-700 mb-1">
                            Tanggal Tes Psikologi <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input type="date" name="tanggal_tes" id="tanggal_tes" value="{{ old('tanggal_tes', $psikologi->tanggal_tes ?? '') }}"
                                   class="form-input block w-full sm:w-1/2 lg:w-1/3 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2 px-3">
                        </div>
                    </div>

                    <div>
                        <label for="dokumen_tes" class="block text-sm font-medium text-gray-700 mb-1">
                            Dokumen Tes Psikologi 
                            @if(isset($psikologi->nama_file_dokumen_lama))
                                <span class="text-xs text-gray-500">(File saat ini: {{ $psikologi->nama_file_dokumen_lama }})</span>
                            @endif
                        </label>
                        <div class="mt-1">
                            <input type="file" name="dokumen_tes" id="dokumen_tes" 
                                   class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 border border-gray-300 rounded-md cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <p class="mt-1 text-xs text-gray-500">Pilih Dokumen Max. 10 MB. Kosongkan jika tidak ingin mengubah.</p>
                        </div>
                    </div>

                    <div>
                        <label for="kesimpulan" class="block text-sm font-medium text-gray-700 mb-1">
                            Kesimpulan <span class="text-red-500">*</span>
                        </label>
                        <div class="mt-1">
                            <textarea id="kesimpulan" name="kesimpulan" rows="8" 
                                      class="form-textarea block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2 px-3">{{ old('kesimpulan', $psikologi->kesimpulan ?? '') }}</textarea>
                        </div>
                    </div>

                    <div>
                        <label for="lulus" class="block text-sm font-medium text-gray-700 mb-1">
                            Lulus/Tidak <span class="text-red-500">*</span>
                        </label>
                        <select id="lulus" name="lulus" 
                                class="form-select mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2 px-3">
                            <option value="">-Pilih Lulus/Tidak-</option>
                            <option value="lulus" {{ old('lulus', $psikologi->lulus ?? '') == 'lulus' ? 'selected' : '' }}>lulus</option>
                            <option value="tidak_lulus" {{ old('lulus', $psikologi->lulus ?? '') == 'tidak_lulus' ? 'selected' : '' }}>Tidak lulus</option>
                        </select>
                    </div>
                </div>

                <div class="mt-8 pt-6 border-t border-gray-200 flex justify-end space-x-3">
                    <a href="{{ route('admin.psikologi.index', ['pelamar_kode' => $psikologi->kode_pelamar_terkait ?? null]) }}" 
                       class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Batal
                    </a>
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Update Data
                    </button>
                </div>
            </form>
        @else
            <p class="text-center text-gray-500">Data tes psikologi tidak ditemukan.</p>
             <div class="mt-4 text-center">
                <a href="{{ route('admin.psikologi.index') }}" 
                   class="text-blue-600 hover:text-blue-800">
                    Kembali ke Daftar Tes Psikologi
                </a>
            </div>
        @endif
    </div>
@endsection

@push('scripts')
@endpush