@extends('dashboard')

@section('content')
    <div class="flex w-full my-4 justify-between">
        <div>
            <h2 class="text-2xl font-semibold">{{ $book->name }}</h2>
        </div>
        <div>
            <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('books.index') }}">
                Back</a>
        </div>
    </div>
    <div class="flex text-justify font-semibold text-lg mt-6 tracking-wide">
        {{ $book->summary }}
    </div>
@endsection
