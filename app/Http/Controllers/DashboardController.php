<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Author;
use App\Genre;
use DB;

class DashboardController extends Controller
{
    //

    public function viewAllBooks ($sort='id', $direction="asc")
    {
      $max = DB::table('books')->max('price');
      if($sort=='authors' && $direction=='asc'){
          return view('user.index', [
              'max' => $max,
              'books' => Book::with(['authors' => function($query){
                $query->orderby('name','asc');
              }])->paginate(10)
            ]);
        }elseif($sort=='authors' && $direction=='desc'){
            return view('user.index', [
              'max' => $max,
              'books' => Book::with(['authors' => function($query){
                $query->orderby('name','desc');
              }])->paginate(10)
            ]);
          }elseif($sort=='genres' && $direction=='asc'){
              return view('user.index', [
                'max' => $max,
                'books' => Book::with(['genres' => function($query){
                  $query->orderby('name','asc');
                }])->paginate(10)
              ]);
            }elseif($sort=='genres' && $direction=='desc'){
                return view('user.index', [
                  'max' => $max,
                  'books' => Book::with(['genres' => function($query){
                    $query->orderby('name','desc');
                  }])->paginate(10)
                ]);
              }else{
          return view('user.index',[
              'max' => $max,
              'books' => Book::orderBy($sort, $direction)->paginate(10)
            ]);
        }

    }

    public function viewOneBook($slug)
    {
    	   // Get post for slug.
    $book = Book::whereSlug($slug)->firstOrFail();

    return view('user.book', [
        'book' => $book

        ]);
    }

    public function filterByAuthor(Request $request)
    {
      $author = $request->input('author');
      return view('user.index',[
        'books' => Book::whereHas('authors', function($query) use ($author){
          $query->where('slug', '=', $author );
        })->paginate(10)
      ]);
    }

    public function filterByGenre(Request $request)
    {
      $genre = $request->input('genre');
      return view('user.index',[
        'books' => Book::whereHas('genres', function($query) use ($genre){
          $query->where('slug', '=', $genre );
        })->paginate(10)
      ]);
    }

    public function filterByPrice(Request $request)
    {

      $min = (int)($request->input('min'))*1;
      $max = (int)($request->input('max'))*1;
      switch ($request->input('lang')) {
        case 'UKR': $lang = 'UKR'; break;
        case 'ENG': $lang = 'ENG'; break;
        default: $lang = 'RUS'; break;
      }
      if($max !== 0)
      {
        session([
          'min' => $min,
          'max' => $max,
          'lang' => $lang
        ]);        
      }

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
