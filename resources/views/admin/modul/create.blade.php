@extends('partial.main')

@section('content')
<div class="rounded-lg">
    {{-- Breadcrumb --}}
    <div class="w-full items-center py-7">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{ route('modul-admin.index') }}"
                        class="inline-flex items-center text-lg font-medium text-gray-500">
                        Modul
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <a href="#" class="ms-1 text-lg font-medium text-custom-orange md:ms-2">Tambah Modul</a>
                    </div>
                </li>
            </ol>
        </nav>
    </div>

    <div class="rounded-lg">
        <div class="w-full p-7 bg-white rounded-xl flex-col items-start gap-9 inline-flex">
            <h1 class="text-2xl font-bold">
                Tambah Modul
            </h1>
            <form action="{{ route('modul-admin.store') }}" method="POST" enctype="multipart/form-data" class="w-full items-start">
                @csrf
                <div class="mb-5">
                    <label for="judul" class="block mb-2 text-sm font-medium text-gray-900 ">Judul Modul</label>
                    <input type="text" id="judul" name="judul" value="{{ old('judul') }}"
                        placeholder="Masukkan Judul Modul"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>
                <div class="mb-5">
                    <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900 ">Deskripsi Modul</label>
                    <textarea type="text" id="deskripsi" name="deskripsi"
                        value="{{ old('deskripsi') }}" placeholder="Masukkan Deskripsi Modul" rows="7"
                        class="block w-full p-2.5 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500"></textarea>
                </div>
                <div class="mb-5">
                    <label for="file-input" class="block mb-2 text-sm font-medium text-gray-900 ">Upload Modul</label>
                    <label for="file-input"
                        class="flex-shrink-0 w-full flex items-center gap-2.5 bg-neutral-50 rounded-lg border border-gray-300 overflow-hidden cursor-pointer">
                        <div class="px-4 py-2.5 bg-gray-100">
                            <div class="text-zinc-800 text-base font-medium leading-snug">Upload File</div>
                            <input id="file-input" name="file" type="file" class="hidden" value="{{ old('file') }}" />
                        </div>
                        <div class="flex-grow text-zinc-800 text-base font-normal leading-snug tracking-tight" id="file-name">
                            Belum ada file yang dipilih
                        </div>
                    </label>
                </div>
                <div class="pt-2 flex justify-end w-full">
                    <button type="submit"
                        class="text-white bg-custom-orange focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2">
                        Tambah Modul
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('file-input').addEventListener('change', function() {
        var fileName = this.files[0].name;
        var fileLabel = document.getElementById('file-name');
        fileLabel.textContent = fileName;
    });

    tinymce.init({
        selector: 'textarea',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount linkchecker',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });
</script>
@endsection
