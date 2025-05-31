@extends('layouts.admin')

@section('title', 'Input Data Wawancara')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-text-dark">Input Data Wawancara</h1>
        <p class="text-sm text-text-muted">Sistem Informasi Sumber Daya Manusia</p>
    </div>

    <div class="bg-white shadow-lg rounded-lg p-6 md:p-8">
        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="space-y-6">

                <div>
                    <label for="jabatan_pewawancara" class="block text-sm font-medium text-gray-700 mb-1">
                        Jabatan Pewawancara <span class="text-red-500">*</span>
                    </label>
                    <select id="jabatan_pewawancara" name="jabatan_pewawancara" 
                            class="form-select mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2 px-3">
                        <option value="">-Pilih Jabatan-</option>
                        @if(isset($jabatanOptions) && count($jabatanOptions) > 0)
                            @foreach($jabatanOptions as $jabatan)
                                <option value="{{ $jabatan }}">{{ $jabatan }}</option>
                            @endforeach
                        @else
                            <option value="manager_hrd">Manager HRD</option>
                            <option value="kepala_divisi">Kepala Divisi</option>
                            <option value="staff_rekrutmen">Staff Rekrutmen</option>
                        @endif
                    </select>
                </div>

                <div>
                    <label for="nama_pewawancara" class="block text-sm font-medium text-gray-700 mb-1">
                        Nama Pewawancara <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="nama_pewawancara" id="nama_pewawancara" 
                           class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2 px-3">
                </div>

                <div>
                    <label for="tanggal_wawancara" class="block text-sm font-medium text-gray-700 mb-1">
                        Tanggal Wawancara <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <input type="date" name="tanggal_wawancara" id="tanggal_wawancara" 
                               class="form-input block w-full sm:w-1/2 lg:w-1/3 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2 px-3">
                    </div>
                </div>

                <div>
                    <label for="dokumen_wawancara" class="block text-sm font-medium text-gray-700 mb-1">
                        Dokumen Wawancara <span class="text-red-500">*</span>
                    </label>
                    <div class="mt-1">
                        <input type="file" name="dokumen_wawancara" id="dokumen_wawancara" 
                               class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 border border-gray-300 rounded-md cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <p class="mt-1 text-xs text-gray-500">Pilih Dokumen Max. 10 MB</p>
                    </div>
                </div>

                <div>
                    <label for="kesimpulan_wawancara" class="block text-sm font-medium text-gray-700 mb-1">
                        Kesimpulan <span class="text-red-500">*</span>
                    </label>
                    <div class="mt-1">
                        <textarea id="kesimpulan_wawancara" name="kesimpulan_wawancara" rows="8" 
                                  class="form-textarea block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2 px-3"></textarea>
                    </div>
                </div>

                <div>
                    <label for="rekomendasi_wawancara" class="block text-sm font-medium text-gray-700 mb-1">
                        Rekomendasikan/Tidak <span class="text-red-500">*</span>
                    </label>
                    <select id="rekomendasi_wawancara" name="rekomendasi_wawancara" 
                            class="form-select mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2 px-3">
                        <option value="">-Pilih Rekomendasikan/Tidak-</option>
                        <option value="rekomendasikan">Rekomendasikan</option>
                        <option value="tidak_rekomendasikan">Tidak Rekomendasikan</option>
                    </select>
                </div>
            </div>

            <div class="mt-8 pt-6 border-t border-gray-200 flex justify-end space-x-3">
                <a href="{{ route('admin.perekrutan.index') }}" 
                class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Batal
                </a>
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Simpan
                </button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
@endpush