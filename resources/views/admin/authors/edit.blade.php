@extends('admin.layouts.app_admin')

@section('content')
	<div class="container">
		@component('admin.components.breadcrumb')
			@slot('title')Редактировать автора@endslot
			@slot('parent')Главная@endslot
			@slot('active')Авторы@endslot
		@endcomponent

		<hr/>
		<form class="form" action="{{route('admin.authors.update', ['id'=>$author->id])}}" method="POST">
			{{ method_field('PUT') }}
			{{csrf_field()}}
			@include('admin.authors.partials.form')
		</form>
	</div>



</a>
@endsection
