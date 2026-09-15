@extends('template.app')

@section('metatags')
  @if(!empty($siteconfig->taghead))
    {!! $siteconfig->taghead !!}
  @endif
  <meta charset="utf-8">
  <title>{{ tr('Política de Privacidade') }} | {{ $siteconfig->nomesite ?? 'MetalMar' }}</title>
  <link rel="canonical" href="{{ url('politica-de-privacidade') }}">
  <meta property="og:url" content="{{ url('politica-de-privacidade') }}">
  <meta property="og:title" content="Política de Privacidade | {{ $siteconfig->nomesite ?? 'MetalMar' }}">
  <meta property="og:image:alt" content="Política de Privacidade | {{ $siteconfig->nomesite ?? 'MetalMar' }}">
  <meta name="twitter:url" content="{{ url('politica-de-privacidade') }}">
  <meta name="twitter:title" content="Política de Privacidade | {{ $siteconfig->nomesite ?? 'MetalMar' }}">
@endsection

@section('metatagsog')
  @include('template.metatags')
@endsection

@section('content')

  <!-- Page Header Breadcrumb -->
  <section class="subpage-hero" style="text-align: center;">
    <div class="container-custom">
      <div class="section-badge">
        <i class="ti ti-shield-lock"></i>
        <span>{{ tr('LGPD & Termos') }}</span>
      </div>
      <h1 class="subpage-hero-title">
        {{ tr('Política de Privacidade') }}
      </h1>
      <p class="subpage-hero-desc" style="margin: 0 auto;">
        {{ tr('Transparência, proteção de dados e respeito à privacidade dos nossos usuários e clientes.') }}
      </p>
    </div>
  </section>

  <!-- Content Section -->
  <section class="section-py section-bg-slate">
    <div class="container-custom" style="max-width: 900px;">
      
      <div class="article-card" style="padding: 3rem;">
        @foreach($privacidade as $item)
          <div style="margin-bottom: 2.5rem; padding-bottom: 2.5rem; border-bottom: 1px solid var(--slate-100);">
            <h2 style="font-size: 1.5rem; font-weight: 800; color: var(--navy-950); margin-bottom: 1.25rem;">
              {{ $item->titulo }}
            </h2>
            <div style="color: var(--slate-700); font-size: 1.05rem; line-height: 1.8;">
              {!! $item->texto !!}
            </div>
          </div>
        @endforeach
      </div>

    </div>
  </section>

@endsection