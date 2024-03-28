<?php

namespace App\Http\Controllers;

use App\Models\BookCategory;
use Illuminate\Http\Request;

class BookCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = BookCategory::latest()->paginate(10);

        return view('categories.index', compact('categories'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
      
        BookCategory::create($request->all());
       
        return redirect()->route('categories.index');
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BookCategory $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BookCategory $category)
    {
        $request->validate([
            'name' => 'required'
        ]);
      
        $category->update($request->all());
      
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookCategory $category)
    {
        $bookCategory->delete();
        
        return redirect()->route('categories.index');
    }
}
