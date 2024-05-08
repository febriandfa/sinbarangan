@extends('partial.main')

@section('content')
<div class="px-4 rounded-lg mt-14">
    <div class="flex items-center p-4 h-48 mb-4 rounded-xl bg-gray-50 bg-custom-orange justify-between">
        <div class="flex-col items-center text-white p-4">
            <h1 class="text-3xl font-semibold pb-2">Jangan Lupa Pahami Materi</h1>
            <p class="text-base font-reguler">Cek selalu tugas, dan kerjakan dengan sesuai perintah</p>
        </div>
    </div>
    <div class="flex items-center justify-center mb-4 rounded-xl bg-white p-7 mt-6">
        <table class="w-full text-base text-left rtl:text-right text-black">
            <thead class="bg-white border-b border-gray-400">
                <tr>
                    <th scope="col" class="px-8 py-3 text-center">
                        No
                    </th>
                    <th scope="col" class="px-28 py-3">
                        Nama Kelompok
                    </th>
                    <th scope="col" class="px-20 py-3">
                        Kuota
                    </th>
                    <th scope="col" class="px-12 py-3 text-center">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kelompoks as $index => $kelompok)
                    <tr class="bg-white dark:border-gray-700">
                        <td scope="row" class="px-8 py-4 text-center">
                            {{ $index + 1 }}
                        </td>
                        <td class="px-28 py-4">
                            {{ $kelompok->nama }}
                        </td>
                        <td class="px-20 py-4">
                            {{ count($kelompok->members) }} / {{ $kelompok->kuota }}
                        </td>
                        <td class="px-12 py-4 text-center">
                            <a href="{{ route('siswa.kelompok.detail') }}"
                            class="w-28 h-9 px-5 py-2 rounded-lg text-white text-sm font-medium leading-tight
                            {{ count($kelompok->members) >= $kelompok->kuota ? 'bg-orange-300 cursor-not-allowed' : 'bg-custom-orange' }}">
                                Gabung
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
