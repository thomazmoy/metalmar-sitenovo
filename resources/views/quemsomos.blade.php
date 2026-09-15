@extends('template.app')

@section('metatags')
  @if(!empty($siteconfig->taghead))
    {!! $siteconfig->taghead !!}
  @endif
  <meta charset="utf-8">
  <title>{{ tr('Quem Somos') }} | {{ $siteconfig->nomesite ?? 'MetalMar' }}</title>
  <link rel="canonical" href="{{ url('metalmar-manutencao-industrial-e-naval-em-belem-do-para') }}">
  <meta property="og:url" content="{{ url('metalmar-manutencao-industrial-e-naval-em-belem-do-para') }}">
  <meta property="og:title" content="Quem Somos | {{ $siteconfig->nomesite ?? 'MetalMar' }}">
  <meta property="og:image:alt" content="Quem Somos | {{ $siteconfig->nomesite ?? 'MetalMar' }}">
  <meta name="twitter:url" content="{{ url('metalmar-manutencao-industrial-e-naval-em-belem-do-para') }}">
  <meta name="twitter:title" content="Quem Somos | {{ $siteconfig->nomesite ?? 'MetalMar' }}">
@endsection

@section('metatagsog')
  @include('template.metatags')
@endsection

@section('content')

  <!-- Page Header Breadcrumb -->
  <section class="subpage-hero" style="text-align: center;">
    <div class="container-custom">
      <div class="section-badge">
        <i class="ti ti-building"></i>
        <span>{{ tr('Nossa Empresa') }}</span>
      </div>
      <h1 class="subpage-hero-title">
        {{ tr('Quem Somos') }}
      </h1>
      <p class="subpage-hero-desc" style="margin: 0 auto;">
        {{ tr('Conheça nossa trajetória, valores e o compromisso com a excelência em engenharia industrial e naval.') }}
      </p>
    </div>
  </section>

  <!-- Seção Institucional 1 -->
  @if($quemsomos)
    <section class="section-py section-bg-white">
      <div class="container-custom">
        <div class="about-grid">
          
          <div>
            @if($quemsomos->imgtres)
              <div class="about-img-box">
                <img src="{{ url('storage/' . $quemsomos->imgtres) }}" alt="{{ $quemsomos->titulodois }}">
              </div>
            @endif
          </div>

          <div>
            <div class="section-badge">
              <i class="ti ti-target"></i>
              <span>{{ tr('Missão & Propósito') }}</span>
            </div>
            <h2 class="section-title" style="margin-bottom: 1.25rem;">
              {{ $quemsomos->titulodois }}
            </h2>
            <div style="color: var(--slate-600); font-size: 1.05rem; line-height: 1.75;">
              {!! $quemsomos->textodois !!}
            </div>
          </div>

        </div>
      </div>
    </section>

    <!-- Áreas de Atuação -->
    <section class="section-py section-bg-slate">
      <div class="container-custom">
        <div class="section-header-center">
          <div class="section-badge">
            <i class="ti ti-compass"></i>
            <span>{{ tr('Nosso Foco') }}</span>
          </div>
          <h2 class="section-title">{{ tr('Nossas Áreas de Atuação') }}</h2>
        </div>

        <div class="services-grid">
          <div class="feature-card">
            <div class="feature-icon-wrapper">
              <i class="ti ti-building-factory-2" style="font-size: 2rem;"></i>
            </div>
            <h3 style="font-size: 1.4rem; font-weight: 800; color: var(--navy-950); margin-bottom: 0.75rem;">
              {{ tr('Manutenção Industrial') }}
            </h3>
            <p style="color: var(--slate-600); line-height: 1.7;">
              {{ tr('Atividade fundamental para garantir a eficiência e a segurança das máquinas e equipamentos utilizados nos processos produtivos.') }}
            </p>
          </div>

          <div class="feature-card">
            <div class="feature-icon-wrapper">
              <i class="ti ti-anchor" style="font-size: 2rem;"></i>
            </div>
            <h3 style="font-size: 1.4rem; font-weight: 800; color: var(--navy-950); margin-bottom: 0.75rem;">
              {{ tr('Manutenção Naval') }}
            </h3>
            <p style="color: var(--slate-600); line-height: 1.7;">
              {{ tr('É essencial para garantir a segurança e a durabilidade dos navios e embarcações que operam em navegação interior e alto-mar.') }}
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Seção Institucional 2 / Vídeo -->
    <section class="section-py section-bg-white">
      <div class="container-custom">
        <div class="about-grid">
          
          <div>
            <div class="section-badge">
              <i class="ti ti-star"></i>
              <span>{{ tr('Diferenciais') }}</span>
            </div>
            <h2 class="section-title" style="margin-bottom: 1.25rem;">
              {{ $quemsomos->titulotres }}
            </h2>
            <div style="color: var(--slate-600); font-size: 1.05rem; line-height: 1.75; margin-bottom: 2rem;">
              {!! $quemsomos->textotres !!}
            </div>
            <a href="{{ url('contato-metalmar-manutencao-industrial-e-naval-em-belem-do-para') }}" class="btn-primary">
              <span>{{ tr('Entre em Contato Conosco') }}</span>
              <i class="ti ti-arrow-right"></i>
            </a>
          </div>

          <div>
            @if(!empty($quemsomos->iframevideo))
              <div class="article-iframe-box" style="position: relative; padding-top: 56.25%; margin: 0;">
                <div style="position: absolute; inset: 0;">
                  {!! $quemsomos->iframevideo !!}
                </div>
              </div>
            @elseif($quemsomos->imgdois)
              <div class="about-img-box">
                <img src="{{ url('storage/' . $quemsomos->imgdois) }}" alt="{{ $quemsomos->titulotres }}">
              </div>
            @endif
          </div>

        </div>
      </div>
    </section>
  @endif

  <!-- Depoimentos -->
  @if($depoimento && $depoimento->count() > 0)
    <section class="section-py section-bg-navy">
      <div class="container-custom">
        <div class="section-header-center">
          <div class="section-badge" style="background: rgba(37,133,192,0.15); border-color: rgba(37,133,192,0.3);">
            <i class="ti ti-message-2"></i>
            <span>{{ tr('Depoimentos') }}</span>
          </div>
          <h2 class="section-title" style="color: #ffffff;">{{ tr('Depoimentos de Clientes') }}</h2>
        </div>

        <div class="testimonials-grid">
          @foreach($depoimento as $item)
            <div class="testimonial-card" style="background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.1); color: #ffffff;">
              <i class="ti ti-quote" style="font-size: 2.25rem; color: var(--primary); margin-bottom: 1rem;"></i>
              <p class="testimonial-quote" style="color: var(--slate-300);">
                "{{ $item->texto }}"
              </p>
              <div style="display: flex; align-items: center; gap: 0.85rem; padding-top: 1rem; border-top: 1px solid rgba(255, 255, 255, 0.08);">
                @if($item->img)
                  <img src="{{ url('storage/' . $item->img) }}" alt="{{ $item->nome }}" style="width: 2.75rem; height: 2.75rem; border-radius: 9999px; object-fit: cover; border: 2px solid var(--primary);">
                @else
                  <div style="width: 2.75rem; height: 2.75rem; border-radius: 9999px; background: var(--primary); color: #ffffff; display: flex; align-items: center; justify-content: center; font-weight: 700;">
                    {{ substr($item->nome, 0, 1) }}
                  </div>
                @endif
                <div>
                  <div class="testimonial-author" style="color: #ffffff;">{{ $item->nome }}</div>
                  <div class="testimonial-role">{{ $item->cargo }}</div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </section>
  @endif

@endsection