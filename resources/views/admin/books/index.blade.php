@extends('admin.layouts.app_admin')

@section('content')
	<div class="container">
		@component('admin.components.breadcrumb')
			@slot('title')Список книг@endslot
			@slot('parent')Главная@endslot
			@slot('active')Книги@endslot
		@endcomponent

		<hr/>

		<a href="{{route('admin.books.create')}}" class="btn btn-primary float-right"><i class="far fa-plus-square">&nbsp;Добавить книгу</i></a>
		<table class="table table-striped">
			<thead>
				<th>Название</th>
				<th>Цена</th>
				<th>Кол стр</th>
				<th>Дата публикации</th>
				<th>Язык</th>
			</thead>
			<tbody>
				@forelse($books as $book)
				<tr>
					<td>{{$book->name}}</td>
					<td>{{$book->price}}</td>
					<td>{{$book->pages}}</td>
					<td>{{$book->pubyear}}</td>
					<td>{{$book->lang}}</td>
					<td><a class="btn btn-secondary float-right" href="{{route('admin.books.edit', $book)}}"><i class="fas fa-edit"></i>&nbsp;Редактировать</a></td>
					<td class="float-right">
						<form onsubmit="if(confirm('Удалить?')){return true}else{return false}" action="{{route('admin.books.destroy', $book)}}" method="post">
							{{ method_field('DELETE') }}
							{{ csrf_field() }}

							<button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i>&nbsp;Удалить</button>
						</form>
					</td>
				</tr>

				@empty
				<tr>
					<td colspan="6" class="text-center"><h3>Данные отсутствуют</3></td>
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
@endsection