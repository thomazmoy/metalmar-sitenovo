@extends('painel.admin.template.app')
<title>MS System | Galeria - Adicionar</title>
@section('content')

<div class="card">
  <div class="card-header">
    <h5 class="card-title">Adicionar Galeria</h5>
    <a href="{{ route('galeria.index') }}" class="btn btn-outline-secondary"><i class="ti ti-arrow-left"></i> Voltar</a>
  </div>
  <div class="card-body">
    <form action="{{ route('galeria.store') }}" method="POST" enctype="multipart/form-data">
      @include('painel.admin.galeria._formularios.form')
    </form>
  </div>
</div>

@endsection