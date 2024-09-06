@extends('partial.main')

@section('content')
<div class="rounded-lg">
    <div class="w-full items-center py-7">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{ route('tugas.index') }}"
                        class="inline-flex items-center text-lg font-medium text-gray-500">
                        Tugas
                    </a>
                </li>
                <li class="flex items-center">
                    <svg class="w-3 h-3 text-gray-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 9 4-4-4-4" />
                    </svg>
                    <a href="{{ route('tugas.daftarTugas', $tugases->id) }}"
                        class="text-lg font-medium text-gray-500">
                        Detail Tugas
                    </a>
                </li>
                <li class="flex items-center">
                    <svg class="w-3 h-3 text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <a href="#" class="text-lg font-medium text-custom-orange">Tambah Tugas</a>
                </li>
            </ol>
        </nav>
    </div>

    <div class="w-full p-7 bg-white rounded-xl flex-col items-start gap-2 flex">
        <h1 class="text-2xl font-bold">
            Tambah Tugas Kelompok
        </h1>
        <form action="{{ route('tugas-job.store') }}" method="POST" class="w-full items-start mt-4">
            @csrf
            <input type="hidden" id="tugas_answer_id" name="tugas_answer_id" value="{{ $tugasAnswers->id }}">
            <div class="mb-5">
                <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 ">Nama Tugas</label>
                <input type="text" id="nama" name="nama" value="{{ old('nama') }}"
                    placeholder="Masukkan Nama Tugas"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div>
            <div class="mb-5">
                <label for="user_id" class="block mb-2 text-sm font-medium text-gray-900">Anggota</label>
                <select id="user_id" name="user_id"
                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Pilih Anggota Kelompok</option>
                    @foreach ($kelompoks->members as $member)
                        <option id="user_id" name="user_id" value="{{ $member->user_id }}">{{ $member->users->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-5">
                <label for="deadline" class="block mb-2 text-sm font-medium text-gray-900 ">Deadline</label>
                <input type="datetime-local" id="deadline" name="deadline" value="{{ old('deadline') }}"
                    class="w-full shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5"
                    required />
            </div>
            <div class="pt-2 flex justify-end w-full">
                <button
                    type="submit"
                    {{-- href="{{ route('siswa.kelompok.ketua.detail') }}" --}}
                    class="text-white bg-custom-orange focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2">
                    Tambah Tugas
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    console.log(@json($tugases))
    console.log(@json($tugasAnswers))
    console.log(@json($kelompoks))
    console.log(@json($users))
</script>
@endsection
