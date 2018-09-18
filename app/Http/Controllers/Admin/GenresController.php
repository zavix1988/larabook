<?php

namespace App\Http\Controllers\Admin;

use App\Genre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GenresController extends Controller
{
    /**
     * Вывод всех жанров
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.genres.index', [
            'genres' => Genre::paginate(10)
        ]);
    }

    /**
     * Вывод формы создания нового жанра
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.genres.create', [
            'genre' => []
        ]);
    }

    /**
     * Запись нового жанра в базу
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Genre::create($request->all());

        return redirect()->route('admin.genres.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function show(Genre $genre)
    {
        //
    }

    /**
     * Вывод формы редактирования жанра
     *
     * @param  \App\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function edit(Genre $genre)
    {
        //
        return view('admin.genres.edit', [
            'genre' => $genre
        ]);
    }

    /**
     * Запись изменения жанра в базу 
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Genre $genre)
    {
        //
        $genre->update($request->all());
        return redirect()->route('admin.genres.index');
    }

    /**
     * Удаление жанра из базы
     *
     * @param  \App\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genre $genre)
    {
        //
        $genre->delete();
        return redirect()->route('admin.genres.index');
    }
}
