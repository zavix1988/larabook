<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use App\Author;
use App\Genre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BooksController extends Controller
{
    /**
     * Вывод всех книг
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.books.index',[
            'books' => Book::paginate(10)
        ]);
    }

    /**
     * Вывод формы для создания новой книги
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $authors = Author::all();
        $genres = Genre::all();

        return view('admin.books.create',[
            'book'    => [],
            'authors' => $authors,
            'genres' => $genres,
            'delimiter'  => ''
        ]);
    }

    /**
     * Запись новой книги со связями в базу
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $book = Book::create($request->all());
        if ($request->input('authors')) {
            $book->authors()->attach($request->input('authors'));
        }
        if ($request->input('genres')) {
            $book->genres()->attach($request->input('genres'));
        }
        return redirect()->route('admin.books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Вывод формы для редактирования книги
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
        $authors = Author::all();
        $genres = Genre::all();

        return view('admin.books.edit', [
          'book' => $book,
          'authors' => $authors,
          'genres' => $genres
        ]);
    }

    /**
     * Запись отредактированной книги со связями в базу
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
        $book->authors()->detach();
        $book->genres()->detach();
        $book->update($request->all());
        if ($request->input('authors')) {
            $book->authors()->attach($request->input('authors'));
        }
        if ($request->input('genres')) {
            $book->genres()->attach($request->input('genres'));
        }
        return redirect()->route('admin.books.index');
    }

    /**
     * Удаление книги со связями из базы
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
        $book->authors()->detach();
        $book->genres()->detach();
        $book->delete();
        return redirect()->route('admin.books.index');
    }

}
