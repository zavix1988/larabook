@extends('admin.layouts.app_admin')

@section('content')
	<div class="container">
		@component('admin.components.breadcrumb')
			@slot('title')Список авторов@endslot
			@slot('parent')Главная@endslot
			@slot('active')Авторы@endslot
		@endcomponent

		<a href="{{route('admin.authors.create')}}" class="btn btn-primary float-right"><i class="far fa-plus-square">&nbsp;Добавить</i></a>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Название</th>
					<th>Slug</th>
					<th>Автор жив?</th>
				</tr>
			</thead>
			<tbody>
				@forelse($authors as $author)
					<tr>
						<td>{{$author->name}}</td>
						<td>{{$author->slug}}</td>
						<td>
							@if ($author->alive == 0)
							    Умер
							@else
							    Жив
							@endif
						</td>
						<td><a class="btn btn-secondary float-right" href="{{route('admin.authors.edit', $author)}}"><i class="fas fa-edit"></i>&nbsp;Редактировать</a></td>
						<td class="float-right">
							<form onsubmit="if(confirm('Удалить?')){return true}else{return false}" action="{{route('admin.authors.destroy', $author)}}" method="post">
								{{ method_field('DELETE') }}
								{{ csrf_field() }}

								<button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i>&nbsp;Удалить</button>
							</form>
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
							{{$authors->links()}}
						</ul>
					</td>
				</tr>
			</tfoot>
		</table>

	</div>
@endsection
