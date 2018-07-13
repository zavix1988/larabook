@extends('admin.layouts.app_admin')

@section('content')
	<div class="container">
		@component('admin.components.breadcrumb')
			@slot('title')Редактировать книгу@endslot
			@slot('parent')Главная@endslot
			@slot('active')Книги@endslot
		@endcomponent
		<form class="form" action="{{route('admin.books.update', $book)}}" method="POST">
			{{ method_field('PUT') }}
			{{csrf_field()}}
			@include('admin.books.partials.form')
		</form>
	</div>
@endsection