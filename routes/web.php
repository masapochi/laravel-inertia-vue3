<?php

use App\Models\Book;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

Route::get('/books', function () {
    return Inertia::render('Books/Index', [
        'books' => Book::query()
            ->orderBy('created_at', 'desc')
            ->paginate(5, ['id', 'title', 'author'])
    ]);
})->name('books.index');

Route::get('/books/create', function () {
    return Inertia::render('Books/Create');
})->name('books.create');

Route::post('/books', function () {
    $attributes = request()->validate([
        'title' => ['required', 'max:255'],
        'author' => ['required', 'max:255'],
    ]);

    Book::create($attributes);

    return redirect()->route('books.index');
})->name('books.store');

Route::get('/books/{book}', function (Book $book) {
    return Inertia::render('Books/Edit', [
        'book' => $book->only(['id', 'title', 'author'])
    ]);
})->name('books.edit');

Route::patch('/books/{book}', function (Book $book) {
    $attributes = request()->validate([
        'title' => ['required', 'max:255'],
        'author' => ['required', 'max:255'],
    ]);
    $book->update($attributes);

    return redirect()->route('books.index');
});

Route::delete('/books/{book}', function (Book $book) {
    $book->delete();

    return redirect()->route('books.index');
})->name('books.destroy');
