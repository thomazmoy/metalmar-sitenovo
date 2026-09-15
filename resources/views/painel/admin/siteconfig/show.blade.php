@extends('painel.admin.template.app')
<title>MS System | Configurações do Site - Visualizar</title>
@section('content')

<div class="card">
  <div class="card-header">
    <h5 class="card-title">Configurações do Site — Visualizar</h5>
    <div class="flex items-center gap-2">
      <a href="{{ route('siteconfig.edit', $siteconfigs->id) }}" class="btn btn-primary"><i class="ti ti-pencil"></i> Editar</a>
      <a href="{{ route('siteconfig.index') }}" class="btn btn-outline-secondary"><i class="ti ti-arrow-left"></i> Voltar</a>
    </div>
  </div>
  <div class="card-body">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

      {{-- Linha 1: Nome e Descrição --}}
      <div class="bg-slate-50 dark:bg-darkgray/30 rounded-xl border border-ld dark:border-darkborder p-4">
        <p class="text-xs font-semibold uppercase tracking-wider text-bodytext dark:text-darklink mb-1">Nome do Site</p>
        <p class="text-sm font-bold text-dark dark:text-white">{{ $siteconfigs->nomesite }}</p>
      </div>
      <div class="bg-slate-50 dark:bg-darkgray/30 rounded-xl border border-ld dark:border-darkborder p-4">
        <p class="text-xs font-semibold uppercase tracking-wider text-bodytext dark:text-darklink mb-1">Descrição</p>
        <p class="text-sm text-dark dark:text-white">{{ $siteconfigs->descricao }}</p>
      </div>

      {{-- Palavras-chave --}}
      <div class="bg-slate-50 dark:bg-darkgray/30 rounded-xl border border-ld dark:border-darkborder p-4 md:col-span-2">
        <p class="text-xs font-semibold uppercase tracking-wider text-bodytext dark:text-darklink mb-1">Palavras-Chave</p>
        <p class="text-sm text-dark dark:text-white">{{ $siteconfigs->palavraschave }}</p>
      </div>

      {{-- Contato --}}
      <div class="bg-slate-50 dark:bg-darkgray/30 rounded-xl border border-ld dark:border-darkborder p-4">
        <p class="text-xs font-semibold uppercase tracking-wider text-bodytext dark:text-darklink mb-1">Email</p>
        <p class="text-sm text-dark dark:text-white">{{ $siteconfigs->email }}</p>
      </div>
      <div class="bg-slate-50 dark:bg-darkgray/30 rounded-xl border border-ld dark:border-darkborder p-4">
        <p class="text-xs font-semibold uppercase tracking-wider text-bodytext dark:text-darklink mb-1">Celular</p>
        <p class="text-sm text-dark dark:text-white">{{ $siteconfigs->celular }}</p>
      </div>

      @if(!empty($siteconfigs->telefone))
      <div class="bg-slate-50 dark:bg-darkgray/30 rounded-xl border border-ld dark:border-darkborder p-4">
        <p class="text-xs font-semibold uppercase tracking-wider text-bodytext dark:text-darklink mb-1">Telefone</p>
        <p class="text-sm text-dark dark:text-white">{{ $siteconfigs->telefone }}</p>
      </div>
      @endif

      {{-- Endereço --}}
      <div class="bg-slate-50 dark:bg-darkgray/30 rounded-xl border border-ld dark:border-darkborder p-4 md:col-span-2">
        <p class="text-xs font-semibold uppercase tracking-wider text-bodytext dark:text-darklink mb-1">Endereço</p>
        <p class="text-sm text-dark dark:text-white">{{ $siteconfigs->endereco }}</p>
      </div>

      @if(!empty($siteconfigs->linkendereco))
      <div class="bg-slate-50 dark:bg-darkgray/30 rounded-xl border border-ld dark:border-darkborder p-4">
        <p class="text-xs font-semibold uppercase tracking-wider text-bodytext dark:text-darklink mb-1">Link do Google Maps</p>
        <a href="{{ $siteconfigs->linkendereco }}" target="_blank" class="text-sm text-primary hover:underline">{{ $siteconfigs->linkendereco }}</a>
      </div>
      @endif

      {{-- Redes Sociais --}}
      @if(!empty($siteconfigs->facebook))
      <div class="bg-slate-50 dark:bg-darkgray/30 rounded-xl border border-ld dark:border-darkborder p-4">
        <p class="text-xs font-semibold uppercase tracking-wider text-bodytext dark:text-darklink mb-1"><i class="ti ti-brand-facebook"></i> Facebook</p>
        <p class="text-sm text-dark dark:text-white">{{ $siteconfigs->facebook }}</p>
      </div>
      @endif
      @if(!empty($siteconfigs->instagram))
      <div class="bg-slate-50 dark:bg-darkgray/30 rounded-xl border border-ld dark:border-darkborder p-4">
        <p class="text-xs font-semibold uppercase tracking-wider text-bodytext dark:text-darklink mb-1"><i class="ti ti-brand-instagram"></i> Instagram</p>
        <p class="text-sm text-dark dark:text-white">{{ $siteconfigs->instagram }}</p>
      </div>
      @endif
      @if(!empty($siteconfigs->whatsapp))
      <div class="bg-slate-50 dark:bg-darkgray/30 rounded-xl border border-ld dark:border-darkborder p-4">
        <p class="text-xs font-semibold uppercase tracking-wider text-bodytext dark:text-darklink mb-1"><i class="ti ti-brand-whatsapp"></i> WhatsApp</p>
        <p class="text-sm text-dark dark:text-white">{{ $siteconfigs->whatsapp }}</p>
      </div>
      @endif
      @if(!empty($siteconfigs->twitter))
      <div class="bg-slate-50 dark:bg-darkgray/30 rounded-xl border border-ld dark:border-darkborder p-4">
        <p class="text-xs font-semibold uppercase tracking-wider text-bodytext dark:text-darklink mb-1"><i class="ti ti-brand-twitter"></i> Twitter / X</p>
        <p class="text-sm text-dark dark:text-white">{{ $siteconfigs->twitter }}</p>
      </div>
      @endif
      @if(!empty($siteconfigs->linkedin))
      <div class="bg-slate-50 dark:bg-darkgray/30 rounded-xl border border-ld dark:border-darkborder p-4">
        <p class="text-xs font-semibold uppercase tracking-wider text-bodytext dark:text-darklink mb-1"><i class="ti ti-brand-linkedin"></i> LinkedIn</p>
        <p class="text-sm text-dark dark:text-white">{{ $siteconfigs->linkedin }}</p>
      </div>
      @endif
      @if(!empty($siteconfigs->youtube))
      <div class="bg-slate-50 dark:bg-darkgray/30 rounded-xl border border-ld dark:border-darkborder p-4">
        <p class="text-xs font-semibold uppercase tracking-wider text-bodytext dark:text-darklink mb-1"><i class="ti ti-brand-youtube"></i> YouTube</p>
        <p class="text-sm text-dark dark:text-white">{{ $siteconfigs->youtube }}</p>
      </div>
      @endif

      {{-- Códigos avançados --}}
      @if(!empty($siteconfigs->facebookid))
      <div class="bg-slate-50 dark:bg-darkgray/30 rounded-xl border border-ld dark:border-darkborder p-4">
        <p class="text-xs font-semibold uppercase tracking-wider text-bodytext dark:text-darklink mb-1">Facebook App ID</p>
        <p class="text-sm text-dark dark:text-white">{{ $siteconfigs->facebookid }}</p>
      </div>
      @endif
      @if(!empty($siteconfigs->codchat))
      <div class="bg-slate-50 dark:bg-darkgray/30 rounded-xl border border-ld dark:border-darkborder p-4 md:col-span-2">
        <p class="text-xs font-semibold uppercase tracking-wider text-bodytext dark:text-darklink mb-1">Código para Chat (fim da tag body)</p>
        <pre class="text-xs text-dark dark:text-white whitespace-pre-wrap">{{ $siteconfigs->codchat }}</pre>
      </div>
      @endif
      @if(!empty($siteconfigs->taghead))
      <div class="bg-slate-50 dark:bg-darkgray/30 rounded-xl border border-ld dark:border-darkborder p-4 md:col-span-2">
        <p class="text-xs font-semibold uppercase tracking-wider text-bodytext dark:text-darklink mb-1">Código para tag HEAD</p>
        <pre class="text-xs text-dark dark:text-white whitespace-pre-wrap">{{ $siteconfigs->taghead }}</pre>
      </div>
      @endif

    </div>

    {{-- Imagens do mapa, favicon, logos --}}
    @if(!empty($siteconfigs->iframemapa))
    <div class="mt-4 rounded-xl overflow-hidden border border-ld dark:border-darkborder max-w-xl">
      <p class="text-xs font-semibold uppercase tracking-wider text-bodytext dark:text-darklink px-4 pt-3 mb-2">Mapa (iframe)</p>
      {!! $siteconfigs->iframemapa !!}
    </div>
    @endif

    <div class="flex flex-wrap gap-6 mt-6">
      @if($siteconfigs->favicon)
      <div>
        <p class="text-xs font-semibold text-bodytext dark:text-darklink mb-2">Favicon</p>
        <img src='{{ url("storage/{$siteconfigs->favicon}") }}' class="rounded-lg border border-ld dark:border-darkborder bg-white dark:bg-darkgray p-2 w-14 h-14 object-contain">
      </div>
      @endif
      @if($siteconfigs->logobranca)
      <div>
        <p class="text-xs font-semibold text-bodytext dark:text-darklink mb-2">Logo Clara</p>
        <img src='{{ url("storage/{$siteconfigs->logobranca}") }}' class="rounded-xl border border-ld dark:border-darkborder bg-gray-800 p-3 max-w-[200px] object-contain">
      </div>
      @endif
      @if($siteconfigs->logoescura)
      <div>
        <p class="text-xs font-semibold text-bodytext dark:text-darklink mb-2">Logo Escura</p>
        <img src='{{ url("storage/{$siteconfigs->logoescura}") }}' class="rounded-xl border border-ld dark:border-darkborder bg-white p-3 max-w-[200px] object-contain">
      </div>
      @endif
    </div>

  </div>
</div>

@endsection