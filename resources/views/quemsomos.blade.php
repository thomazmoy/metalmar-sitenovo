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
  <section style="background: linear-gradient(135deg, var(--navy-950) 0%, var(--navy-800) 100%); color: #ffffff; padding: 4.5rem 0; position: relative; border-bottom: 3px solid var(--primary);">
    <div class="container-custom" style="text-align: center;">
      <div class="section-badge" style="background: rgba(37,133,192,0.2); border-color: rgba(37,133,192,0.4);">
        <i class="ti ti-building"></i>
        <span>{{ tr('Nossa Empresa') }}</span>
      </div>
      <h1 style="font-size: 2.75rem; font-weight: 800; color: #ffffff; margin-bottom: 0.75rem;">
        {{ tr('Quem Somos') }}
      </h1>
      <p style="color: var(--slate-300); font-size: 1.1rem; max-width: 600px; margin: 0 auto;">
        {{ tr('Conheça nossa trajetória, valores e o compromisso com a excelência em engenharia industrial e naval.') }}
      </p>
    </div>
  </section>

  <!-- Seção Institucional 1 -->
  @if($quemsomos)
    <section style="padding: 5.5rem 0; background-color: #ffffff;">
      <div class="container-custom">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 3.5rem; align-items: center;">
          
          <div>
            @if($quemsomos->imgtres)
              <div style="border-radius: 1.25rem; overflow: hidden; box-shadow: 0 20px 40px -10px rgba(15, 23, 42, 0.15); border: 1px solid var(--slate-200);">
                <img src="{{ url('storage/' . $quemsomos->imgtres) }}" alt="{{ $quemsomos->titulodois }}" style="width: 100%; height: auto; display: block;">
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
    <section style="padding: 5rem 0; background-color: var(--slate-50); border-top: 1px solid var(--slate-200); border-bottom: 1px solid var(--slate-200);">
      <div class="container-custom">
        <div style="text-align: center; margin-bottom: 3.5rem;">
          <div class="section-badge">
            <i class="ti ti-compass"></i>
            <span>{{ tr('Nosso Foco') }}</span>
          </div>
          <h2 class="section-title">{{ tr('Nossas Áreas de Atuação') }}</h2>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
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
    <section style="padding: 5.5rem 0; background-color: #ffffff;">
      <div class="container-custom">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 3.5rem; align-items: center;">
          
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
              <div style="border-radius: 1.25rem; overflow: hidden; box-shadow: 0 20px 40px -10px rgba(15, 23, 42, 0.15); border: 1px solid var(--slate-200); position: relative; padding-top: 56.25%;">
                <div style="position: absolute; inset: 0;">
                  {!! $quemsomos->iframevideo !!}
                </div>
              </div>
            @elseif($quemsomos->imgdois)
              <div style="border-radius: 1.25rem; overflow: hidden; box-shadow: 0 20px 40px -10px rgba(15, 23, 42, 0.15); border: 1px solid var(--slate-200);">
                <img src="{{ url('storage/' . $quemsomos->imgdois) }}" alt="{{ $quemsomos->titulotres }}" style="width: 100%; height: auto; display: block;">
              </div>
            @endif
          </div>

        </div>
      </div>
    </section>
  @endif

  <!-- Depoimentos -->
  @if($depoimento && $depoimento->count() > 0)
    <section style="padding: 5.5rem 0; background-color: var(--navy-950); color: #ffffff;">
      <div class="container-custom">
        <div style="text-align: center; margin-bottom: 3.5rem;">
          <div class="section-badge" style="background: rgba(37,133,192,0.15); border-color: rgba(37,133,192,0.3);">
            <i class="ti ti-message-2"></i>
            <span>{{ tr('Depoimentos') }}</span>
          </div>
          <h2 class="section-title" style="color: #ffffff;">{{ tr('Depoimentos de Clientes') }}</h2>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
          @foreach($depoimento as $item)
            <div style="background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 1rem; padding: 2rem; display: flex; flex-direction: column;">
              <i class="ti ti-quote" style="font-size: 2.25rem; color: var(--primary); margin-bottom: 1rem;"></i>
              <p style="color: var(--slate-300); font-size: 0.9375rem; line-height: 1.7; margin-bottom: 1.5rem; flex-grow: 1;">
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
                  <div style="font-weight: 700; color: #ffffff; font-size: 0.9375rem;">{{ $item->nome }}</div>
                  <div style="color: var(--slate-400); font-size: 0.8125rem;">{{ $item->cargo }}</div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </section>
  @endif

@endsection