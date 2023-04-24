<?php

namespace App\Http\Controllers;

use App\Http\Requests\BaseBookRequest;
use App\Models\Book;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BooksController extends Controller
{
    public function index(Request $request): View
    {
        $books = Book::all();

        return view('books.index', ['books' => $books]);
    }

    public function create(): View
    {
        return view('books.create', ['book' => new Book()]);
    }

    public function edit(Book $book): View
    {
        return view('books.edit', ['book' => $book]);
    }

    public function store(BaseBookRequest $request): RedirectResponse
    {
        Book::create($request->validated());

        return redirect(route('books.index'));
    }

    public function update(BaseBookRequest $request, Book $book): RedirectResponse
    {
        if ($book->update($request->validated())) {
            return redirect(route('books.index'));
        }
        return redirect()->back();
    }

    public function destroy(Book $book): RedirectResponse
    {
        $book->deleteOrFail();

        return redirect(route('books.index'));
    }
}
