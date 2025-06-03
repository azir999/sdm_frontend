@extends('layouts.admin')

@section('title', 'Update Surat Tugas')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-text-dark">Update Surat Tugas</h1>
        <p class="text-sm text-text-muted">Sistem Informasi Sumber Daya Manusia</p>
        @if(isset($surat))
            <p class="text-xs text-gray-500 mt-1">Mengupdate Surat Tugas untuk: {{ $surat->nama_pegawai ?? $surat->kode_pegawai }} (No. SK: {{ $surat->nomor_sk }})</p>
        @endif
    </div>

    <div class="bg-white shadow-lg rounded-lg p-6 md:p-8">
        @if(isset($surat))
            <form action="{{ route('admin.surat-tugas.update', $surat->id_surat) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 gap-y-6">
                    <div>
                        <label for="kode_pegawai" class="block text-sm font-medium text-gray-700 mb-1">Pegawai <span class="text-red-500">*</span></label>
                        <select id="kode_pegawai" name="kode_pegawai" class="form-select mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-sm" required>
                            <option value="">- Pilih Pegawai -</option>
                            @foreach($pegawaiOptions ?? [] as $kode => $nama)
                                <option value="{{ $kode }}" {{ old('kode_pegawai', $surat->kode_pegawai ?? '') == $kode ? 'selected' : '' }}>{{ $nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="nomor_sk" class="block text-sm font-medium text-gray-700 mb-1">Nomor SK <span class="text-red-500">*</span></label>
                        <input type="text" name="nomor_sk" id="nomor_sk" value="{{ old('nomor_sk', $surat->nomor_sk ?? '') }}" class="form-input mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-sm" required>
                    </div>
                    <div>
                        <label for="tanggal_sk" class="block text-sm font-medium text-gray-700 mb-1">Tanggal SK <span class="text-red-500">*</span></label>
                        <input type="date" name="tanggal_sk" id="tanggal_sk" value="{{ old('tanggal_sk', $surat->tanggal_sk ?? '') }}" class="form-input mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-sm" required>
                    </div>
                    <div>
                        <label for="keterangan" class="block text-sm font-medium text-gray-700 mb-1">Keterangan <span class="text-red-500">*</span></label>
                        <textarea name="keterangan" id="keterangan" rows="4" class="form-textarea mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-sm" required>{{ old('keterangan', $surat->keterangan ?? '') }}</textarea>
                    </div>
                    <div>
                        <label for="tengat_waktu" class="block text-sm font-medium text-gray-700 mb-1">Tengat Waktu <span class="text-red-500">*</span></label>
                        <input type="text" name="tengat_waktu" id="tengat_waktu" value="{{ old('tengat_waktu', $surat->tengat_waktu ?? '') }}" class="form-input mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-sm" placeholder="Contoh: 1 Bulan, 3 Minggu" required>
                    </div>
                </div>

                <div class="mt-8 pt-6 border-t border-gray-200 flex justify-end space-x-3">
                    <a href="{{ route('admin.surat-tugas.index') }}" 
                       class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Batal
                    </a>
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Update Surat Tugas
                    </button>
                </div>
            </form>
        @else
            <p class="text-center text-gray-500">Data Surat Tugas tidak ditemukan.</p>
             <div class="mt-4 text-center">
                <a href="{{ route('admin.surat-tugas.index') }}" 
                   class="text-blue-600 hover:text-blue-800">
                    Kembali ke Daftar Surat Tugas
                </a>
            </div>
        @endif
    </div>
@endsection