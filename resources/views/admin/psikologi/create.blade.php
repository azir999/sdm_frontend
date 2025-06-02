@extends('layouts.admin')

@section('title', 'Input Data Tes Psikologi')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-text-dark">Input Data Tes Psikologi</h1>
        <p class="text-sm text-text-muted">Sistem Informasi Sumber Daya Manusia</p>
        @if(isset($pelamarKode) && $pelamarKode)
            <p class="text-sm text-gray-500 mt-1">Untuk Pelamar Kode: {{ $pelamarKode }}</p>
        @endif
    </div>

    <div class="bg-white shadow-lg rounded-lg p-6 md:p-8">
        <form action="{{ route('admin.psikologi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($pelamarKode) && $pelamarKode)
                <input type="hidden" name="pelamar_kode_terkait" value="{{ $pelamarKode }}">
            @endif

            <div class="space-y-6">
                {{-- ... field-field form lainnya (Tanggal Tes, Dokumen, Kesimpulan, Status Tes) ... --}}
                <div>
                    <label for="tanggal_tes" class="block text-sm font-medium text-gray-700 mb-1">
                        Tanggal Tes Psikologi <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <input type="date" name="tanggal_tes" id="tanggal_tes" value="{{ old('tanggal_tes') }}"
                               class="form-input block w-full sm:w-1/2 lg:w-1/3 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2 px-3" required>
                    </div>
                </div>

                <div>
                    <label for="dokumen_tes" class="block text-sm font-medium text-gray-700 mb-1">
                        Dokumen Tes Psikologi
                    </label>
                    <div class="mt-1">
                        <input type="file" name="dokumen_tes" id="dokumen_tes" 
                               class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 border border-gray-300 rounded-md cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <p class="mt-1 text-xs text-gray-500">Pilih Dokumen Max. 10 MB</p>
                    </div>
                </div>

                <div>
                    <label for="kesimpulan" class="block text-sm font-medium text-gray-700 mb-1">
                        Kesimpulan <span class="text-red-500">*</span>
                    </label>
                    <div class="mt-1">
                        <textarea id="kesimpulan" name="kesimpulan" rows="8" 
                                  class="form-textarea block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2 px-3" required>{{ old('kesimpulan') }}</textarea>
                    </div>
                </div>

                <div>
                    <label for="status_tes" class="block text-sm font-medium text-gray-700 mb-1">
                        Status Tes (Lulus/Tidak/Pending) <span class="text-red-500">*</span>
                    </label>
                    <select id="status_tes" name="status_tes" 
                            class="form-select mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2 px-3" required>
                        <option value="">-Pilih Status-</option>
                        @foreach($statusOptions ?? ['Lulus', 'Tidak Lulus', 'Pending'] as $option)
                            <option value="{{ $option }}" {{ old('status_tes') == $option ? 'selected' : '' }}>{{ $option }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mt-8 pt-6 border-t border-gray-200 flex justify-end space-x-3">
                {{-- Tombol Batal mengarah ke daftar WAWANCARA dengan filter pelamar_kode jika ada --}}
                <a href="{{ (isset($pelamarKode) && $pelamarKode) ? route('admin.wawancara.index', ['pelamar_kode' => $pelamarKode]) : route('admin.psikologi.index') }}" 
                   class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Batal
                </a>
                <button type="submit" class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-3 rounded-md shadow-sm inline-flex items-center justify-center text-sm">
                    Simpan Data
                </button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
@endpush