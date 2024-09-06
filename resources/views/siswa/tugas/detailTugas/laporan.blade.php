@extends('siswa.tugas.show')

@section('section')
    @php
        $userAnswers = $tugases->tugas_answers->where('user_id', Auth::user()->id)->first();
    @endphp

    <form action="{{ $userAnswers ? route('tugas.update', $userAnswers->id) : '#' }}" method="POST"
        enctype="multipart/form-data" class="w-full space-y-6">
        @csrf
        @method('PATCH')
        <div class="w-full flex flex-col justify-start items-start gap-2">
            <div class="mb-5 w-full">
                <label for="file_presentasi" class="text-zinc-800 text-xl font-medium leading-snug mb-2 block">Link
                    Demontrasi</label>
                <input type="text" id="file_presentasi" name="file_presentasi"
                    value="{{ $userAnswers ? $userAnswers->file_presentasi : old('file_presentasi') }}"
                    placeholder="Masukkan Link Demontrasi"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div>
        </div>
        <div class="w-full flex flex-col justify-start items-start gap-2">
            <div class="text-zinc-800 text-lg font-medium leading-relaxed">Laporan (Pdf)</div>
            <div class="flex-shrink-0 w-full flex items-center gap-2.5 bg-neutral-50 rounded-lg border border-gray-300">
                <label for="file-input-laporan"
                    class="flex-shrink-0 w-full flex items-center gap-2.5 bg-neutral-50 rounded-lg border border-gray-300 overflow-hidden cursor-pointer">
                    <div class="px-4 py-2.5 bg-gray-100">
                        <div class="text-zinc-800 text-base font-medium leading-snug">Upload File</div>
                        <input id="file-input-laporan" name="file_laporan" type="file" class="hidden"
                            value="{{ old('file_laporan') }}" />
                    </div>
                    <div class="flex-grow text-zinc-800 text-base font-normal leading-snug tracking-tight"
                        id="file-name-laporan">
                        {{ $userAnswers ? $userAnswers->file_laporan : 'Belum ada file yang dipilih' }}
                    </div>
                </label>
            </div>
        </div>
        <div class="flex justify-between w-full">
            <div class="pt-2 flex justify-start">
                <a href="{{ route('tugas.daftarTugas', $tugases->id) }}"
                    class="text-custom-orange bg-white border-2 border-orange-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2">
                    Sebelumnya
                </a>
            </div>
            {{-- @if ($userAnswers?->tugas_grades) --}}
            <div class="pt-2 flex justify-end">
                <a href="{{ route('tugas.feedback', $tugases->id) }}"
                    class="text-white bg-custom-orange focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2">
                    Selanjutnya
                </a>
            </div>
            {{-- @endif --}}
        </div>

        @php
            $currentDateTime = Carbon\Carbon::now();
            $deadline = Carbon\Carbon::parse($tugases->deadline);
            $isDeadline = $currentDateTime->greaterThanOrEqualTo($deadline);
        @endphp

        {{-- @if ($userAnswers && count($userAnswers->tugas_jobs) != 0) --}}
        <button type="Submit" {{ $isDeadline ? 'disabled' : '' }}
            class="text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center flex items-center justify-center w-fit mt-6 mx-auto {{ $isDeadline ? 'bg-gray-400 cursor-not-allowed' : 'bg-custom-orange cursor-pointer' }}">Simpan</button>
        {{-- @endif --}}
    </form>

    <script>
        console.log(@json($userAnswers))

        // document.getElementById('file-input-presentasi').addEventListener('change', function() {
        //     var fileNamePresentasi = this.files[0].name;
        //     var fileLabelPresentasi = document.getElementById('file-name-presentasi');
        //     fileLabelPresentasi.textContent = fileNamePresentasi;
        // });

        document.getElementById('file-input-laporan').addEventListener('change', function() {
            var fileNameLaporan = this.files[0].name;
            var fileLabelLaporan = document.getElementById('file-name-laporan');
            fileLabelLaporan.textContent = fileNameLaporan;
        });
    </script>
@endsection
