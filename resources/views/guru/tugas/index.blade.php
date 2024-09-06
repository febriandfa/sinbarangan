@extends('partial.main')

@section('content')
<div class="px-4 rounded-lg mt-14">
    <div class="flex items-center justify-center mb-4 rounded-xl bg-white p-7">
        <table class="w-full text-base text-left text-black">
            <caption class=" pb-8 text-3xl font-bold text-left text-black bg-white">
                Tugas
            </caption>
            <thead class="bg-white border-b border-gray-400">
                <tr>
                    <th scope="col" class="px-8 py-3 text-center">
                        No
                    </th>
                    <th scope="col" class="px-8 py-3">
                        Judul Tugas
                    </th>
                    <th scope="col" class="px-8 py-3">
                        Tenggat Waktu
                    </th>
                    <th scope="col" class="px-8 py-3 text-center">
                        Hasil
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tugases as $index => $tugas)
                    <tr class="bg-white border-b border-black">
                        <td scope="row" class="px-8 py-4 text-center">
                            {{ $index + 1 }}
                        </td>
                        <td class="px-8 py-4">
                            {{ $tugas->nama }}
                        </td>
                        <td class="px-8 py-4">
                            {{ date('d/m/Y H:i', strtotime($tugas->deadline)) }} WIB
                        </td>
                        <td class="px-8 py-4 text-center">
                            <a href="{{ route('tugas-guru.show', $tugas->id) }}"
                                class="w-28 h-9 px-5 py-2 bg-custom-orange rounded-lg text-white text-sm font-medium  leading-tight">
                                Lihat Hasil
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
