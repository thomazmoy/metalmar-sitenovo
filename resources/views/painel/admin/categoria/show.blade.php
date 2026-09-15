@extends('painel.admin.template.app')
<title>MS System | Categoria - Visualizar</title>
@section('content')

<div class="card">
  <div class="card-header">
    <h5 class="card-title">Categoria — Visualizar</h5>
    <div class="flex items-center gap-2">
      <a href="{{ route('categoria.edit', $categorias->id) }}" class="btn btn-primary"><i class="ti ti-pencil"></i> Editar</a>
      <a href="{{ route('categoria.index') }}" class="btn btn-outline-secondary"><i class="ti ti-arrow-left"></i> Voltar</a>
    </div>
  </div>
  <div class="card-body">
    <div class="mb-4">
      <p class="text-xs font-semibold uppercase tracking-wider text-bodytext dark:text-darklink mb-1">Nome da Categoria</p>
      <h4 class="text-xl font-bold text-dark dark:text-white">{{ $categorias->nome }}</h4>
    </div>
  </div>
</div>

@endsection