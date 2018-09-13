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
      @include('user.callback.partials.form')
    </div>
  </div>
</div>

@endsection
