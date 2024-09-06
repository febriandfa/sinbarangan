@extends('partial.main')

@section('content')
<div class="px-4 rounded-lg">
    <div class="w-full items-center py-7">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{ route('kelompok-guru.index') }}" class="inline-flex items-center text-lg font-medium text-gray-500">
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

    <div class="flex items-center justify-center mb-4 rounded-xl bg-white p-7">
        <table class="w-full text-base text-left text-black">
            <thead class="bg-white border-b border-gray-400">
                <tr>
                    <th scope="col" class="px-8 py-3 text-center">
                        No Absen
                    </th>
                    <th scope="col" class="px-28 py-3">
                        Nama Anggota
                    </th>
                    <th scope="col" class="px-20 py-3">
                        Waktu Belajar
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($kelompoks->members as $index => $member)
                    <tr class="bg-white border-b border-black">
                        <th scope="row" class="px-8 py-4 text-center">
                            {{ $index + 1 }}
                        </th>
                        <td class="px-28 py-4">
                            {{ $member->users->name }}
                        </td>
                        <td class="px-20 py-4">
                            {{ $member->users->total_login_time ? $member->users->total_login_time : 0 }} Menit
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
