@extends('painel.admin.template.app')
<title>MS System | Depoimento - Visualizar</title>
@section('content')

<div class="card">
  <div class="card-header">
    <h5 class="card-title">Depoimento — Visualizar</h5>
    <div class="flex items-center gap-2">
      <a href="{{ route('depoimento.edit', $depoimentos->id) }}" class="btn btn-primary"><i class="ti ti-pencil"></i> Editar</a>
      <a href="{{ route('depoimento.index') }}" class="btn btn-outline-secondary"><i class="ti ti-arrow-left"></i> Voltar</a>
    </div>
  </div>
  <div class="card-body">

    <div class="flex flex-wrap gap-6">
      <div class="flex-1 min-w-0">
        <div class="mb-3">
          <p class="text-xs font-semibold uppercase tracking-wider text-bodytext dark:text-darklink mb-1">Nome</p>
          <h4 class="text-xl font-bold text-dark dark:text-white">{{ $depoimentos->nome }}</h4>
        </div>
        @if($depoimentos->cargo)
          <div class="mb-3">
            <p class="text-xs font-semibold uppercase tracking-wider text-bodytext dark:text-darklink mb-1">Cargo / Empresa</p>
            <p class="text-sm text-dark dark:text-white">{{ $depoimentos->cargo }}</p>
          </div>
        @endif
        @if($depoimentos->texto)
          <div class="mb-3">
            <p class="text-xs font-semibold uppercase tracking-wider text-bodytext dark:text-darklink mb-1">Depoimento</p>
            <div class="bg-slate-50 dark:bg-darkgray/30 rounded-xl border border-ld dark:border-darkborder p-4 text-sm text-dark dark:text-white">
              {{ $depoimentos->texto }}
            </div>
          </div>
        @endif
      </div>
      @if($depoimentos->img)
        <div>
          <p class="text-xs font-semibold text-bodytext dark:text-darklink mb-2">Foto</p>
          <img src='{{ url("storage/{$depoimentos->img}") }}' class="rounded-xl border border-ld dark:border-darkborder w-40 h-40 object-cover">
        </div>
      @endif
    </div>

  </div>
</div>

@endsection