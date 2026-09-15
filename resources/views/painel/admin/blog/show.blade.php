@extends('painel.admin.template.app')
<title>MS System | Blog - Visualizar</title>
@section('content')

<div class="card">
  <div class="card-header">
    <h5 class="card-title">Blog — Visualizar</h5>
    <div class="flex items-center gap-2">
      <a href="{{ route('blog.edit', $blogs->id) }}" class="btn btn-primary"><i class="ti ti-pencil"></i> Editar</a>
      <a href="{{ route('blog.index') }}" class="btn btn-outline-secondary"><i class="ti ti-arrow-left"></i> Voltar</a>
    </div>
  </div>
  <div class="card-body">

    <div class="flex flex-wrap gap-6">
      {{-- Info principal --}}
      <div class="flex-1 min-w-0">
        <p class="text-xs font-semibold uppercase tracking-wider text-bodytext dark:text-darklink mb-1">
          {{ \Carbon\Carbon::parse($blogs->created_at)->locale('pt_BR')->isoFormat('DD [de] MMMM [de] YYYY') }}
        </p>
        <h4 class="text-xl font-bold text-dark dark:text-white mb-2">{{ $blogs->titulo }}</h4>
        <p class="text-sm text-bodytext dark:text-darklink mb-1">
          <span class="font-medium">Categoria:</span> {{ $blogs->categoria->nome }}
        </p>
        <p class="text-sm text-bodytext dark:text-darklink mb-4">
          <span class="font-medium">URL amigável:</span>
          <a href="{{ url('/blog/'.$blogs->urltitulo) }}" target="_blank" class="text-primary hover:underline">
            {{ url('/blog/'.$blogs->urltitulo) }}
          </a>
        </p>

        {{-- Conteúdo --}}
        <div class="bg-slate-50 dark:bg-darkgray/30 rounded-xl border border-ld dark:border-darkborder p-4 prose prose-sm max-w-none dark:prose-invert">
          {!! $blogs->texto !!}
        </div>

        @if($blogs->iframe)
          <div class="mt-4 rounded-xl overflow-hidden border border-ld dark:border-darkborder">
            {!! $blogs->iframe !!}
          </div>
        @endif
      </div>

      {{-- Imagens --}}
      <div class="flex flex-col gap-3 min-w-[200px]">
        @if($blogs->img)
          <div>
            <p class="text-xs font-semibold text-bodytext dark:text-darklink mb-1">Imagem 1 (Capa)</p>
            <img src='{{ url("storage/{$blogs->img}") }}' class="rounded-xl border border-ld dark:border-darkborder w-48 object-cover">
          </div>
        @endif
        @if($blogs->img2)
          <div>
            <p class="text-xs font-semibold text-bodytext dark:text-darklink mb-1">Imagem 2</p>
            <img src='{{ url("storage/{$blogs->img2}") }}' class="rounded-xl border border-ld dark:border-darkborder w-48 object-cover">
          </div>
        @endif
        @if($blogs->img3)
          <div>
            <p class="text-xs font-semibold text-bodytext dark:text-darklink mb-1">Imagem 3</p>
            <img src='{{ url("storage/{$blogs->img3}") }}' class="rounded-xl border border-ld dark:border-darkborder w-48 object-cover">
          </div>
        @endif
        @if($blogs->imgwhats)
          <div>
            <p class="text-xs font-semibold text-bodytext dark:text-darklink mb-1">Imagem WhatsApp</p>
            <img src='{{ url("storage/{$blogs->imgwhats}") }}' class="rounded-xl border border-ld dark:border-darkborder w-48 object-cover">
          </div>
        @endif
      </div>
    </div>

  </div>
</div>

@endsection