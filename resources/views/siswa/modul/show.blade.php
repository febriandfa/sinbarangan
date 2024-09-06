@extends('partial.main')

@section('content')
    <div class="px-4 rounded-lg mt-14">
        <div class="flex-col items-center justify-center mb-4 rounded-xl bg-gray-50 p-7">
            <h1 class="text-zinc-800 text-xl font-semibold leading-loose">{{ $moduls->judul }}
            </h1>
            <h2 class="text-zinc-800 text-lg font-medium leading-relaxed">Deskripsi</h2>
            <h3 class="color-grey text-xl font-normal  leading-7">
                <div class="prose">
                    {!! $moduls->deskripsi !!}
                </div>
            </h3>
            <div class="w-full pt-4 items-center justify-center flex">
                <iframe src="{{ asset('storage/modul/' . $moduls->file) }}" width="1000px" height="600px"></iframe>
            </div>
        </div>
    </div>
@endsection
