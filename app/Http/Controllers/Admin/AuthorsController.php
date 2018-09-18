<?php

namespace App\Http\Controllers\Admin;

use App\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthorsController extends Controller
{
    /**
     * Вывод всех авторов
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.authors.index', [
            'authors' => Author::paginate(10)
        ]);
    }

    /**
     * Вывод формы создания нового автора
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.authors.create', [
            'author'      => [],
        ]);
    }

    /**
     * Запись нового автора в базу
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Author::create($request->all());

        return redirect()->route('admin.authors.index');
    }

    /**
     * Display the specified resource
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Вывод формы редактирования автора
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        //
            //$author = Author::find($author);
            return view('admin.authors.edit', [
                'author' => $author,

            ]);
    }

    /**
     * Запись изменения автора в базу 
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        //
        $author->update($request->all());
        return redirect()->route('admin.authors.index');
    }

    /**
     * Удаление автора из базы
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        //
        $author->delete();
        return redirect()->route('admin.authors.index');
    }
}
