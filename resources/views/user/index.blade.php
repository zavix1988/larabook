@extends('user.layouts.app_user')

@section('content')
<div class="container">
    <h1 class="text-center">Книги</h1>
    <hr/>
    <table class="table table-striped">
      <thead>
        <th>Название</th>
        <th>Цена</th>
        <th>Кол стр</th>
        <th>Язык</th>
        <th>Авторы</th>
        <th>Жанры</th>
      </thead>
      <tbody>
        @forelse($books as $book)
        <tr>
          <td><a href="{{route('index.book', $book->slug)}}">{{$book->name}}</a></td>
          <td>{{$book->price}}</td>
          <td>{{$book->pages}}</td>
          <td>{{$book->lang}}</td>
          <td>
            @foreach($book->authors as $bookauthor)
              {{$bookauthor->name}},&nbsp;
            @endforeach
          </td>
          <td>
            @foreach($book->genres as $bookgenre)
              {{$bookgenre->name}},&nbsp;
            @endforeach
          </td>
        </tr>

        @empty
        <tr>
          <td colspan="7" class="text-center"><h3>Данные отсутствуют</h3></td>
        </tr>
        @endforelse
      </tbody>
      <tfoot>
      <tr>
        <td colspan="3">
        <ul class="pagination pull-right">
          {{$books->links()}}
        </ul>
        </td>
      </tr>
      </tfoot>

    </table>
  </div>
</div>
@endsection
