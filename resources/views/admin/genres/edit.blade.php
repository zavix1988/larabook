@extends('admin.layouts.app_admin')

@section('content')
	<div class="container">
		@component('admin.components.breadcrumb')
			@slot('title')Редактировать жанр@endslot
			@slot('parent')Главная@endslot
			@slot('active')Жанры@endslot
		@endcomponent
		<hr/>
		<form class="form" action="{{route('admin.genres.update', ['id'=>$genre->id])}}" method="POST">
			{{ method_field('PUT') }}
			{{csrf_field()}}
			@include('admin.genres.partials.form')
		</form>
	</div>
@endsection