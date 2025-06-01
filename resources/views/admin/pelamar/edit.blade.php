{{-- resources/views/admin/pelamar/edit.blade.php --}}
@extends('layouts.admin')

@section('title', 'Update Data Pelamar')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-text-dark">Update Data Pelamar</h1>
        <p class="text-sm text-text-muted">Sistem Informasi Sumber Daya Manusia</p>
    </div>

    <div class="bg-white shadow-lg rounded-lg p-6 md:p-8">
        @if(isset($pelamar))
            <form action="{{ route('admin.pelamar.update', $pelamar->id_dummy) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 gap-y-6">

                    <div>
                        <label for="nama_pelamar" class="block text-sm font-medium text-gray-700 mb-1">
                            Nama <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="nama_pelamar" id="nama_pelamar" value="{{ old('nama_pelamar', $pelamar->nama_pelamar ?? '') }}"
                               class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2 px-3">
                    </div>

                    <div>
                        <label for="nidn" class="block text-sm font-medium text-gray-700 mb-1">
                            NIDN <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="nidn" id="nidn" value="{{ old('nidn', $pelamar->nidn ?? '') }}"
                               class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2 px-3">
                    </div>

                    <div>
                        <label for="tempat_lahir" class="block text-sm font-medium text-gray-700 mb-1">
                            Tempat Lahir <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir', $pelamar->tempat_lahir ?? '') }}"
                               class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2 px-3">
                    </div>

                    <div>
                        <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700 mb-1">
                            Tanggal Lahir <span class="text-red-500">*</span>
                        </label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir', $pelamar->tanggal_lahir ?? '') }}"
                               class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2 px-3">
                    </div>
                    
                    <div>
                        <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700 mb-1">
                            Jenis Kelamin <span class="text-red-500">*</span>
                        </label>
                        <select id="jenis_kelamin" name="jenis_kelamin" 
                                class="form-select mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2 px-3">
                            <option value="">-Pilih Jenis Kelamin-</option>
                            @foreach($jenisKelaminOptions ?? ['Laki-laki', 'Perempuan', 'Helikopter'] as $option)
                                <option value="{{ strtolower(str_replace(' ', '_', $option)) }}" 
                                        {{ old('jenis_kelamin', $pelamar->jenis_kelamin ?? '') == strtolower(str_replace(' ', '_', $option)) ? 'selected' : '' }}>
                                    {{ $option }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="email_pelamar" class="block text-sm font-medium text-gray-700 mb-1">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <input type="email" name="email_pelamar" id="email_pelamar" value="{{ old('email_pelamar', $pelamar->email_pelamar ?? '') }}"
                               class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2 px-3">
                    </div>

                    <div>
                        <label for="alamat_pelamar" class="block text-sm font-medium text-gray-700 mb-1">
                            Alamat <span class="text-red-500">*</span>
                        </label>
                        <textarea id="alamat_pelamar" name="alamat_pelamar" rows="3" 
                                  class="form-textarea mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2 px-3">{{ old('alamat_pelamar', $pelamar->alamat_pelamar ?? '') }}</textarea>
                    </div>

                    <div>
                        <label for="pendidikan_terakhir" class="block text-sm font-medium text-gray-700 mb-1">
                            Pendidikan Terakhir <span class="text-red-500">*</span>
                        </label>
                        <select id="pendidikan_terakhir" name="pendidikan_terakhir" 
                                class="form-select mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2 px-3">
                            <option value="">-Pilih Pendidikan terakhir-</option>
                             @foreach($pendidikanOptions ?? [] as $option)
                                <option value="{{ $option }}" {{ old('pendidikan_terakhir', $pelamar->pendidikan_terakhir ?? '') == $option ? 'selected' : '' }}>
                                    {{ $option }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="usia" class="block text-sm font-medium text-gray-700 mb-1">
                            Usia <span class="text-red-500">*</span>
                        </label>
                        <input type="number" name="usia" id="usia" min="0" value="{{ old('usia', $pelamar->usia ?? '') }}"
                               class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2 px-3">
                    </div>

                    <div>
                        <label for="no_hp" class="block text-sm font-medium text-gray-700 mb-1">
                            No HP <span class="text-red-500">*</span>
                        </label>
                        <input type="tel" name="no_hp" id="no_hp" value="{{ old('no_hp', $pelamar->no_hp ?? '') }}"
                               class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2 px-3">
                    </div>

                    <div>
                        <label for="ipk" class="block text-sm font-medium text-gray-700 mb-1">
                            IPK <span class="text-red-500">*</span>
                        </label>
                        <input type="number" name="ipk" id="ipk" step="0.01" min="0" max="4" value="{{ old('ipk', $pelamar->ipk ?? '') }}"
                               class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2 px-3">
                    </div>
                    
                    <div>
                        <label for="bidang_ilmu" class="block text-sm font-medium text-gray-700 mb-1">
                            Bidang Ilmu Kompetensi <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="bidang_ilmu" id="bidang_ilmu" value="{{ old('bidang_ilmu', $pelamar->bidang_ilmu ?? '') }}"
                               class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2 px-3">
                    </div>

                    <div>
                        <label for="pilihan_lamaran" class="block text-sm font-medium text-gray-700 mb-1">
                            Pilihan Lamaran <span class="text-red-500">*</span>
                        </label>
                        <select id="pilihan_lamaran" name="pilihan_lamaran" 
                                class="form-select mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2 px-3">
                            <option value="">-Dosen/Karyawan-</option>
                             @foreach($pilihanLamaranOptions ?? [] as $option)
                                <option value="{{ strtolower(str_replace(' ', '_', $option)) }}" 
                                        {{ old('pilihan_lamaran', $pelamar->pilihan_lamaran ?? '') == strtolower(str_replace(' ', '_', $option)) ? 'selected' : '' }}>
                                    {{ $option }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="tanggal_lamaran" class="block text-sm font-medium text-gray-700 mb-1">
                            Tanggal Lamaran <span class="text-red-500">*</span>
                        </label>
                        <input type="date" name="tanggal_lamaran" id="tanggal_lamaran" value="{{ old('tanggal_lamaran', $pelamar->tanggal_lamaran ?? '') }}"
                               class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2 px-3">
                    </div>

                    <div>
                        <label for="dokumen_lamaran" class="block text-sm font-medium text-gray-700 mb-1">
                            Dokumen Lamaran <span class="text-red-500">*</span>
                            @if(isset($pelamar->nama_dokumen_lama))
                                <span class="text-xs text-gray-500">(File saat ini: {{ $pelamar->nama_dokumen_lama }}) Kosongkan jika tidak ingin mengubah.</span>
                            @endif
                        </label>
                        <div class="mt-1">
                            <input type="file" name="dokumen_lamaran" id="dokumen_lamaran" 
                                   class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 border border-gray-300 rounded-md cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <p class="mt-1 text-xs text-gray-500">Pilih Dokumen Max. 10 MB.</p>
                        </div>
                    </div>

                </div>

                <div class="mt-8 pt-6 border-t border-gray-200 flex justify-end space-x-3">
                    <a href="{{ route('admin.perekrutan.index') }}" 
                       class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Batal
                    </a>
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Update Data
                    </button>
                </div>
            </form>
        @else
            <p class="text-center text-gray-500">Data pelamar tidak ditemukan.</p>
        @endif
    </div>
@endsection

@push('scripts')
@endpush