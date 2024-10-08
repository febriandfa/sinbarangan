@extends('partial.main')

@section('content')
    <div class="px-4 pb-14 rounded-lg mt-14">
        <div class="text-gray-900 bg-white gap-5 p-7 rounded-xl">
            <div class="flex justify-between items-center p-2">
                <h1 class="text-2xl font-bold">
                    Materi Simulasi
                </h1>
                <a href="{{ route('simulasi-admin.create') }}"
                    class="text-white bg-custom-orange focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M15 10.625H5C4.65833 10.625 4.375 10.3417 4.375 10C4.375 9.65833 4.65833 9.375 5 9.375H15C15.3417 9.375 15.625 9.65833 15.625 10C15.625 10.3417 15.3417 10.625 15 10.625Z"
                            fill="#F6F7F9" />
                        <path
                            d="M10 15.125C9.96985 15.125 9.93857 15.1127 9.91293 15.0871C9.88728 15.0614 9.875 15.0301 9.875 15V5C9.875 4.96985 9.88728 4.93857 9.91293 4.91293C9.93857 4.88728 9.96985 4.875 10 4.875C10.0301 4.875 10.0614 4.88728 10.0871 4.91293C10.1127 4.93857 10.125 4.96985 10.125 5V15C10.125 15.0301 10.1127 15.0614 10.0871 15.0871C10.0614 15.1127 10.0301 15.125 10 15.125Z"
                            fill="#F6F7F9" stroke="#F6F7F9" />
                    </svg>
                    Tambah Simulasi
                </a>
            </div>
            <div class="flex items-center justify-center mb-4 rounded-xl bg-gray-50">
                <table class="w-full text-md bg-white rounded mb-4">
                    <tbody>
                        <tr class="border-b">
                            <th class="text-left p-3 px-5">No</th>
                            <th class="text-left p-3 px-5">Judul</th>
                            <th class="text-left p-3 px-5">Tanggal Upload</th>
                            <th class="text-center p-3 px-5">Aksi</th>
                        </tr>
                        @foreach ($simulasis as $index => $simulasi)
                            <tr class="border-b hover:bg-orange-100">
                                <td class="p-3 px-5">{{ $index + 1 }}</td>
                                <td class="p-3 px-5">{{ $simulasi->judul }}</td>
                                <td class="p-3 px-5">{{ $simulasi->created_at->format('d/m/Y') }}</td>
                                <td class="px-12 py-4 text-center flex items-center justify-center">
                                    {{-- Show --}}
                                    <a href="{{ route('simulasi-admin.show', $simulasi->id) }}"
                                        class="block w-fit mr-3 text-sm bg-custom-orange text-white p-2 rounded focus:outline-none focus:shadow-outline">
                                        <svg
                                            width="19" height="18" viewBox="0 0 19 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9.49945 12.2474C7.70695 12.2474 6.25195 10.7924 6.25195 8.99994C6.25195 7.20744 7.70695 5.75244 9.49945 5.75244C11.292 5.75244 12.747 7.20744 12.747 8.99994C12.747 10.7924 11.292 12.2474 9.49945 12.2474ZM9.49945 6.87744C8.32945 6.87744 7.37695 7.82994 7.37695 8.99994C7.37695 10.1699 8.32945 11.1224 9.49945 11.1224C10.6695 11.1224 11.622 10.1699 11.622 8.99994C11.622 7.82994 10.6695 6.87744 9.49945 6.87744Z"
                                                fill="#F6F7F9" />
                                            <path
                                                d="M9.50055 15.7651C6.68055 15.7651 4.01805 14.1151 2.18805 11.2501C1.39305 10.0126 1.39305 7.99511 2.18805 6.75011C4.02555 3.88511 6.68805 2.23511 9.50055 2.23511C12.313 2.23511 14.9755 3.88511 16.8055 6.75011C17.6005 7.98761 17.6005 10.0051 16.8055 11.2501C14.9755 14.1151 12.313 15.7651 9.50055 15.7651ZM9.50055 3.36011C7.07805 3.36011 4.76055 4.81511 3.14055 7.35761C2.57805 8.23511 2.57805 9.76511 3.14055 10.6426C4.76055 13.1851 7.07805 14.6401 9.50055 14.6401C11.923 14.6401 14.2405 13.1851 15.8605 10.6426C16.423 9.76511 16.423 8.23511 15.8605 7.35761C14.2405 4.81511 11.923 3.36011 9.50055 3.36011Z"
                                                fill="#F6F7F9" />
                                        </svg>
                                    </a>
                                    {{-- Edit --}}
                                    <a href="{{ route('simulasi-admin.edit', $simulasi->id) }}"
                                        class="block w-fit mr-3 text-sm bg-custom-orange text-white p-2 rounded focus:outline-none focus:shadow-outline">
                                        <svg width="19" height="18" viewBox="0 0 19 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M4.65548 14.6399C4.19798 14.6399 3.77048 14.4824 3.46298 14.1899C3.07298 13.8224 2.88548 13.2674 2.95298 12.6674L3.23048 10.2374C3.28298 9.77991 3.56048 9.17241 3.88298 8.84241L10.0405 2.32491C11.578 0.697415 13.183 0.652415 14.8105 2.18991C16.438 3.72741 16.483 5.33241 14.9455 6.95991L8.78798 13.4774C8.47298 13.8149 7.88798 14.1299 7.43048 14.2049L5.01548 14.6174C4.88798 14.6249 4.77548 14.6399 4.65548 14.6399ZM12.448 2.18241C11.8705 2.18241 11.368 2.54241 10.858 3.08241L4.70048 9.60742C4.55048 9.76492 4.37798 10.1399 4.34798 10.3574L4.07048 12.7874C4.04048 13.0349 4.10048 13.2374 4.23548 13.3649C4.37048 13.4924 4.57298 13.5374 4.82048 13.4999L7.23548 13.0874C7.45298 13.0499 7.81298 12.8549 7.96298 12.6974L14.1205 6.17991C15.0505 5.18991 15.388 4.27491 14.0305 2.99991C13.4305 2.42241 12.913 2.18241 12.448 2.18241Z"
                                                fill="#FFF4ED" />
                                            <path
                                                d="M13.5044 8.21239C13.4894 8.21239 13.4669 8.21239 13.4519 8.21239C11.1119 7.97989 9.22935 6.20239 8.86935 3.87739C8.82435 3.56989 9.03435 3.28489 9.34185 3.23239C9.64935 3.18739 9.93435 3.39739 9.98685 3.70489C10.2718 5.51989 11.7419 6.91489 13.5719 7.09489C13.8794 7.12489 14.1044 7.40239 14.0744 7.70989C14.0369 7.99489 13.7894 8.21239 13.5044 8.21239Z"
                                                fill="#FFF4ED" />
                                            <path
                                                d="M16.25 17.0625H2.75C2.4425 17.0625 2.1875 16.8075 2.1875 16.5C2.1875 16.1925 2.4425 15.9375 2.75 15.9375H16.25C16.5575 15.9375 16.8125 16.1925 16.8125 16.5C16.8125 16.8075 16.5575 17.0625 16.25 17.0625Z"
                                                fill="#FFF4ED" />
                                        </svg>
                                    </a>
                                    {{-- Delete --}}
                                    <form action="{{ route('simulasi-admin.destroy', $simulasi->id) }}" method="POST" class="w-fit">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-block text-sm bg-red-600 border-red border-2 text-white p-2 rounded focus:outline-none focus:shadow-outline">
                                            <svg width="19" height="18" viewBox="0 0 19 18" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
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
