@extends('partial.main')

@section('content')
    <div class="px-4 pb-7">
        <div class="w-full items-center py-7">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="{{ route('tugas-admin.index') }}"
                            class="inline-flex items-center text-lg font-medium text-gray-500">
                            Tugas
                        </a>
                    </li>
                    <li class="flex items-center">
                        <svg class="w-3 h-3 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <a href="{{ route('tugas-admin.show', $tugasAnswers->tugas_id) }}"
                            class="text-lg font-medium text-gray-500">
                            Detail Tugas
                        </a>
                    </li>
                    <li class="flex items-center">
                        <svg class="w-3 h-3 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <a href="#"
                            class="text-lg font-medium text-custom-orange">{{ $tugasAnswers->users->name }}</a>
                    </li>
                </ol>
            </nav>
        </div>

        <div class="p-6 bg-neutral-50 rounded-md flex flex-col justify-start items-start gap-6">
            <div class="flex flex-col justify-center items-start gap-1.5">
                <div class="text-zinc-800 text-lg font-medium leading-relaxed">Nama Siswa</div>
                <div class="text-zinc-800 text-lg font-normal leading-relaxed">{{ $tugasAnswers->users->name }}</div>
            </div>
            <div class="flex flex-col justify-center items-start gap-1.5">
                <div class="text-zinc-800 text-lg font-medium leading-relaxed">Tugas</div>
                <div class="text-zinc-800 text-lg font-normal leading-relaxed">{{ $tugasAnswers->tugases->nama }}</div>
            </div>
            <div class="flex flex-col justify-center items-start gap-1.5">
                <div class="text-zinc-800 text-lg font-medium leading-relaxed">Deadline</div>
                <div class="text-red-500 text-lg font-medium leading-relaxed">{{ $tugasAnswers->tugases->deadline }}
                </div>
            </div>
            <div class="flex flex-col justify-center items-start gap-1.5">
                <div class="text-zinc-800 text-lg font-medium leading-relaxed">Rumusan Masalah</div>
                <div class="text-slate-500 text-lg font-normal leading-relaxed">
                    <div class="prose">
                        {!! $tugasAnswers->rumusan_masalah !!}
                    </div>
                </div>
            </div>
            <div class="flex flex-col justify-start items-start gap-2 w-full">
                <div class="text-zinc-800 text-lg font-medium leading-relaxed">Berkas Presentasi</div>
                <div>
                    <a href="{{ $tugasAnswers->file_presentasi }}" target="_blank">{{ $tugasAnswers->file_presentasi }}</a>
                </div>
            </div>
            <div class="flex flex-col justify-start items-start gap-2 w-full">
                <div class="text-zinc-800 text-lg font-medium leading-relaxed">Laporan</div>
                <div class="flex-shrink-0 w-full flex items-center gap-2.5 bg-neutral-50 rounded-lg border border-gray-300">
                    <div class="px-4 py-3 bg-gray-100 rounded">
                        <div class="text-zinc-800 text-base font-medium leading-snug">
                            @if ($tugasAnswers->file_laporan)
                                <a href="{{ asset('storage/tugasAnswer/laporan/' . $tugasAnswers->file_laporan) }}"
                                    target="_blank">Lihat
                                    File</a>
                            @else
                                Belum Mengumpulkan
                            @endif
                        </div>
                    </div>
                    <div class="flex-grow text-zinc-800 text-base font-normal leading-snug tracking-tight">
                        {{ $tugasAnswers->file_laporan ? $tugasAnswers->file_laporan : 'Belum Mengumpulkan' }}
                    </div>
                </div>
            </div>
            <form action="{{ route('tugas-admin.nilai') }}" method="POST" class="w-full flex flex-col gap-6">
                @csrf
                <input type="hidden" id="tugas_answer_id" name="tugas_answer_id" value="{{ $tugasAnswers->id }}">
                <div class="flex flex-col justify-start items-start gap-2">
                    <div class="text-zinc-800 text-lg font-medium leading-relaxed">Nilai</div>
                    <input type="number" id="nilai" name="nilai"
                        value="{{ $tugasAnswers->tugas_grades ? $tugasAnswers->tugas_grades?->nilai : old('nilai') }}"
                        placeholder="Masukkan Nilai Tugas"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>
                <div class="flex flex-col justify-start items-start gap-2">
                    <div class="text-zinc-800 text-lg font-medium leading-relaxed">Feedback Tugas</div>
                    <textarea type="text" id="feedback" name="feedback"
                        value="{{ $tugasAnswers->tugas_grades ? $tugasAnswers->tugas_grades?->feedback : old('feedback') }}"
                        placeholder="Masukkan Feedback Tugas" rows="7"
                        class="block w-full p-2.5 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500">{{ $tugasAnswers->tugas_grades ? $tugasAnswers->tugas_grades?->feedback : old('feedback') }}</textarea>
                </div>
                @if (!$tugasAnswers->tugas_grades)
                    <div class="flex flex-col justify-center items-end w-full gap-2.5">
                        <button type="submit"
                            class="px-8 py-4 bg-orange-500 rounded-xl justify-center items-center gap-3 inline-flex text-neutral-50 text-base font-medium leading-snug">
                            Submit
                        </button>
                    </div>
                @endif
            </form>
        </div>
    </div>

    <script>
        console.log(@json($tugasAnswers))
    </script>
@endsection
