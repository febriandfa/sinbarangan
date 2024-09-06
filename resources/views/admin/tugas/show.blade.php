@extends('partial.main')

@section('content')
<div class="px-4 rounded-lg">
    <div class="w-full items-center py-7">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{ route('tugas-admin.index') }}" class="inline-flex items-center text-lg font-medium text-gray-500">
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
                        <a href="#" class="ms-1 text-lg font-medium text-custom-orange md:ms-2">Detail Tugas</a>
                    </div>
                </li>
            </ol>
        </nav>
    </div>

    <div class="flex items-center justify-center mb-4 rounded-xl bg-white p-7">
        <table class="w-full text-base text-left rtl:text-right text-black">
            <caption class=" pb-8 text-3xl font-bold text-left rtl:text-right text-black bg-white">
                {{ $tugases->nama }}
            </caption>
            <thead class="bg-white border-b border-gray-400">
                <tr>
                    <th scope="col" class="px-8 py-3 text-center">
                        No
                    </th>
                    <th scope="col" class="px-8 py-3">
                        Nama Siswa
                    </th>
                    <th scope="col" class="px-8 py-3">
                        Waktu Pengumpulan
                    </th>
                    <th scope="col" class="px-8 py-3 text-center">
                        Nilai
                    </th>
                    <th scope="col" class="px-8 py-3 text-center">
                        Hasil
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tugases->tugas_answers as $index => $answer)
                    <tr class="bg-white border-b border-black dark:border-gray-700">
                        <th scope="row" class="px-8 py-4 text-center">
                            {{ $index + 1 }}
                        </th>
                        <td class="px-8 py-4">
                            {{ $answer->users->name }}
                        </td>
                        <td class="px-8 py-4">
                            {{ date('d/m/Y H:i', strtotime($answer->updated_at)) }} WIB
                        </td>
                        <td class="px-8 py-4 text-center">
                            {{ $answer->tugas_grades ? $answer->tugas_grades?->nilai : "Belum Dinilai" }}
                        </td>
                        <td class="px-8 py-4 text-center">
                            <a href="{{ route('tugas-admin.hasil', $answer->id) }}"
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

<script>
    console.log(@json($tugases))
</script>
@endsection
