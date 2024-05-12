@extends('partial.main')

@section('content')
<div class="px-4 rounded-lg mt-14">
    <div class=" p-6 bg-white rounded-md flex flex-col justify-start items-start gap-9">
        <div class="self-stretch flex flex-col justify-center items-start gap-1.5">
            <span class="text-zinc-800 text-lg font-medium font-Poppins leading-relaxed">Tugas</span>
            <span class="self-stretch text-zinc-800 text-lg font-normal font-Poppins leading-relaxed">{{ $tugases->nama }}</span>
        </div>
        <div class="self-stretch flex flex-col justify-center items-start gap-1.5">
            <span class="text-zinc-800 text-lg font-medium font-Poppins leading-relaxed">Deadline</span>
            <span class="self-stretch text-red-500 text-lg font-medium font-Poppins leading-relaxed">{{ date('l, j F Y H:i', strtotime($tugases->deadline)) }} WIB</span>
        </div>
        <div class="self-stretch py-2.5 justify-start items-start gap-2.5 flex">
            <a href="{{ route('tugas.rumusanMasalah', $tugases->id) }}"
                class="flex-grow flex-shrink flex-basis-0 px-5 py-3.5 rounded-lg justify-center items-center gap-2.5 text-white {{ Request::routeIs('tugas.rumusanMasalah') ? 'bg-custom-orange' : 'bg-gray-400' }}">
                <h1 class="font-medium font-Poppins text-base leading-snug">Rumusan Masalah</h1>
            </a>
            <a href="{{ route('tugas.daftarTugas', $tugases->id) }}"
                class="flex-grow flex-shrink flex-basis-0 px-5 py-3.5 rounded-lg justify-center items-center gap-2.5 text-white {{ Request::routeIs('tugas.daftarTugas') ? 'bg-custom-orange' : 'bg-gray-400' }}">
                <h1 class="text-white text-base font-medium font-Poppins leading-snug">Daftar Tugas</h1>
            </a>
            <a href="{{ route('tugas.laporan', $tugases->id) }}"
                class="flex-grow flex-shrink flex-basis-0 px-5 py-3.5 rounded-lg justify-center items-center gap-2.5 text-white {{ Request::routeIs('tugas.laporan') ? 'bg-custom-orange' : 'bg-gray-400' }}">
                <h1 class="text-white text-base font-medium font-Poppins leading-snug">Laporan</h1>
            </a>
            <a href="{{ route('tugas.feedback', $tugases->id) }}"
                class="flex-grow flex-shrink flex-basis-0 px-5 py-3.5 rounded-lg justify-center items-center gap-2.5 text-white {{ Request::routeIs('tugas.feedback') ? 'bg-custom-orange' : 'bg-gray-400' }}">
                <h1 class="text-white text-base font-medium font-Poppins leading-snug">Feedback</h1>
            </a>
        </div>
        <div class="self-stretch h-[162px] flex flex-col justify-center items-start gap-1.5">
            <span class="text-zinc-800 text-lg font-medium font-Poppins leading-relaxed">Deskripsi</span>
            <span class="self-stretch text-slate-500 text-lg font-normal font-Poppins leading-relaxed">
                Figma ipsum
                component variant main layer. Effect boolean scrolling community plugin vertical select scale comment
                italic. Shadow edit team text list outline frame group bullet. Auto figma device boolean hand. Vector
                share bold background style layout. Bold flatten boolean comment ellipse comment. Ipsum draft move ipsum
                invite polygon shadow. Team outline draft flatten scrolling bold horizontal object shadow. Subtract
                union slice vector bullet group. Mask edit content overflow plugin invite layout layout content
                stroke.
            </span>
        </div>
        @yield('section')
    </div>
</div>
@endsection
