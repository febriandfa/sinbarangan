@extends('partial.main')

@section('content')
    <div class="px-4 rounded-lg mt-14">
        <div class="flex-col items-center justify-center mb-4 rounded-xl bg-gray-50 p-7">
            <div class="w-full pt-4 items-center justify-center flex">
                <iframe src="{{ asset('panduan/GURU.pdf') }}" width="1000px" height="600px"></iframe>
            </div>
        </div>
    </div>
@endsection
