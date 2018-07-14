<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Author;
use App\Genre;
uSE DB;

class DashboardController extends Controller
{
    //
    public function viewAllBooks ($sort='id', $direction="asc")
    {
    	return view('user.index',[
            'books' => Book::orderby($sort, $direction)->paginate(10)
        ]);
    }

    public function viewOneBook($slug)
    {
    	   // Get post for slug.
    $book = Book::whereSlug($slug)->firstOrFail();

    return view('user.book', [
        'book' => $book
          
        ]);
    }

}
