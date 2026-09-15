@extends('painel.admin.template.app')
<title>MS System | Contato - Adicionar</title>
@section('content')

<div class="card max-w-4xl mx-auto">
  <div class="card-header flex items-center justify-between">
    <div>
      <h5 class="card-title text-xl font-bold flex items-center gap-2">
        <i class="ti ti-mail-plus text-primary text-2xl"></i> Adicionar Contato Manual
      </h5>
      <p class="text-xs text-bodytext dark:text-darklink mt-1">Cadastre uma nova solicitação ou mensagem de contato</p>
    </div>
    <a href="{{ route('contato.index') }}" class="btn btn-outline-secondary">
      <i class="ti ti-arrow-left"></i> Voltar
    </a>
  </div>
  <div class="card-body">
    <form action="{{ route('contato.store') }}" method="POST">
      @include('painel.admin.contato._formularios.form')
    </form>
  </div>
</div>

@endsection