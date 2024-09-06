@extends('partial.main')

@section('content')
{{-- Breadcrumb --}}
<div class="px-4 rounded-lg pb-7">
    <div class="w-full items-center py-7">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{ route('guru.dashboard') }}"
                        class="inline-flex items-center text-lg font-medium text-gray-500">
                        Dashboard
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <a href="#" class="ms-1 text-lg font-medium text-custom-orange md:ms-2">Detail Data Siswa</a>
                    </div>
                </li>
            </ol>
        </nav>
    </div>

    <div class="w-full p-7 bg-white rounded-xl flex-col items-start gap-9 inline-flex">
        <h1 class="text-2xl font-bold">
            Detail Data Siswa
        </h1>
        <div class="w-full items-start grid grid-cols-3">
            <div class="col-span-1">
                <img src="{{ $users->foto ? asset('storage/profil/' . $users->foto) : asset('assets/profil-image.png') }}" alt="" class="rounded-full object-cover size-52">
            </div>
            <div class="col-span-2">
                <div class="mb-5">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Nama Lengkap</label>
                    <input type="text" id="name" name="name" value="{{ $users->name }}"
                        placeholder="Masukkan Nama Lengkap Siswa" disabled
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>
                <div class="mb-5">
                    <label for="kelas" class="block mb-2 text-sm font-medium text-gray-900 ">Kelas (11 TKJ A / 11 TKJ B)</label>
                    <input type="text" id="kelas" name="kelas" value="{{ $users->kelas }}"
                        placeholder="Masukkan Kelas Siswa" disabled
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>
                <div class="mb-5">
                    <label for="no_absen" class="block mb-2 text-sm font-medium text-gray-900 ">No Absen</label>
                    <input type="text" id="no_absen" name="no_absen" value="{{ $users->no_absen }}"
                        placeholder="Masukkan No Absen Siswa" disabled
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>
                <div class="mb-5">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Email</label>
                    <input type="email" id="email" name="email" value="{{ $users->email }}"
                        placeholder="Masukkan Email Siswa" disabled
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('file-input').addEventListener('change', function() {
        var fileName = this.files[0].name;
        var fileLabel = document.getElementById('file-name');
        fileLabel.textContent = fileName;
    });
</script>
@endsection
