@extends('dashboard')

@section('content')
    <div class="flex w-full my-4 justify-between">
        <div>
            <h2 class="text-lg font-semibold">Loans</h2>
        </div>
        <div>
            <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                href="{{ route('loans.borrow') }}">
                Loan a Book</a>
        </div>
    </div>

    <table class="w-full text-sm text-left text-gray-400">
        <thead class="text-xs uppercase bg-gray-700 text-gray-200 font-bold">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Borrower name
                </th>
                <th scope="col" class="px-6 py-3">
                    Book name
                </th>
                <th scope="col" class="px-6 py-3">
                    Due date
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($loans as $loan)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
                        {{ $loan->borrower_name }}
                    </th>
                    <th scope="row" class="px-6 py-4">
                        {{ $loan->book->name }}
                    </th>
                    <th scope="row" class="px-6 py-4">
                        {{ \Carbon\Carbon::parse($loan->due_date)->format('Y-m-d') }}
                    </th>
                    <th scope="row" class="px-6 py-4">
                        @switch($loan->status)
                            @case(\App\Enum\LoanStatus::BORROWED)
                                @if (strtotime('now') > strtotime($loan->due_date))
                                    <span class="bg-orange-500 text-white font-bold py-2 px-4 rounded">LATE
                                    </span>
                                @else
                                    <span class="bg-yellow-500 text-white font-bold py-2 px-4 rounded">BORROWED
                                    </span>
                                @endif
                            @break

                            @case(\App\Enum\LoanStatus::RETURNED)
                                <span class="bg-green-500 text-white font-bold py-2 px-4 rounded">RETURNED</span>
                            @break

                            @case(\App\Enum\LoanStatus::LOST)
                                <span class="bg-red-500 text-white font-bold py-2 px-4 rounded">LOST</span>
                            @break
                        @endswitch
                    </th>
                    <td class="px-6 py-4">
                        @if ($loan->status == \App\Enum\LoanStatus::BORROWED)
                            <form class="inline-block" action="{{ route('loans.return', $loan->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Return</button>
                            </form>

                            <form class="inline-block" action="{{ route('loans.lost', $loan->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <button type="submit"
                                    class="bg-amber-500 hover:bg-amber-700 text-white font-bold py-2 px-4 rounded">LOST</button>
                            </form>
                        @else
                            No Action Available
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


    {!! $loans->links() !!}
@endsection
