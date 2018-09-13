@extends('layouts.app')

@section('content')

<div class="container">

  @component('user.components.breadcrumb')
    @slot('title') Служба поддержки @endslot
    @slot('parent') Главная @endslot
    @slot('active') Служба поддержки @endslot
  @endcomponent

  <div class="row">


    <!-- Таблица с книгами -->
    <div class="col-sm-12">
      <div class="card-header">
          <h2 class="text-center">Обратная связь</h2>
      </div>

    <h3>Письмо отправлено</h3>
    <a class="btn btn-primary active" role="button" aria-pressed="true" href="{{route('index.callback')}}">Назад</a>  

    </div>
  </div>
</div>

@endsection
