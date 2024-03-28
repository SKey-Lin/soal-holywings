<?php

namespace App\Http\Controllers;

use App\Models\BookLoan;
use App\Models\Book;
use Illuminate\Http\Request;
use App\Enum\LoanStatus;

class BookLoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loans = BookLoan::latest()->paginate(10);

        return view('loans.index', compact('loans'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function borrow()
    {
        $books = Book::where("count", ">", 0)->get();

        return view('loans.borrow', compact('books'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'borrower_name' => 'required',
            'book_id' => 'required',
        ]);

        $input = $request->all();
        $input['status'] = LoanStatus::BORROWED;
      
        BookLoan::create($input);

        $book = Book::find($input['book_id']);
        $book->update([
          "count" => $book->count - 1
        ]);
       
        return redirect()->route('loans.index');
    }

    public function return(BookLoan $loan)
    {
        $loan->update([
          "status" => LoanStatus::RETURNED
        ]);

        $book = Book::find($loan->book_id);
        $book->update([
          "count" => $book->count + 1
        ]);
        return redirect()->route('loans.index');
    }

    public function lost(BookLoan $loan)
    {
        $loan->update([
          "status" => LoanStatus::LOST
        ]);
        return redirect()->route('loans.index');
    }
}
