@extends('dashboard')

@section('content')
    <div class="flex w-full my-4 justify-between">
        <div>
            <h2 class="text-lg font-semibold">Books</h2>
        </div>
        <div>
            <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                href="{{ route('books.create') }}">
                Create New Book</a>
        </div>
    </div>

    <table class="w-full text-sm text-left text-gray-400">
        <thead class="text-xs uppercase bg-gray-700 text-gray-200 font-bold">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Book name
                </th>
                <th scope="col" class="px-6 py-3">
                    Count
                </th>
                <th scope="col" class="px-6 py-3">
                    Category
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
                        {{ $book->name }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $book->count }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $book->category->name }}
                    </td>
                    <td class="px-6 py-4">
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                            <a class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"
                                href="{{ route('books.show', $book->id) }}">Show</a>
                            <a class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded"
                                href="{{ route('books.edit', $book->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


    {!! $books->links() !!}
@endsection
