@extends('painel.admin.template.app')
<title>MS System | Solução - Adicionar</title>
@section('content')

<div class="card">
  <div class="card-header">
    <h5 class="card-title">Adicionar Solução</h5>
    <a href="{{ route('solucao.index') }}" class="btn btn-outline-secondary"><i class="ti ti-arrow-left"></i> Voltar</a>
  </div>
  <div class="card-body">
    <form action="{{ route('solucao.store') }}" method="POST" enctype="multipart/form-data">
      @include('painel.admin.solucao._formularios.form')
    </form>
  </div>
</div>

@endsection