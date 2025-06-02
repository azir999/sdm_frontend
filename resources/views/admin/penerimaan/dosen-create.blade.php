@extends('layouts.admin')

@section('title', 'Input Data Penerimaan Dosen')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-text-dark">Input Data Penerimaan Dosen</h1>
        <p class="text-sm text-text-muted">Sistem Informasi Sumber Daya Manusia</p>
    </div>

    <div class="bg-white shadow-lg rounded-lg p-6 md:p-8">
        <form action="{{ route('admin.penerimaan.dosen.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 gap-y-6"> 
                <div>
                    <label for="kode" class="block text-sm font-medium text-gray-700 mb-1">Kode <span class="text-red-500">*</span></label>
                    <input type="text" name="kode" id="kode" value="{{ old('kode') }}" 
                           class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:border-indigo-500 focus:ring-indigo-500 text-sm" required>
                </div>
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap <span class="text-red-500">*</span></label>
                    <input type="text" name="nama" id="nama" value="{{ old('nama') }}" 
                           class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:border-indigo-500 focus:ring-indigo-500 text-sm" required>
                </div>
                <div>
                    <label for="nidn" class="block text-sm font-medium text-gray-700 mb-1">NIDN</label>
                    <input type="text" name="nidn" id="nidn" value="{{ old('nidn') }}" 
                           class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                </div>
                <div>
                    <label for="nik" class="block text-sm font-medium text-gray-700 mb-1">NIK</label>
                    <input type="text" name="nik" id="nik" value="{{ old('nik') }}" 
                           class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                </div>
                <div>
                    <label for="nip" class="block text-sm font-medium text-gray-700 mb-1">NIP</label>
                    <input type="text" name="nip" id="nip" value="{{ old('nip') }}" 
                           class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                </div>
                <div>
                    <label for="no_npwp" class="block text-sm font-medium text-gray-700 mb-1">No NPWP</label>
                    <input type="text" name="no_npwp" id="no_npwp" value="{{ old('no_npwp') }}" 
                           class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email <span class="text-red-500">*</span></label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" 
                           class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:border-indigo-500 focus:ring-indigo-500 text-sm" required>
                </div>
                <div>
                    <label for="gelar_depan" class="block text-sm font-medium text-gray-700 mb-1">Gelar Depan</label>
                    <input type="text" name="gelar_depan" id="gelar_depan" value="{{ old('gelar_depan') }}" 
                           class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                </div>
                 <div>
                    <label for="gelar_belakang" class="block text-sm font-medium text-gray-700 mb-1">Gelar Belakang</label>
                    <input type="text" name="gelar_belakang" id="gelar_belakang" value="{{ old('gelar_belakang') }}" 
                           class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                </div>
                <div>
                    <label for="tempat_lahir" class="block text-sm font-medium text-gray-700 mb-1">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir') }}" 
                           class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                </div>
                <div>
                    <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}" 
                           class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                </div>
                 <div>
                    <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700 mb-1">Jenis Kelamin</label>
                    <select id="jenis_kelamin" name="jenis_kelamin" 
                            class="form-select mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                        <option value="">-Pilih-</option>
                        @foreach($jenisKelaminOptions ?? ['Laki Laki', 'Perempuan'] as $option)
                            <option value="{{ $option }}" {{ old('jenis_kelamin') == $option ? 'selected' : '' }}>{{ $option }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="golongan_darah" class="block text-sm font-medium text-gray-700 mb-1">Golongan Darah</label>
                    <input type="text" name="golongan_darah" id="golongan_darah" value="{{ old('golongan_darah') }}" 
                           class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                </div>
                <div>
                    <label for="agama" class="block text-sm font-medium text-gray-700 mb-1">Agama</label>
                    <input type="text" name="agama" id="agama" value="{{ old('agama') }}" 
                           class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                </div>
                <div>
                    <label for="nomor_hp" class="block text-sm font-medium text-gray-700 mb-1">Nomor HP</label>
                    <input type="tel" name="nomor_hp" id="nomor_hp" value="{{ old('nomor_hp') }}" 
                           class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                </div>
                <div>
                    <label for="fakultas" class="block text-sm font-medium text-gray-700 mb-1">Fakultas</label>
                    <input type="text" name="fakultas" id="fakultas" value="{{ old('fakultas') }}" 
                           class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                </div>
                <div>
                    <label for="program_studi" class="block text-sm font-medium text-gray-700 mb-1">Program Studi</label>
                    <input type="text" name="program_studi" id="program_studi" value="{{ old('program_studi') }}" 
                           class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                </div>
                <div>
                    <label for="bidang_ilmu_kompetensi" class="block text-sm font-medium text-gray-700 mb-1">Bidang Ilmu Kompetensi</label>
                    <input type="text" name="bidang_ilmu_kompetensi" id="bidang_ilmu_kompetensi" value="{{ old('bidang_ilmu_kompetensi') }}" 
                           class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                </div>
                 <div>
                    <label for="ikatan_kerja" class="block text-sm font-medium text-gray-700 mb-1">Ikatan Kerja</label>
                    <input type="text" name="ikatan_kerja" id="ikatan_kerja" value="{{ old('ikatan_kerja') }}" 
                           class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                </div>
                 <div>
                    <label for="tanggal_mulai_bertugas" class="block text-sm font-medium text-gray-700 mb-1">Tgl Mulai Tugas</label>
                    <input type="date" name="tanggal_mulai_bertugas" id="tanggal_mulai_bertugas" value="{{ old('tanggal_mulai_bertugas') }}" 
                           class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                </div>
                <div>
                    <label for="pendidikan_tertinggi" class="block text-sm font-medium text-gray-700 mb-1">Pend. Tertinggi</label>
                     <select id="pendidikan_tertinggi" name="pendidikan_tertinggi" 
                             class="form-select mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                        <option value="">-Pilih-</option>
                        @foreach($pendidikanOptions ?? [] as $option)
                            <option value="{{ $option }}" {{ old('pendidikan_tertinggi') == $option ? 'selected' : '' }}>{{ $option }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="jabatan_akademik" class="block text-sm font-medium text-gray-700 mb-1">Jab. Akademik</label>
                    <input type="text" name="jabatan_akademik" id="jabatan_akademik" value="{{ old('jabatan_akademik') }}" 
                           class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                </div>
                <div>
                    <label for="golongan_dosen" class="block text-sm font-medium text-gray-700 mb-1">Gol. Dosen</label>
                    <input type="text" name="golongan_dosen" id="golongan_dosen" value="{{ old('golongan_dosen') }}" 
                           class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                </div>
                <div>
                    <label for="status_aktivasi" class="block text-sm font-medium text-gray-700 mb-1">Status Aktivasi</label>
                    <select id="status_aktivasi" name="status_aktivasi" 
                            class="form-select mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                        @foreach($statusAktivasiOptions ?? ['aktif', 'nonaktif'] as $option)
                            <option value="{{ $option }}" {{ old('status_aktivasi') == $option ? 'selected' : '' }}>{{ ucfirst($option) }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="foto_dosen" class="block text-sm font-medium text-gray-700 mb-1">Foto Dosen</label>
                    <input type="file" name="foto_dosen" id="foto_dosen" 
                           class="form-input mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 border border-gray-300">
                </div>
                <div>
                    <label for="dokumen_penerimaan" class="block text-sm font-medium text-gray-700 mb-1">Dokumen Penerimaan</label>
                    <input type="file" name="dokumen_penerimaan" id="dokumen_penerimaan" 
                           class="form-input mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 border border-gray-300">
                </div>
            </div>

            <div class="mt-8 pt-6 border-t border-gray-200 flex justify-end space-x-3">
                <a href="{{ route('admin.penerimaan.index') }}" 
                   class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50">
                    Batal
                </a>
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                    Simpan Data Dosen
                </button>
            </div>
        </form>
    </div>
@endsection