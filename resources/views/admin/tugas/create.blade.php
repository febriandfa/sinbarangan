@extends('partial.main')

@section('content')
<div class="rounded-lg">
    {{-- Breadcrumb --}}
    <div class="w-full items-center py-7">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{ route('tugas-admin.index') }}"
                        class="inline-flex items-center text-lg font-medium text-gray-500">
                        Tugas
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <a href="#" class="ms-1 text-lg font-medium text-custom-orange md:ms-2">Tambah Tugas</a>
                    </div>
                </li>
            </ol>
        </nav>
    </div>

    <div class="rounded-lg">
        <div class="w-full p-7 bg-white rounded-xl flex-col items-start gap-9 inline-flex">
            <h1 class="text-2xl font-bold">
                Tambah Tugas
            </h1>
            <form action="{{ route('tugas-admin.store') }}" method="POST" class="w-full items-start">
                @csrf
                @method('POST')
                <div class="mb-5">
                    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 ">Nama Tugas</label>
                    <input type="text" id="nama" name="nama" value="{{ old('nama') }}"
                        placeholder="Masukkan Nama Tugas"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>
                <div class="mb-5">
                    <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900 ">Deskripsi Tugas</label>
                    <textarea type="text" id="deskripsi" name="deskripsi"
                        value="{{ old('deskripsi') }}" placeholder="Masukkan Deskripsi Modul" rows="7"
                        class="block w-full p-2.5 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500"></textarea>
                </div>
                <div class="mb-5">
                    <label for="deadline" class="block mb-2 text-sm font-medium text-gray-900 ">Tenggat Tugas</label>
                    <input type="datetime-local" id="deadline" name="deadline"
                        value="{{ old('deadline') }}" placeholder="Masukkan Tenggat Tugas"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>
                <div class="pt-2 flex justify-end w-full">
                    <button type="submit"
                        class="text-white bg-custom-orange focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2">
                        Tambah Tugas
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount linkchecker',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });
    </script>
@endsection
