@extends('painel.admin.template.app')
<title>MS System | Categoria - Adicionar</title>
@section('content')

<div class="card">
  <div class="card-header">
    <h5 class="card-title">Adicionar Categoria</h5>
    <a href="{{ route('categoria.index') }}" class="btn btn-outline-secondary"><i class="ti ti-arrow-left"></i> Voltar</a>
  </div>
  <div class="card-body">
    <form action="{{ route('categoria.store') }}" method="POST" enctype="multipart/form-data">
      @include('painel.admin.categoria._formularios.form')
    </form>
  </div>
</div>

@endsection