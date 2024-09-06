@extends('partial.main')

@section('content')
<div class="px-4 rounded-lg mt-14">
    <div class="flex items-center justify-center mb-4 rounded-xl bg-white p-7">
        <table class="w-full text-base text-left text-black">
            <thead class="bg-white border-b border-gray-400">
                <tr>
                    <th scope="col" class="px-8 py-3 text-center">
                        No
                    </th>
                    <th scope="col" class="px-28 py-3">
                        Nama Kelompok
                    </th>
                    <th scope="col" class="px-20 py-3">
                        Kelas
                    </th>
                    <th scope="col" class="px-12 py-3 text-center">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kelompoks as $index => $kelompok)
                    <tr class="bg-white border-b border-black">
                        <th scope="row" class="px-8 py-4 text-center">
                            {{ $index + 1 }}
                        </th>
                        <td class="px-28 py-4">
                            {{ $kelompok->nama }}
                        </td>
                        <td class="px-20 py-4">
                            {{ $kelompok->kelas }}
                        </td>
                        <td class="px-12 py-4 text-center">
                            <a href="{{ route('kelompok-guru.show', $kelompok->id) }}"
                                class="w-28 h-9 px-5 py-2 bg-custom-orange rounded-lg text-white text-sm font-medium  leading-tight">
                                Detail Kelompok
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
