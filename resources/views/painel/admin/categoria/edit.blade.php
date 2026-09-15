@extends('painel.admin.template.app')
<title>MS System | Categoria - Editar</title>
@section('content')

<div class="card">
  <div class="card-header">
    <h5 class="card-title">Editar Categoria</h5>
    <a href="{{ route('categoria.index') }}" class="btn btn-outline-secondary"><i class="ti ti-arrow-left"></i> Voltar</a>
  </div>
  <div class="card-body">
    <form action="{{ route('categoria.update', $categorias) }}" method="POST" enctype="multipart/form-data">
      @method('PUT')
      @include('painel.admin.categoria._formularios.form')
    </form>
  </div>
</div>

@endsection