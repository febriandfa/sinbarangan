@extends('partial.main')

@section('content')
<div class="px-4 rounded-lg">
    <div class="w-full items-center py-7">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{ route('kelompok.index') }}" class="inline-flex items-center text-lg font-medium text-gray-500">
                        Kelompok
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <a href="#" class="ms-1 text-lg font-medium text-custom-orange md:ms-2">Detail Kelompok</a>
                    </div>
                </li>
            </ol>
        </nav>
    </div>

    <div class="flex items-center p-4 h-48 mb-4 rounded-xl bg-gray-50 bg-custom-orange justify-between">
        <div class="flex-col items-center text-white p-4">
            <h1 class="text-3xl font-semibold pb-2">Selamat datang di {{ $kelompoks->nama }}</h1>
            <p class="text-base font-reguler w-1/2">Cek selalu tugas kelompok, dan kerjakan dengan sesuai perintah
                secara bersama</p>
        </div>
        <div class="flex ml-auto p-4">
            <img src="{{ asset('assets/vector-kelompok-show.svg') }}" alt="vector">
        </div>
    </div>
    <div class="mb-4 rounded-xl bg-white p-7">
        <div class="flex justify-between items-center">
            <p class="text-left font-bold text-2xl">
                Kelompok
            </p>

            @php
                $memberId = $kelompoks->members->firstWhere('user_id', Auth::user()->id)->id;
                $memberLeader = $kelompoks->members->firstWhere('role', 'ketua');
            @endphp

            @if(!$memberLeader)
                <form action="{{ route('kelompok.leader', $memberId) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit"
                        class="block h-9 px-5 py-2 rounded-lg text-white text-sm font-medium leading-tight bg-custom-orange">Menjadi
                        Ketua</button>
                </form>
            @endif
        </div>
        <table class="w-full text-base text-left text-black mt-4">
            <thead class="bg-white border-b border-gray-400">
                <tr>
                    <th scope="col" class="px-12 py-4 text-center">
                        Nomor
                    </th>
                    <th scope="col" class="px-6 py-4">
                        Nama Anggota
                    </th>
                    <th scope="col" class="px-6 py-4">
                        Posisi
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($kelompoks->members as $index => $member)
                    <tr class="bg-white">
                        <td scope="row" class="px-6 py-4 text-center">
                            {{ $index + 1 }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $member->users->name }}
                        </td>
                        <td class="px-6 py-4 capitalize">
                            {{ $member->role }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @php
        $tugasProgres = $tugasAnswers->where('kelompok_id', $kelompoks->id);
    @endphp

    <div class="flex items-center justify-start mb-4 mt-14 rounded-xl bg-white p-7">
        <table class="w-full text-base text-left text-black">
            <caption class="text-left font-bold text-2xl mb-4">
                Tugas Kelompok Yang Sedang Dikerjakan
            </caption>
            <thead class="bg-white border-b border-gray-400">
                <tr>
                    <th scope="col" class="px-8 py-3 text-center">
                        No
                    </th>
                    <th scope="col" class="px-8 py-3">
                        Nama Tugas
                    </th>
                    <th scope="col" class="px-8 py-3 ">
                        Deadline
                    </th>
                    <th scope="col" class="px-8 py-3 ">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tugasProgres as $index => $tugas)
                    <tr class="bg-white">
                        <th scope="row" class="px-8 py-4 text-center">
                            {{ $index + 1 }}
                        </th>
                        <td class="px-8 py-4">
                            {{ $tugas->tugases->nama }}
                        </td>
                        <td class="px-8 py-4">
                            {{ date('d/m/Y H:i', strtotime($tugas->tugases->deadline)) }} WIB
                        </td>
                        <td class="px-8 py-4">
                            <a href="{{ route('tugas.rumusanMasalah', $tugas->tugas_id) }}"
                                class="px-5 py-2 bg-custom-orange rounded-lg text-white text-sm font-medium  leading-tight">
                                Lihat Tugas
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    console.log(@json($tugasProgres))

</script>
@endsection
