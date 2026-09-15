@extends('painel.admin.template.app')
<title>MS System | Solução - Editar</title>
@section('content')

<div class="card">
  <div class="card-header">
    <h5 class="card-title">Editar Solução</h5>
    <a href="{{ route('solucao.index') }}" class="btn btn-outline-secondary"><i class="ti ti-arrow-left"></i> Voltar</a>
  </div>
  <div class="card-body">
    <form action="{{ route('solucao.update', $solucoes) }}" method="POST" enctype="multipart/form-data">
      @method('PUT')
      @include('painel.admin.solucao._formularios.form')
    </form>
  </div>
</div>

@endsection