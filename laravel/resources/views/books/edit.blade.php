@extends('dashboard')

@section('content')
    <div class="flex w-full my-4 justify-between">
        <div>
            <h2 class="text-lg font-semibold">Edit Book</h2>
        </div>
        <div>
            <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('books.index') }}">
                Back</a>
        </div>
    </div>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ $error }}</span>
            </div>
        @endforeach
    @endif

    <form action="{{ route('books.update', $book->id) }}" method="POST"
        class="w-full rounded-md p-5 mx-auto mt-2 bg-gray-700">
        @csrf
        @method('PUT')

        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="name" id="name"
                class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 appearance-none text-white border-gray-600 focus:border-blue-500 focus:outline-none focus:ring-0 peer"
                placeholder=" " value="{{ $book->name }}" required />
            <label for="name"
                class="peer-focus:font-medium absolute text-sm text-white duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Book
                Name</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="number" name="count" id="count"
                class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 appearance-none text-white border-gray-600 focus:border-blue-500 focus:outline-none focus:ring-0 peer"
                placeholder=" " value="{{ $book->count }}" required />
            <label for="count"
                class="peer-focus:font-medium absolute text-sm text-white duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Count</label>
        </div>

        <div class="relative z-0 w-full mb-5 group">
            <label for="categories" class="block mb-2 text-sm font-medium text-white">Book Category</label>
            <select id="categories" name="category_id"
                class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">

                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if ($category->id == $book->category->id) selected @endif>
                        {{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit"
            class="text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Submit</button>
    </form>
@endsection
