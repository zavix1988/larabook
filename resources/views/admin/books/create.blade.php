@extends('admin.layouts.app_admin')

@section('content')
	<div class="container">
		@component('admin.components.breadcrumb')
			@slot('title')Добавить книгу@endslot
			@slot('parent')Главная@endslot
			@slot('active')Книги@endslot
		@endcomponent
		<hr/>
		<form class="form" action="{{route('admin.books.store')}}" method="POST">
			{{csrf_field()}}
			@include('admin.books.partials.form')
		</form>
	</div>
@endsection