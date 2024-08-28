@extends('siswa.tugas.show')

@section('section')
    <div class="w-full">
        @php
            // Mengambil data anggota kelompok pengguna yang sedang login
            $user = Auth::user();
            $kelompokId = $user->members->kelompok_id; // Ambil ID kelompok pengguna
            $kelompokAnswers = $tugases->tugas_answers->where('kelompok_id', $kelompokId);

            // Memeriksa apakah pengguna memiliki jawaban atau kelompok memiliki jawaban
            $userAnswers = $kelompokAnswers->where('user_id', $user->id)->first();
        @endphp

        <div class="flex-col items-center justify-center mb-4 rounded-xl bg-white p-7">
            <div class="flex justify-between items-center p-2 mb-4">
                <h1 class="text-2xl font-bold">
                    Tugas Kelompok
                </h1>

                @php
                    $currentDateTime = Carbon\Carbon::now();
                    $deadline = Carbon\Carbon::parse($tugases->deadline);
                    $isDeadline = $currentDateTime->greaterThanOrEqualTo($deadline);
                @endphp

                {{-- @if ($userAnswers && $users->members->role == 'ketua') --}}
                @if ($users->members->role == 'ketua')
                    <a href="{{ $isDeadline ? '#' : route('tugas-job.create', $tugases->id) }}"
                        class="text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 {{ $isDeadline ? 'bg-gray-400 cursor-not-allowed' : 'bg-custom-orange cursor-pointer' }}">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15 10.625H5C4.65833 10.625 4.375 10.3417 4.375 10C4.375 9.65833 4.65833 9.375 5 9.375H15C15.3417 9.375 15.625 9.65833 15.625 10C15.625 10.3417 15.3417 10.625 15 10.625Z"
                                fill="#F6F7F9" />
                            <path
                                d="M10 15.125C9.96985 15.125 9.93857 15.1127 9.91293 15.0871C9.88728 15.0614 9.875 15.0301 9.875 15V5C9.875 4.96985 9.88728 4.93857 9.91293 4.91293C9.93857 4.88728 9.96985 4.875 10 4.875C10.0301 4.875 10.0614 4.88728 10.0871 4.91293C10.1127 4.93857 10.125 4.96985 10.125 5V15C10.125 15.0301 10.1127 15.0614 10.0871 15.0871C10.0614 15.1127 10.0301 15.125 10 15.125Z"
                                fill="#F6F7F9" stroke="#F6F7F9" />
                        </svg>
                        Tambah Tugas
                    </a>
                @endif
            </div>
            <table class="w-full text-base text-left text-black">
                <thead class="bg-white border-b border-gray-400">
                    <tr>
                        <th scope="col" class="px-8 py-3 text-center">
                            Status
                        </th>
                        <th scope="col" class="px-8 py-3 text-center">
                            No
                        </th>
                        <th scope="col" class="px-8 py-3">
                            Nama Kelompok
                        </th>
                        <th scope="col" class="px-8 py-3">
                            Dikerjakan Oleh
                        </th>
                        <th scope="col" class="px-8 py-3 text-center">
                            Deadline
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($kelompokAnswers->isNotEmpty())
                        @foreach ($kelompokAnswers as $kelompokAnswer)
                            @foreach ($kelompokAnswer->tugas_jobs as $index => $job)
                                <tr class="bg-white">
                                    <th scope="row" class="px-8 py-4 justify-center items-center text-center">
                                        <div class="flex items-center justify-center">
                                            <form action="{{ route('tugas-job.updateStatus', $job->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" id="status" name="status"
                                                    value="{{ $job->status == 'progres' ? 'selesai' : 'progres' }}">
                                                <input id="checkbox-all-search"
                                                    {{ $job->status == 'selesai' ? 'checked' : '' }}
                                                    onchange="this.form.submit()" type="checkbox"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                                                <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                            </form>
                                        </div>
                                    </th>
                                    <th scope="row" class="px-8 py-4 text-center">
                                        {{ $index + 1 }}
                                    </th>
                                    <td class="px-8 py-4">
                                        {{ $job->nama }}
                                    </td>
                                    <td class="px-8 py-4">
                                        {{-- {{ $kelompokAnswer->user->name }} Menampilkan nama anggota kelompok --}}
                                    </td>
                                    <td class="px-8 py-4 text-center font-semibold">
                                        {{ date('d/m/Y H:i', strtotime($job->deadline)) }}
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <div class="flex justify-between w-full">
        <div class="pt-2 flex justify-start">
            <a href="{{ route('tugas.rumusanMasalah', $tugases->id) }}"
                class="text-custom-orange bg-white border-2 border-orange-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2">
                Sebelumnya
            </a>
        </div>
        <div class="pt-2 flex justify-end">
            <a href="{{ route('tugas.laporan', $tugases->id) }}"
                class="text-white bg-custom-orange focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2">
                Selanjutnya
            </a>
        </div>
    </div>

    <script></script>

@endsection
