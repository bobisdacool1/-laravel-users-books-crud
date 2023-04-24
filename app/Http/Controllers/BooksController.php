<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookBaseRequest;
use App\Http\Requests\BooksIndexRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BooksController extends Controller
{
    public function index(BooksIndexRequest $request): View
    {
        $validated = $request->validated();
        $books = Book::query();

        $authorSearch = $validated['author'] ?? null;
        if ($authorSearch) {
            $books->byAuthor($authorSearch);
        }

        return view('books.index', ['books' => $books->get()]);
    }

    public function create(): View
    {
        return view('books.create', ['book' => new Book()]);
    }

    public function edit(Book $book): View
    {
        return view('books.edit', ['book' => $book]);
    }

    public function show(Book $book): BookResource
    {
        return new BookResource($book);
    }

    public function store(BookBaseRequest $request): RedirectResponse
    {
        Book::create($request->validated());

        return redirect(route('books.index'));
    }

    public function update(BookBaseRequest $request, Book $book): RedirectResponse
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
