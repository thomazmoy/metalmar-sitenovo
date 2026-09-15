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
  <section style="background: linear-gradient(135deg, var(--navy-950) 0%, var(--navy-800) 100%); color: #ffffff; padding: 4.5rem 0; position: relative; border-bottom: 3px solid var(--primary);">
    <div class="container-custom" style="text-align: center;">
      <div class="section-badge" style="background: rgba(230,70,30,0.2); border-color: rgba(230,70,30,0.4);">
        <i class="ti ti-tool"></i>
        <span>{{ tr('Serviços & Engenharia') }}</span>
      </div>
      <h1 style="font-size: 2.75rem; font-weight: 800; color: #ffffff; margin-bottom: 0.75rem;">
        {{ tr('Soluções MetalMar') }}
      </h1>
      <p style="color: var(--slate-300); font-size: 1.1rem; max-width: 600px; margin: 0 auto;">
        {{ tr('Engenharia diagnóstica, manutenção mecânica, caldeiraria e serviços especializados com qualidade garantida.') }}
      </p>
    </div>
  </section>

  <!-- Catálogo de Soluções -->
  <section style="padding: 5.5rem 0; background-color: var(--slate-50);">
    <div class="container-custom">
      
      <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(340px, 1fr)); gap: 2rem;">
        @foreach($solucao as $item)
          @if($item->situacao == '1')
            <article class="solution-card">
              <a href="{{ url('solucoes/' . $item->urltitulo) }}" class="image-wrapper">
                @if($item->img)
                  <img src="{{ url('storage/' . $item->img) }}" alt="{{ $item->titulo }}" loading="lazy">
                @endif
              </a>
              <div style="padding: 1.75rem; display: flex; flex-direction: column; flex-grow: 1;">
                <h3 style="font-size: 1.25rem; font-weight: 800; color: var(--navy-950); margin-bottom: 0.75rem; line-height: 1.3;">
                  <a href="{{ url('solucoes/' . $item->urltitulo) }}" style="color: var(--navy-950); transition: color 0.2s;" onmouseover="this.style.color='var(--primary)'" onmouseout="this.style.color='var(--navy-950)'">
                    {{ $item->titulo }}
                  </a>
                </h3>
                
                <div style="color: var(--slate-600); font-size: 0.9375rem; line-height: 1.6; margin-bottom: 1.5rem; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                  {!! strip_tags($item->descricaodois ?: $item->descricao) !!}
                </div>

                <div style="margin-top: auto; padding-top: 1.25rem; border-top: 1px solid var(--slate-100); display: flex; align-items: center; justify-content: space-between;">
                  <a href="{{ url('solucoes/' . $item->urltitulo) }}" style="display: inline-flex; align-items: center; gap: 0.35rem; color: var(--primary); font-weight: 700; font-size: 0.875rem;">
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