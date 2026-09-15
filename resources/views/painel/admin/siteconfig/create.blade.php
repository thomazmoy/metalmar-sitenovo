@extends('painel.admin.template.app')
<title>MS System | Configurações do Site - Adicionar</title>
@section('content')

<div class="card">
  <div class="card-header">
    <h5 class="card-title">Configurações do Site</h5>
    <a href="{{ route('siteconfig.index') }}" class="btn btn-outline-secondary"><i class="ti ti-arrow-left"></i> Voltar</a>
  </div>
  <div class="card-body">
    <form action="{{ route('siteconfig.store') }}" method="POST" enctype="multipart/form-data">
      @include('painel.admin.siteconfig._formularios.form')
    </form>
  </div>
</div>

@endsection