<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Author;
use App\Genre;
use DB;

class DashboardController extends Controller
{
    /**
     * Вывод всех книг с возможной сортировкой 
     *
     * @param  $sort - параметр сортировки
     * @param  $direction - направление сортировки
     * @return \Illuminate\Http\Response
     */
    public function viewAllBooks ($sort='id', $direction="asc")
    {
      $max = DB::table('books')->max('price');
      return view('user.index',[
        'max' => $max,
        'books' => Book::orderBy($sort, $direction)->paginate(10)
      ]);
    }

    /**
     * Вывод конкрктной книги 
     *
     * @param  $slug
     * @return \Illuminate\Http\Response
     */
    public function viewOneBook($slug)
    {
      $book = Book::whereSlug($slug)->firstOrFail();
      return view('user.book', [
        'book' => $book
        ]);
    }

    /**
     * Фильтрация по авторам
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function filterByAuthor(Request $request)
    {
      $author = $request->input('author');
      return view('user.index',[
        'books' => Book::whereHas('authors', function($query) use ($author){
          $query->where('slug', '=', $author );
        })->paginate(10)
      ]);
    }

    /**
     * Фильтрация по жанрам
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function filterByGenre(Request $request)
    {
      $genre = $request->input('genre');
      return view('user.index',[
        'books' => Book::whereHas('genres', function($query) use ($genre){
          $query->where('slug', '=', $genre );
        })->paginate(10)
      ]);
    }

    /**
     * Фильтрация по цене и языку
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function filterByPrice(Request $request)
    {
      // защита от дурака
      $min = (int)($request->input('min'))*1;
      $max = (int)($request->input('max'))*1;
      switch ($request->input('lang')) {
        case 'UKR': $lang = 'UKR'; break;
        case 'ENG': $lang = 'ENG'; break;
        default: $lang = 'RUS'; break;
      }
      // проверка на наличие данных из формы
      if($max !== 0)
      {
        session([
          'min' => $min,
          'max' => $max,
          'lang' => $lang
        ]);        
      }

      // проверка на пагинацию
      if(null !== $request->input('page'))
      {
        return view('user.index',[
         'books' => Book::whereBetween('price', [session('min'), session('max')])->where('lang', '=', session('lang'))->paginate(10)
        ]);
      }
      else
      {
        return view('user.index',[
         'books' => Book::whereBetween('price', [$min, $max])->where('lang', '=', $lang)->paginate(10)
        ]);
      }
    }

}
