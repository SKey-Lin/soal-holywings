@extends('dashboard')

@section('content')
    <div class="flex w-full my-4 justify-between">
        <div>
            <h2 class="text-lg font-semibold">Edit Category</h2>
        </div>
        <div>
            <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                href="{{ route('categories.index') }}">
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

    <form action="{{ route('categories.update', $category->id) }}" method="POST"
        class="w-full rounded-md p-5 mx-auto mt-2 bg-gray-700">
        @csrf
        @method('PUT')

        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="name" id="name"
                class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 appearance-none text-white border-gray-600 focus:border-blue-500 focus:outline-none focus:ring-0 peer"
                placeholder=" " value="{{ $category->name }}" required />
            <label for="name"
                class="peer-focus:font-medium absolute text-sm text-white duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Category
                Name</label>
        </div>

        <button type="submit"
            class="text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Submit</button>
    </form>
@endsection
