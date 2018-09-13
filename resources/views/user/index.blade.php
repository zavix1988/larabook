
@extends('layouts.app')

@section('content')

<div class="container">
	<h1 class="text-center">Книги</h1>
	<hr/>
	<div class="row">
		<div class="col-md-2">
			<h4>Фильтр</h4>
			<form class="form" action="{{route('index.filter.price')}}" method="get">
				{{csrf_field()}}
				<div class="form-group">
					<label for="min">min</label>
					<input type="text" class="form-control" name="min" placeholder="0" id="min" >
					<label for="max">max</label>
					<input type="text" class="form-control" name="max" value="{{$max or ""}}" placeholder="0" id="max"  >
				</div>
				<div class="form-group">
					<label for="lang">Язык</label>
					<select name="lang" class="form-control" id="lang">
						<option value="RUS">RUS</option>
						<option value="UKR">UKR</option>
						<option value="ENG">ENG</option>
					</select>
				</div>
				<button type="submit" class="btn btn-secondary">Посмотреть</button>
			</form>
			<hr/>
			<div>
				<h4>Сортировка</h4>
				<a href="{{route('index.sort', ['name', 'desc'])}}"><i class="fas fa-angle-down"></i></a>Название<a href="{{route('index.sort', ['name', 'asc'])}}"><i class="fas fa-angle-up"></i></a>
				<br/>
				<a href="{{route('index.sort', ['price', 'desc'])}}"><i class="fas fa-angle-down"></i></a>Цена<a href="{{route('index.sort', ['price', 'asc'])}}"><i class="fas fa-angle-up"></i></a>
				<br/>
				<a href="{{route('index.sort', ['pages', 'desc'])}}"><i class="fas fa-angle-down"></i></a>Кол стр<a href="{{route('index.sort', ['pages', 'asc'])}}"><i class="fas fa-angle-up"></i></a>
				<br/>
				<a href="{{route('index.sort', ['lang', 'desc'])}}"><i class="fas fa-angle-down"></i></a>Язык<a href="{{route('index.sort', ['lang', 'asc'])}}"><i class="fas fa-angle-up"></i></a>
			</div>
		</div>
		<div class="col-md-10">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Название</th>
						<th>Цена</th>
						<th>Кол-во стр</th>
						<th>Язык</th>
						<th>Авторы</th>
						<th>Жанры</th>
					</tr>

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
								<a href="{{route('index.filter.author')}}?author={{$bookauthor->slug}}">{{$bookauthor->name}}</a>&nbsp;
							@endforeach
						</td>
						<td>
							@foreach($book->genres as $bookgenre)
								<a href="{{route('index.filter.genre')}}?genre={{$bookgenre->slug}}">{{$bookgenre->name}}</a>&nbsp;
							@endforeach
						</td>
					</tr>
					@empty
					<tr>
						<td colspan="6" class="text-center"><h3>Данные отсутствуют</h3></td>
					</tr>
					@endforelse
				</tbody>
				<tfoot>
					<tr>
						<td colspan="3">
						<ul class="pagination float-right">
							{{$books->links()}}
						</ul>
						</td>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</div>
@endsection
