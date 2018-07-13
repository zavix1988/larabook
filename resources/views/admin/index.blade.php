@extends('admin.layouts.app_admin')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="card text-white bg-primary o-hidden h-100">
					<div class="card-body">
						<div class="card-body-icon">
						<i class="fas fa-book fa-2x"></i>
						</div>
						<h2>Книги</h2>
					</div>
					<a class="card-footer text-white clearfix small z-1" href="{{route('admin.books.index')}}">
						<span class="float-left">Перейти к книгам</span>
						<span class="float-right">
						<i class="fa fa-angle-right"></i>
						</span>
					</a>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card text-white bg-warning o-hidden h-100">
					<div class="card-body">
						<div class="card-body-icon">
						<i class="fas fa-user fa-2x"></i>
						</div>
						<h2>Авторы</h2>
					</div>
					<a class="card-footer text-white clearfix small z-1" href="{{route('admin.authors.index')}}">
						<span class="float-left">Перейти к авторам</span>
						<span class="float-right">
						<i class="fa fa-angle-right"></i>
						</span>
					</a>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card text-white bg-success o-hidden h-100">
					<div class="card-body">
						<div class="card-body-icon">
						<i class="fas fa-folder fa-2x"></i>
						</div>
						<h2>Жанры</h2>
					</div>
					<a class="card-footer text-white clearfix small z-1" href="{{route('admin.genres.index')}}">
						<span class="float-left">Перейти к жанрам</span>
						<span class="float-right">
						<i class="fa fa-angle-right"></i>
						</span>
					</a>
				</div>
			</div>
		</div>	
	</div>

@endsection