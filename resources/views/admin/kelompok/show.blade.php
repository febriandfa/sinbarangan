@extends('partial.main')

@section('content')
<div class="rounded-lg">
    <div class="w-full items-center py-7">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{ route('kelompok-admin.index') }}" class="inline-flex items-center text-lg font-medium text-gray-500">
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

    <div class="rounded-lg">
        <div class="text-gray-900 bg-white gap-5 p-7">
            <div class="flex justify-between items-center p-2">
                <h1 class="text-2xl font-bold">
                    Detail Kelompok {{ $kelompoks->nama }}
                </h1>
            </div>
            <div class="flex items-center justify-center mb-4 rounded-xl bg-gray-50">
                <table class="w-full text-md bg-white rounded mb-4">
                    <tbody>
                        <tr class="border-b">
                            <th class="text-left p-3 px-5">No</th>
                            <th class="text-left p-3 px-5">No Absen</th>
                            <th class="text-left p-3 px-5">Nama Anggota</th>
                            <th class="text-left p-3 px-5">Posisi</th>
                            <th class="text-left p-3 px-5">Waktu Belajar</th>
                        </tr>
                        @foreach ($kelompoks->members as $index => $member)
                        <tr class="border-b hover:bg-orange-100">
                            <td class="p-3 px-5">{{ $index + 1 }}</td>
                            <td class="p-3 px-5">{{ $member->users->no_absen }}</td>
                            <td class="p-3 px-5">{{ $member->users->name }}</td>
                            <td class="p-3 px-5 capitalize">{{ $member->role }}</td>
                            <td class="p-3 px-5">
                                {{ $member->users->total_login_time ? $member->users->total_login_time : 0 }} Menit
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
