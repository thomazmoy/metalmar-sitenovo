@extends('painel.admin.template.app')
<title>MS System | Depoimento - Editar</title>
@section('content')

<div class="card">
  <div class="card-header">
    <h5 class="card-title">Editar Depoimento</h5>
    <a href="{{ route('depoimento.index') }}" class="btn btn-outline-secondary"><i class="ti ti-arrow-left"></i> Voltar</a>
  </div>
  <div class="card-body">
    <form action="{{ route('depoimento.update', $depoimentos) }}" method="POST" enctype="multipart/form-data">
      @method('PUT')
      @include('painel.admin.depoimento._formularios.form')
    </form>
  </div>
</div>

@endsection