@extends('painel.admin.template.app')
<title>MS System | Contato - Editar</title>
@section('content')

<div class="card max-w-4xl mx-auto">
  <div class="card-header flex items-center justify-between">
    <div>
      <h5 class="card-title text-xl font-bold flex items-center gap-2">
        <i class="ti ti-edit text-primary text-2xl"></i> Editar Contato
      </h5>
      <p class="text-xs text-bodytext dark:text-darklink mt-1">Atualize os dados e a situação do contato #{{ $contatos->id }}</p>
    </div>
    <a href="{{ route('contato.index') }}" class="btn btn-outline-secondary">
      <i class="ti ti-arrow-left"></i> Voltar
    </a>
  </div>
  <div class="card-body">
    <form action="{{ route('contato.update', $contatos->id) }}" method="POST">
      @method('PUT')
      @include('painel.admin.contato._formularios.form')
    </form>
  </div>
</div>

@endsection