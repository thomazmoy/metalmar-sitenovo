@extends('painel.admin.template.app')
<title>MS System | Galeria - Editar</title>
@section('content')

<div class="card">
  <div class="card-header">
    <h5 class="card-title">Editar Galeria</h5>
    <a href="{{ route('galeria.index') }}" class="btn btn-outline-secondary"><i class="ti ti-arrow-left"></i> Voltar</a>
  </div>
  <div class="card-body">
    <form action="{{ route('galeria.update', $galerias) }}" method="POST" enctype="multipart/form-data">
      @method('PUT')
      @include('painel.admin.galeria._formularios.form')
    </form>
  </div>
</div>

@endsection