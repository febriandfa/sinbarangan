@extends('partial.main')

@section('content')
<div class="px-4 rounded-lg mt-14">
    <div class="text-gray-900 bg-white gap-5 p-7">
        <div class="flex justify-between items-center p-2 mb-4">
            <h1 class="text-2xl font-bold">
                Daftar Tugas
            </h1>
            <a href="{{ route('tugas-admin.create') }}"
                class="text-white bg-custom-orange focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M15 10.625H5C4.65833 10.625 4.375 10.3417 4.375 10C4.375 9.65833 4.65833 9.375 5 9.375H15C15.3417 9.375 15.625 9.65833 15.625 10C15.625 10.3417 15.3417 10.625 15 10.625Z"
                        fill="#F6F7F9" />
                    <path
                        d="M10 15.125C9.96985 15.125 9.93857 15.1127 9.91293 15.0871C9.88728 15.0614 9.875 15.0301 9.875 15V5C9.875 4.96985 9.88728 4.93857 9.91293 4.91293C9.93857 4.88728 9.96985 4.875 10 4.875C10.0301 4.875 10.0614 4.88728 10.0871 4.91293C10.1127 4.93857 10.125 4.96985 10.125 5V15C10.125 15.0301 10.1127 15.0614 10.0871 15.0871C10.0614 15.1127 10.0301 15.125 10 15.125Z"
                        fill="#F6F7F9" stroke="#F6F7F9" />
                </svg>
                Tambah Tugas
            </a>
        </div>
        <div class="flex items-center justify-center mb-4 rounded-xl bg-gray-50">
            <table class="w-full text-md bg-white rounded mb-4">
                <tbody>
                    <tr class="border-b">
                        <th class="text-left p-3 px-5">No</th>
                        <th class="text-left p-3 px-5">Judul Tugas</th>
                        <th class="text-left p-3 px-5">Tenggat Waktu</th>
                        <th class="text-center p-3 px-5">Hasil</th>
                        <th class="text-center p-3 px-5">Aksi</th>
                    </tr>
                    @foreach ($tugases as $index => $tugas)
                        <tr class="border-b hover:bg-orange-100">
                            <td class="p-3 px-5">{{ $index + 1 }}</td>
                            <td class="p-3 px-5">{{ $tugas->nama }}</td>
                            <td class="p-3 px-5">{{ date('d/m/Y H:i', strtotime($tugas->deadline)) }} WIB</td>
                            <td class="px-12 py-4 text-center">
                                <a href="{{ route('tugas-admin.show', $tugas->id) }}"
                                    class="w-28 h-9 px-5 py-2 bg-custom-orange rounded-lg text-white text-sm font-medium  leading-tight">
                                    Lihat Hasil
                                </a>
                            </td>
                            <td class="p-3 px-5 flex justify-center">
                                <form action="{{ route('tugas-admin.destroy', $tugas->id) }}" method="POST" class="w-fit">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="inline-block text-sm bg-red-600 border-red border-2 text-white p-2 rounded focus:outline-none focus:shadow-outline">
                                        <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M16.2507 5.0476C16.2357 5.0476 16.2132 5.0476 16.1907 5.0476C12.2232 4.6501 8.26323 4.5001 4.34073 4.8976L2.81073 5.0476C2.49573 5.0776 2.21823 4.8526 2.18823 4.5376C2.15823 4.2226 2.38323 3.9526 2.69073 3.9226L4.22073 3.7726C8.21073 3.3676 12.2532 3.5251 16.3032 3.9226C16.6107 3.9526 16.8357 4.2301 16.8057 4.5376C16.7832 4.8301 16.5357 5.0476 16.2507 5.0476Z"
                                                fill="currentcolor" />
                                            <path
                                                d="M6.87556 4.29C6.84556 4.29 6.81556 4.29 6.77806 4.2825C6.47806 4.23 6.26806 3.9375 6.32056 3.6375L6.48556 2.655C6.60556 1.935 6.77056 0.9375 8.51806 0.9375H10.4831C12.2381 0.9375 12.4031 1.9725 12.5156 2.6625L12.6806 3.6375C12.7331 3.945 12.5231 4.2375 12.2231 4.2825C11.9156 4.335 11.6231 4.125 11.5781 3.825L11.4131 2.85C11.3081 2.1975 11.2856 2.07 10.4906 2.07H8.52556C7.73056 2.07 7.71556 2.175 7.60306 2.8425L7.43056 3.8175C7.38556 4.095 7.14556 4.29 6.87556 4.29Z"
                                                fill="currentcolor" />
                                            <path
                                                d="M11.9078 17.0624H7.09279C4.47529 17.0624 4.37029 15.6149 4.28779 14.4449L3.80029 6.89243C3.77779 6.58493 4.01779 6.31493 4.32529 6.29243C4.64029 6.27743 4.90279 6.50993 4.92529 6.81743L5.41279 14.3699C5.49529 15.5099 5.52529 15.9374 7.09279 15.9374H11.9078C13.4828 15.9374 13.5128 15.5099 13.5878 14.3699L14.0753 6.81743C14.0978 6.50993 14.3678 6.27743 14.6753 6.29243C14.9828 6.31493 15.2228 6.57743 15.2003 6.89243L14.7128 14.4449C14.6303 15.6149 14.5253 17.0624 11.9078 17.0624Z"
                                                fill="currentcolor" />
                                            <path
                                                d="M10.7455 12.9375H8.24805C7.94055 12.9375 7.68555 12.6825 7.68555 12.375C7.68555 12.0675 7.94055 11.8125 8.24805 11.8125H10.7455C11.053 11.8125 11.308 12.0675 11.308 12.375C11.308 12.6825 11.053 12.9375 10.7455 12.9375Z"
                                                fill="currentcolor" />
                                            <path
                                                d="M11.375 9.9375H7.625C7.3175 9.9375 7.0625 9.6825 7.0625 9.375C7.0625 9.0675 7.3175 8.8125 7.625 8.8125H11.375C11.6825 8.8125 11.9375 9.0675 11.9375 9.375C11.9375 9.6825 11.6825 9.9375 11.375 9.9375Z"
                                                fill="currentcolor" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
