@extends('painel.admin.template.app')
<title>MS System | Galeria - Visualizar</title>
@section('content')

<div class="card">
  <div class="card-header">
    <h5 class="card-title">Galeria — Visualizar</h5>
    <div class="flex items-center gap-2">
      <a href="{{ route('galeria.edit', $galerias->id) }}" class="btn btn-primary"><i class="ti ti-pencil"></i> Editar</a>
      <a href="{{ route('galeria.index') }}" class="btn btn-outline-secondary"><i class="ti ti-arrow-left"></i> Voltar</a>
    </div>
  </div>
  <div class="card-body">

    <div class="mb-4">
      <p class="text-xs font-semibold uppercase tracking-wider text-bodytext dark:text-darklink mb-1">Título</p>
      <h4 class="text-xl font-bold text-dark dark:text-white">{{ $galerias->titulo }}</h4>
    </div>

    @if($galerias->descricao)
      <div class="mb-4">
        <p class="text-xs font-semibold uppercase tracking-wider text-bodytext dark:text-darklink mb-1">Descrição</p>
        <p class="text-sm text-dark dark:text-white">{{ $galerias->descricao }}</p>
      </div>
    @endif

    @if($galerias->img)
      <div class="mt-4">
        <p class="text-xs font-semibold text-bodytext dark:text-darklink mb-2">Imagem</p>
        <img src='{{ url("storage/{$galerias->img}") }}' class="rounded-xl border border-ld dark:border-darkborder max-w-xs object-cover">
      </div>
    @endif

  </div>
</div>

@endsection