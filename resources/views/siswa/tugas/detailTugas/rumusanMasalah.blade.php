@extends('siswa.tugas.show')

@section('section')

    @php
        $userAnswers = $tugases->tugas_answers->where('user_id', Auth::user()->id)->first();
        // $users =  Auth::user()->where('id', Auth::user()->id)->with(['members'])->first();
        // $kelompokAnswers = $tugases->tugas_answers->where('kelompok_id', Auth::user()->members->kelompok_id)->first();
        // $answers = $userAnswers ? $userAnswers : $kelompokAnswers;
    @endphp

<form action="{{ $userAnswers ? route('tugas.update', $userAnswers->id) : route('tugas.store') }}" method="POST" class="w-full">
@csrf
@method($userAnswers ? 'PATCH' : 'POST')
    <input type="hidden" id="tugas_id" name="tugas_id" value="{{ $tugases->id }}">
    <div class="self-stretch flex flex-col justify-start items-start gap-2">
        <span class="text-zinc-800 text-lg font-medium font-Poppins leading-relaxed">Rumusan Masalah</span>
        <div class="w-full">
            <textarea type="text" id="rumusan_masalah" name="rumusan_masalah"
                value="{{ old('rumusan_masalah') }}" placeholder="Jelaskan Rumusan Masalah" rows="7"
                class="block w-full p-2.5 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500">{{ $userAnswers ? $userAnswers->rumusan_masalah : old('rumusan_masalah') }}</textarea>
        </div>
    </div>
    <div class="pt-2 flex justify-end w-full">
        <a href="{{ route('tugas.daftarTugas', $tugases->id) }}"
            class="text-white bg-custom-orange focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2">
            Selanjutnya
        </a>
    </div>

    @php
        $currentDateTime =  Carbon\Carbon::now();
        $deadline = Carbon\Carbon::parse($tugases->deadline);
        $isDeadline = $currentDateTime->greaterThanOrEqualTo($deadline);
        // $showButton = !$kelompokAnswers || (Auth::user()->id === $kelompokAnswers->user_id);
    @endphp

    {{-- @if ($showButton) --}}
        <button type="Submit" {{ $isDeadline ? "disabled" : "" }} class="text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center flex items-center justify-center w-fit mt-6 mx-auto {{ $isDeadline ? "bg-gray-400 cursor-not-allowed" : "bg-custom-orange cursor-pointer" }}">Simpan</button>
    {{-- @endif --}}
</form>

<script>
    console.log(@json($userAnswers))
    tinymce.init({
        selector: 'textarea',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount linkchecker',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });
</script>
@endsection
