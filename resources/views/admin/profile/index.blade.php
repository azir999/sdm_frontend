@extends('layouts.admin')

@section('title', 'Profil Pengguna')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-text-dark">Profil</h1>
        <p class="text-sm text-text-muted">Sistem Informasi Sumber Daya Manusia</p>
    </div>

    @if(session('success'))
        <div class="mb-4 p-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if($errors->any())
        <div class="mb-4 p-4 text-sm text-red-700 bg-red-100 rounded-lg" role="alert">
            <strong class="font-bold">Oops!</strong> Ada beberapa masalah dengan input Anda:
            <ul class="mt-1 list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="bg-white shadow-lg rounded-lg p-6 md:p-8">
        <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8 items-start">
                {{-- Kolom Kiri: Avatar dan Upload --}}
                <div class="md:col-span-1 flex flex-col items-center space-y-4">
                    <img class="rounded-full h-36 w-36 object-cover border-4 border-gray-200 shadow-sm" 
                         src="{{ asset('images/pp.png') }}" 
                         alt="Foto Profil {{ $user->name ?? 'Pengguna' }}">
                    
                    <div>
                        <label for="profile_photo" class="block text-sm font-medium text-gray-700 mb-1 text-center">
                            Ganti Foto Profil
                        </label>
                        <input type="file" name="profile_photo" id="profile_photo" 
                               class="block w-full max-w-xs mx-auto text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 border border-gray-300 rounded-md cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <p class="mt-1 text-xs text-gray-500 text-center">File Png, Jpg, Max. 2MB</p>
                    </div>
                    <button type="submit" class="w-full max-w-xs mx-auto bg-[#1D3F8E] hover:bg-blue-800 text-white font-semibold py-2 px-4 rounded-md shadow-sm">
                        Simpan Perubahan
                    </button>
                </div>

                <div class="md:col-span-2 space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-500">NAMA</label>
                        <p class="mt-1 text-xl md:text-2xl font-semibold text-text-dark">{{ $user->name ?? 'Nama Pengguna' }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Role</label>
                        <p class="mt-1 text-lg text-text-dark">{{ $user->role_display ?? 'Belum ada role' }}</p>
                    </div>
    
              
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <p class="mt-1 text-lg text-text-dark">admin@binadarma.ac.id</p>
                    </div>
                </div>
            </div>

            <div class="mt-8 pt-6 border-t border-gray-200 flex justify-end space-x-3">
                <a href="{{ route('admin.dashboard') }}" 
                   class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Kembali
                </a>
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const profilePhotoInput = document.getElementById('profile_photo');
    const profileImage = document.querySelector('img[alt^="Foto Profil"]');
    if (profilePhotoInput && profileImage) {
        profilePhotoInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    profileImage.src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });
    }
});
</script>
@endpush