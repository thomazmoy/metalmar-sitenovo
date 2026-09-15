@extends('painel.admin.template.app')
<title>MS System | Banner - Visualizar</title>
@section('content')

<div class="card">
  <div class="card-header">
    <h5 class="card-title">Banner — Visualizar</h5>
    <div class="flex items-center gap-2">
      <a href="{{ route('banner.edit', $banners->id) }}" class="btn btn-primary"><i class="ti ti-pencil"></i> Editar</a>
      <a href="{{ route('banner.index') }}" class="btn btn-outline-secondary"><i class="ti ti-arrow-left"></i> Voltar</a>
    </div>
  </div>
  <div class="card-body">

    <div class="mb-4">
      <p class="text-xs font-semibold uppercase tracking-wider text-bodytext dark:text-darklink mb-1">Título</p>
      <h4 class="text-xl font-bold text-dark dark:text-white">{{ $banners->titulo }}</h4>
    </div>

    @if($banners->linkbanner)
      <div class="mb-4">
        <p class="text-xs font-semibold uppercase tracking-wider text-bodytext dark:text-darklink mb-1">Link do Banner</p>
        <a href="{{ $banners->linkbanner }}" target="_blank" class="text-sm text-primary hover:underline">{{ $banners->linkbanner }}</a>
      </div>
    @endif

    <div class="flex flex-wrap gap-6 mt-4">
      @if($banners->imgbanner)
        <div>
          <p class="text-xs font-semibold text-bodytext dark:text-darklink mb-2">Imagem Desktop</p>
          <img src='{{ url("storage/{$banners->imgbanner}") }}' class="rounded-xl border border-ld dark:border-darkborder max-w-xs object-cover">
        </div>
      @endif
      @if($banners->imgmobile)
        <div>
          <p class="text-xs font-semibold text-bodytext dark:text-darklink mb-2">Imagem Mobile</p>
          <img src='{{ url("storage/{$banners->imgmobile}") }}' class="rounded-xl border border-ld dark:border-darkborder max-w-[160px] object-cover">
        </div>
      @endif
    </div>

  </div>
</div>

@endsection