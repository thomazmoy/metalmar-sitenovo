@extends('painel.admin.template.app')
<title>MS System | Solução - Visualizar</title>
@section('content')

<div class="card">
  <div class="card-header">
    <div class="flex items-center gap-3">
      <h5 class="card-title">{{ $solucoes->titulo }}</h5>
      @if($solucoes->situacao == '0')
        <span class="badge-status badge-cancelado">Off</span>
      @else
        <span class="badge-status badge-finalizado">On</span>
      @endif
    </div>
    <div class="flex items-center gap-2">
      <a href="{{ route('solucao.edit', $solucoes->id) }}" class="btn btn-primary"><i class="ti ti-pencil"></i> Editar</a>
      <a href="{{ route('solucao.index') }}" class="btn btn-outline-secondary"><i class="ti ti-arrow-left"></i> Voltar</a>
    </div>
  </div>
  <div class="card-body">

    <div class="flex flex-wrap gap-6">
      {{-- Info principal --}}
      <div class="flex-1 min-w-0">

        @if($solucoes->urltitulo)
          <div class="mb-3">
            <p class="text-xs font-semibold uppercase tracking-wider text-bodytext dark:text-darklink mb-1">URL Amigável</p>
            <a href="{{ url('/solucoes/'.$solucoes->urltitulo) }}" target="_blank" class="text-sm text-primary hover:underline">
              {{ url('/solucoes/'.$solucoes->urltitulo) }}
            </a>
          </div>
        @endif

        @if($solucoes->descricao)
          <div class="mb-3">
            <p class="text-xs font-semibold uppercase tracking-wider text-bodytext dark:text-darklink mb-1">Descrição</p>
            <p class="text-sm text-dark dark:text-white">{{ $solucoes->descricao }}</p>
          </div>
        @endif

        @if($solucoes->texto)
          <div class="mb-3">
            <p class="text-xs font-semibold uppercase tracking-wider text-bodytext dark:text-darklink mb-1">Conteúdo</p>
            <div class="bg-slate-50 dark:bg-darkgray/30 rounded-xl border border-ld dark:border-darkborder p-4 prose prose-sm max-w-none dark:prose-invert">
              {!! $solucoes->texto !!}
            </div>
          </div>
        @endif

      </div>

      {{-- Imagens --}}
      <div class="flex flex-col gap-3 min-w-[180px]">
        @if($solucoes->img)
          <div>
            <p class="text-xs font-semibold text-bodytext dark:text-darklink mb-1">Imagem 1</p>
            <img src='{{ url("storage/{$solucoes->img}") }}' class="rounded-xl border border-ld dark:border-darkborder w-44 object-cover">
          </div>
        @endif
        @if($solucoes->img2)
          <div>
            <p class="text-xs font-semibold text-bodytext dark:text-darklink mb-1">Imagem 2</p>
            <img src='{{ url("storage/{$solucoes->img2}") }}' class="rounded-xl border border-ld dark:border-darkborder w-44 object-cover">
          </div>
        @endif
        @if($solucoes->img3)
          <div>
            <p class="text-xs font-semibold text-bodytext dark:text-darklink mb-1">Imagem 3</p>
            <img src='{{ url("storage/{$solucoes->img3}") }}' class="rounded-xl border border-ld dark:border-darkborder w-44 object-cover">
          </div>
        @endif
      </div>
    </div>

  </div>
</div>

@endsection