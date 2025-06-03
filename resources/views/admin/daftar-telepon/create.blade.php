@extends('layouts.admin')

@section('title', 'Tambah Data Telepon Baru')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-text-dark">Tambah Data Telepon Baru</h1>
        <p class="text-sm text-text-muted">Masukkan informasi kontak pegawai.</p>
    </div>

    <div class="bg-white shadow-lg rounded-lg p-6 md:p-8">
        <form action="{{ route('admin.daftar-telepon.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 gap-y-6">

                <div>
                    <label for="kode_pegawai" class="block text-sm font-medium text-gray-700 mb-1">
                        Kode Pegawai <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="kode_pegawai" id="kode_pegawai" value="{{ old('kode_pegawai') }}" 
                           class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:border-indigo-500 focus:ring-indigo-500 text-sm" required>
                </div>

                <div>
                    <label for="nama_pegawai" class="block text-sm font-medium text-gray-700 mb-1">
                        Nama Pegawai <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="nama_pegawai" id="nama_pegawai" value="{{ old('nama_pegawai') }}" 
                           class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:border-indigo-500 focus:ring-indigo-500 text-sm" required>
                </div>
                
                <div>
                    <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700 mb-1">
                        Jenis Kelamin <span class="text-red-500">*</span>
                    </label>
                    <select id="jenis_kelamin" name="jenis_kelamin" 
                            class="form-select mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:border-indigo-500 focus:ring-indigo-500 text-sm" required>
                        <option value="">-Pilih Jenis Kelamin-</option>
                        @foreach($jenisKelaminOptions ?? ['Laki Laki', 'Perempuan'] as $option)
                            <option value="{{ $option }}" {{ old('jenis_kelamin') == $option ? 'selected' : '' }}>{{ $option }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="jenis_pegawai" class="block text-sm font-medium text-gray-700 mb-1">
                        Jenis Pegawai <span class="text-red-500">*</span>
                    </label>
                    <select id="jenis_pegawai" name="jenis_pegawai" 
                            class="form-select mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:border-indigo-500 focus:ring-indigo-500 text-sm" required>
                        <option value="">-Pilih Jenis Pegawai-</option>
                        @foreach($jenisPegawaiOptions ?? ['Dosen', 'Karyawan'] as $option)
                            <option value="{{ $option }}" {{ old('jenis_pegawai') == $option ? 'selected' : '' }}>{{ $option }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="no_hp" class="block text-sm font-medium text-gray-700 mb-1">
                        No HP <span class="text-red-500">*</span>
                    </label>
                    <input type="tel" name="no_hp" id="no_hp" value="{{ old('no_hp') }}" 
                           class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:border-indigo-500 focus:ring-indigo-500 text-sm"
                           placeholder="Contoh: 081234567890" required>
                </div>

            </div>

            <div class="mt-8 pt-6 border-t border-gray-200 flex justify-end space-x-3">
                <a href="{{ route('admin.daftar-telepon.index') }}" 
                   class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Batal
                </a>
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Simpan Data Telepon
                </button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
@endpush
