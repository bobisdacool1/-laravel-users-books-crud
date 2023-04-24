<?php

namespace App\Http\Controllers;

use App\Http\Requests\BaseAuthorRequest;
use App\Models\Author;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AuthorsController extends Controller
{
    public function index(): View
    {
        $authors = Author::withCount(['books'])->get();

        return view('authors.index', [
            'authors' => $authors,
        ]);
    }

    public function create(): View
    {
        return view('authors.create', ['author' => new Author()]);
    }

    public function edit(Author $author): View
    {
        return view('authors.edit', ['author' => $author]);
    }

    public function store(BaseAuthorRequest $request): RedirectResponse
    {
        Author::create($request->validated());

        return redirect(route('authors.index'));
    }

    public function update(BaseAuthorRequest $request, Author $author): RedirectResponse
    {
        $author->update($request->validated());

        return redirect(route('authors.index'));
    }

    public function destroy(Author $author): RedirectResponse
    {
        $author->deleteOrFail();

        return redirect()->back();
    }
}
