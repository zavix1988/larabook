@extends('admin.layouts.app_admin')

@section('content')
	<div class="container">
		@component('admin.components.breadcrumb')
			@slot('title')Добавить автора@endslot
			@slot('parent')Главная@endslot
			@slot('active')Авторы@endslot
		@endcomponent
		<hr/>
		<form class="form" action="{{route('admin.authors.store')}}" method="POST">
			{{csrf_field()}}
			@include('admin.authors.partials.form')
		</form>
	</div>
@endsection
