@extends('template.app')

@section('metatags')
  @if(!empty($siteconfig->taghead))
    {!! $siteconfig->taghead !!}
  @endif
  <meta charset="utf-8">
  <title>{{ tr('Soluções MetalMar') }} | {{ $siteconfig->nomesite ?? 'MetalMar' }}</title>
  <link rel="canonical" href="{{ url('solucoes-em-manutencao-industrial-e-naval-em-belem-do-para') }}">
  <meta property="og:url" content="{{ url('solucoes-em-manutencao-industrial-e-naval-em-belem-do-para') }}">
  <meta property="og:title" content="Soluções | {{ $siteconfig->nomesite ?? 'MetalMar' }}">
  <meta property="og:image:alt" content="Soluções | {{ $siteconfig->nomesite ?? 'MetalMar' }}">
  <meta name="twitter:url" content="{{ url('solucoes-em-manutencao-industrial-e-naval-em-belem-do-para') }}">
  <meta name="twitter:title" content="Soluções | {{ $siteconfig->nomesite ?? 'MetalMar' }}">
@endsection

@section('metatagsog')
  @include('template.metatags')
@endsection

@section('content')

  <!-- Page Header Breadcrumb -->
  <section class="subpage-hero" style="text-align: center;">
    <div class="container-custom">
      <div class="section-badge">
        <i class="ti ti-tool"></i>
        <span>{{ tr('Serviços & Engenharia') }}</span>
      </div>
      <h1 class="subpage-hero-title">
        {{ tr('Soluções MetalMar') }}
      </h1>
      <p class="subpage-hero-desc" style="margin: 0 auto;">
        {{ tr('Engenharia diagnóstica, manutenção mecânica, caldeiraria e serviços especializados com qualidade garantida.') }}
      </p>
    </div>
  </section>

  <!-- Catálogo de Soluções -->
  <section class="section-py section-bg-slate">
    <div class="container-custom">
      
      <div class="services-grid">
        @foreach($solucao as $item)
          @if($item->situacao == '1')
            <article class="service-card">
              <a href="{{ url('solucoes/' . $item->urltitulo) }}" class="service-card-media">
                @if($item->img)
                  <img src="{{ url('storage/' . $item->img) }}" alt="{{ $item->titulo }}" loading="lazy">
                @endif
              </a>
              <div class="service-card-body">
                <h3 class="service-card-title">
                  <a href="{{ url('solucoes/' . $item->urltitulo) }}" class="footer-link" style="color: var(--navy-950);">
                    {{ $item->titulo }}
                  </a>
                </h3>
                
                <div class="service-card-text" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                  {!! strip_tags($item->descricaodois ?: $item->descricao) !!}
                </div>

                <div style="margin-top: auto; padding-top: 1.25rem; border-top: 1px solid var(--slate-100); display: flex; align-items: center; justify-content: space-between;">
                  <a href="{{ url('solucoes/' . $item->urltitulo) }}" class="service-card-link">
                    <span>{{ tr('Ver Detalhes') }}</span>
                    <i class="ti ti-arrow-right"></i>
                  </a>
                  
                  @if(!empty($siteconfig->whatsapp))
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $siteconfig->whatsapp) }}?text={{ urlencode('Olá, tenho interesse na solução: ' . $item->titulo) }}" target="_blank" title="Orçamento WhatsApp" style="color: #25d366; font-size: 1.25rem;">
                      <i class="ti ti-brand-whatsapp"></i>
                    </a>
                  @endif
                </div>
              </div>
            </article>
          @endif
        @endforeach
      </div>

    </div>
  </section>

@endsection