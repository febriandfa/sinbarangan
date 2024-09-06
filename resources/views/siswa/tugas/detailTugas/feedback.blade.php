@extends('siswa.tugas.show')

@section('section')
    @php
        $userAnswers = $tugases->tugas_answers->where('user_id', Auth::user()->id)->first();
        // $users =  Auth::user()->where('id', Auth::user()->id)->with(['members'])->first();
        // $kelompokAnswers = $tugases->tugas_answers->where('kelompok_id', Auth::user()->members->kelompok_id)->first();
        // $answers = $userAnswers ? $userAnswers : $kelompokAnswers;
    @endphp

    <div class="self-stretch flex flex-col justify-start items-start gap-2">
        <span class="text-zinc-800 text-lg font-medium font-Poppins leading-relaxed">Nilai</span>
        <div class="flex w-full bg-neutral-50 rounded-lg text-left">
            <div
                class="block w-full p-4 py-4 text-gray-900 border justify-start border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500">
                @if (isset($userAnswers->tugas_grades->nilai))
                    {{ $userAnswers->tugas_grades->nilai }}
                @else
                    <span class="text-gray-500">Belum dinilai</span>
                @endif
            </div>
        </div>
    </div>
    <div class="self-stretch flex flex-col justify-start items-start gap-2">
        <span class="text-zinc-800 text-lg font-medium font-Poppins leading-relaxed">Feedback Tugas</span>
        <div class="flex w-full bg-neutral-50 rounded-lg text-left">
            <div
                class="block w-full p-4 text-gray-900 border justify-start border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500">
                @if (isset($userAnswers->tugas_grades->feedback))
                    <div class="prose">
                        {!! $userAnswers->tugas_grades->feedback !!}
                    </div>
                @else
                    <span class="text-gray-500">Belum ada feedback</span>
                @endif
            </div>
        </div>
    </div>
    <div class="flex justify-between w-full">
        <div class="pt-2 flex justify-start">
            <a href="{{ route('tugas.laporan', $tugases->id) }}"
                class="text-custom-orange bg-white border-2 border-orange-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2">
                sebelumnya
            </a>
        </div>
    </div>

    <script>
        console.log(@json($userAnswers))
    </script>
@endsection
