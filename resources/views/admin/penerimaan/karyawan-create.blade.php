@extends('layouts.admin')

@section('title', 'Input Data Penerimaan Karyawan')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-text-dark">Input Data Penerimaan Karyawan</h1>
        <p class="text-sm text-text-muted">Sistem Informasi Sumber Daya Manusia</p>
    </div>

    <div class="bg-white shadow-lg rounded-lg p-6 md:p-8">
        <form action="{{ route('admin.penerimaan.karyawan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 gap-y-6"> 
                <div>
                    <label for="kode_karyawan" class="block text-sm font-medium text-gray-700 mb-1">Kode <span class="text-red-500">*</span></label>
                    <input type="text" name="kode_karyawan" id="kode_karyawan" value="{{ old('kode_karyawan') }}" 
                           class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:border-indigo-500 focus:ring-indigo-500 text-sm" required>
                </div>
                <div>
                    <label for="nama_karyawan" class="block text-sm font-medium text-gray-700 mb-1">Nama <span class="text-red-500">*</span></label>
                    <input type="text" name="nama_karyawan" id="nama_karyawan" value="{{ old('nama_karyawan') }}" 
                           class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:border-indigo-500 focus:ring-indigo-500 text-sm" required>
                </div>
                <div>
                    <label for="nik_karyawan" class="block text-sm font-medium text-gray-700 mb-1">NIK</label>
                    <input type="text" name="nik_karyawan" id="nik_karyawan" value="{{ old('nik_karyawan') }}" 
                           class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                </div>
                <div>
                    <label for="no_npwp_karyawan" class="block text-sm font-medium text-gray-700 mb-1">No NPWP</label>
                    <input type="text" name="no_npwp_karyawan" id="no_npwp_karyawan" value="{{ old('no_npwp_karyawan') }}" 
                           class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                </div>
                <div>
                    <label for="tempat_lahir_karyawan" class="block text-sm font-medium text-gray-700 mb-1">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir_karyawan" id="tempat_lahir_karyawan" value="{{ old('tempat_lahir_karyawan') }}" 
                           class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                </div>
                <div>
                    <label for="tanggal_lahir_karyawan" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir_karyawan" id="tanggal_lahir_karyawan" value="{{ old('tanggal_lahir_karyawan') }}" 
                           class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                </div>
                <div>
                    <label for="jenis_kelamin_karyawan" class="block text-sm font-medium text-gray-700 mb-1">Jenis Kelamin</label>
                    <select id="jenis_kelamin_karyawan" name="jenis_kelamin_karyawan" 
                            class="form-select mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                        <option value="">-Pilih-</option>
                         @foreach($jenisKelaminOptions ?? ['Laki Laki', 'Perempuan'] as $option)
                            <option value="{{ $option }}" {{ old('jenis_kelamin_karyawan') == $option ? 'selected' : '' }}>{{ $option }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="gol_darah_karyawan" class="block text-sm font-medium text-gray-700 mb-1">Golongan Darah</label>
                    <input type="text" name="gol_darah_karyawan" id="gol_darah_karyawan" value="{{ old('gol_darah_karyawan') }}" 
                           class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                </div>
                <div>
                    <label for="pendidikan_terakhir_karyawan" class="block text-sm font-medium text-gray-700 mb-1">Pendidikan Terakhir</label>
                    <select id="pendidikan_terakhir_karyawan" name="pendidikan_terakhir_karyawan" 
                            class="form-select mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                        <option value="">-Pilih-</option>
                         @foreach($pendidikanOptions ?? [] as $option)
                            <option value="{{ $option }}" {{ old('pendidikan_terakhir_karyawan') == $option ? 'selected' : '' }}>{{ $option }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="ikatan_kerja_karyawan" class="block text-sm font-medium text-gray-700 mb-1">Ikatan Kerja</label>
                    <input type="text" name="ikatan_kerja_karyawan" id="ikatan_kerja_karyawan" value="{{ old('ikatan_kerja_karyawan') }}" 
                           class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                </div>
                <div>
                    <label for="tanggal_mulai_bertugas_karyawan" class="block text-sm font-medium text-gray-700 mb-1">Tgl Mulai Tugas</label>
                    <input type="date" name="tanggal_mulai_bertugas_karyawan" id="tanggal_mulai_bertugas_karyawan" value="{{ old('tanggal_mulai_bertugas_karyawan') }}" 
                           class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                </div>
                <div>
                    <label for="nomor_hp_karyawan" class="block text-sm font-medium text-gray-700 mb-1">Nomor HP</label>
                    <input type="tel" name="nomor_hp_karyawan" id="nomor_hp_karyawan" value="{{ old('nomor_hp_karyawan') }}" 
                           class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                </div>
                <div>
                    <label for="unit_kerja_karyawan" class="block text-sm font-medium text-gray-700 mb-1">Unit Kerja</label>
                    <input type="text" name="unit_kerja_karyawan" id="unit_kerja_karyawan" value="{{ old('unit_kerja_karyawan') }}" 
                           class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                </div>

                 <div>
                    <label for="foto_karyawan" class="block text-sm font-medium text-gray-700 mb-1">Foto Karyawan</label>
                    <input type="file" name="foto_karyawan" id="foto_karyawan" 
                           class="form-input mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 border border-gray-300">
                </div>
                <div>
                    <label for="dokumen_penerimaan_karyawan" class="block text-sm font-medium text-gray-700 mb-1">Dokumen Penerimaan</label>
                    <input type="file" name="dokumen_penerimaan_karyawan" id="dokumen_penerimaan_karyawan" 
                           class="form-input mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 border border-gray-300">
                </div>
            </div>

            <div class="mt-8 pt-6 border-t border-gray-200 flex justify-end space-x-3">
                <a href="{{ route('admin.penerimaan.index') }}" 
                   class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50">
                    Batal
                </a>
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                    Simpan Data Karyawan
                </button>
            </div>
        </form>
    </div>
@endsection