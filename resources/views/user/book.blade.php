@extends('user.layouts.app_user')

@section('content')
	<div class="container">
		@component('user.components.breadcrumb')
			@slot('title')Книга@endslot
			@slot('parent')Главная@endslot
			@slot('active')Книги@endslot
		@endcomponent
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
				<tr>
					<td>{{$book->name}}</td>
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
			</tbody>


		</table>
	</div>
@endsection