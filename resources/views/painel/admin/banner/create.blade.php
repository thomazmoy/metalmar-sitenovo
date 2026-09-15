@extends('painel.admin.template.app')
<title>MS System | Banner - Adicionar</title>
@section('content')

<div class="card">
  <div class="card-header">
    <h5 class="card-title">Adicionar Banner</h5>
    <a href="{{ route('banner.index') }}" class="btn btn-outline-secondary"><i class="ti ti-arrow-left"></i> Voltar</a>
  </div>
  <div class="card-body">
    <form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
      @include('painel.admin.banner._formularios.form')
    </form>
  </div>
</div>

@endsection