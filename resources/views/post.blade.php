@extends('template.app')

@section('metatags')
  @if(!empty($siteconfig->taghead))
    {!! $siteconfig->taghead !!}
  @endif
  <meta charset="utf-8">
  <title>{{ $post->titulo }} | {{ $siteconfig->nomesite ?? 'MetalMar' }}</title>
  <link rel="canonical" href="{{ url('solucoes/' . $post->urltitulo) }}">
  <meta property="og:url" content="{{ url('solucoes/' . $post->urltitulo) }}">
  <meta property="og:title" content="{{ $post->titulo }} | {{ $siteconfig->nomesite ?? 'MetalMar' }}">
  <meta property="og:description" content="{{ $post->descricao }}">
  <meta name="twitter:url" content="{{ url('solucoes/' . $post->urltitulo) }}">
  <meta name="twitter:title" content="{{ $post->titulo }} | {{ $siteconfig->nomesite ?? 'MetalMar' }}">
@endsection

@section('metatagsog')
  @include('template.metatags-post')
@endsection

@section('content')

  <!-- Page Header Breadcrumb -->
  <section class="subpage-hero">
    <div class="container-custom">
      <div style="max-width: 800px;">
        <div class="section-badge">
          <i class="ti ti-tool"></i>
          <span>{{ tr('Solução Especializada') }}</span>
        </div>
        <h1 class="subpage-hero-title">
          {{ $post->titulo }}
        </h1>
        @if(!empty($post->descricao))
          <p class="subpage-hero-desc">
            {{ $post->descricao }}
          </p>
        @endif
      </div>
    </div>
  </section>

  <!-- Post Content & Sidebar Layout -->
  <section class="section-py section-bg-slate">
    <div class="container-custom">
      <div class="layout-content-sidebar">
        
        <!-- Left: Service Details & Rich Text -->
        <article class="article-card">
          @if($post->img)
            <div class="article-media-box">
              <img src="{{ url('storage/' . $post->img) }}" alt="{{ $post->titulo }}">
            </div>
          @endif

          <div class="article-body-text">
            {!! $post->texto !!}
          </div>

          <!-- Share buttons -->
          <div class="share-bar">
            <span class="share-bar-title">
              {{ tr('Compartilhar esta solução:') }}
            </span>
            <div class="share-bar-actions">
              <a href="https://wa.me/?text={{ urlencode($post->titulo . ' - ' . url('solucoes/' . $post->urltitulo)) }}" target="_blank" class="share-btn share-btn-wa" title="Compartilhar no WhatsApp">
                <i class="ti ti-brand-whatsapp"></i>
              </a>
              <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url('solucoes/' . $post->urltitulo)) }}" target="_blank" class="share-btn share-btn-fb" title="Compartilhar no Facebook">
                <i class="ti ti-brand-facebook"></i>
              </a>
              <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(url('solucoes/' . $post->urltitulo)) }}&title={{ urlencode($post->titulo) }}" target="_blank" class="share-btn share-btn-in" title="Compartilhar no LinkedIn">
                <i class="ti ti-brand-linkedin"></i>
              </a>
            </div>
          </div>
        </article>

        <!-- Right Sidebar: Quick Contact & Quote Form -->
        <aside class="sidebar-sticky">
          
          <!-- Direct WhatsApp Box -->
          <div class="sidebar-cta-box">
            <i class="ti ti-headset sidebar-cta-icon" style="font-size: 2.5rem;"></i>
            <h3 class="sidebar-cta-title" style="font-size: 1.35rem;">
              {{ tr('Precisa de Atendimento Rápido?') }}
            </h3>
            <p class="sidebar-cta-text" style="line-height: 1.6; margin-bottom: 1.5rem;">
              {{ tr('Nossa equipe de engenheiros está pronta para esclarecer dúvidas e apresentar uma proposta comercial sob medida.') }}
            </p>
            @if(!empty($siteconfig->whatsapp))
              <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $siteconfig->whatsapp) }}?text={{ urlencode('Olá, gostaria de um orçamento sobre: ' . $post->titulo) }}" target="_blank" class="btn-primary btn-whatsapp" style="width: 100%;">
                <i class="ti ti-brand-whatsapp" style="font-size: 1.2rem;"></i>
                <span>{{ tr('Chamar no WhatsApp') }}</span>
              </a>
            @endif
          </div>

          <!-- Quote Form Card -->
          <div class="sidebar-card">
            <h3 class="sidebar-title">
              {{ tr('Solicite um Orçamento') }}
            </h3>

            <form method="POST" action="{{ route('store') }}">
              @csrf
              <div style="display:none !important;" aria-hidden="true">
                <input type="text" name="hp_company_field" tabindex="-1" autocomplete="off">
              </div>
              <input type="hidden" name="assunto" value="{{ $post->titulo }}">

              <div class="form-group">
                <label class="form-label-custom">{{ tr('Nome Completo') }}</label>
                <input type="text" class="form-input-custom" name="nome" placeholder="{{ tr('Seu Nome') }}" required>
              </div>

              <div class="form-group">
                <label class="form-label-custom">E-mail</label>
                <input type="email" class="form-input-custom" name="email" placeholder="seuemail@empresa.com" required>
              </div>

              <div class="form-group">
                <label class="form-label-custom">{{ tr('Telefone / Celular') }}</label>
                <input type="text" class="form-input-custom" name="telefone" placeholder="(00) 00000-0000" required>
              </div>

              <div class="form-group">
                <label class="form-label-custom">{{ tr('Mensagem') }}</label>
                <textarea class="form-input-custom" name="mensagem" placeholder="{{ tr('Descreva brevemente a sua demanda...') }}" required style="min-height: 100px;"></textarea>
              </div>

              <button type="submit" class="btn-primary" style="width: 100%;">
                <span>{{ tr('Enviar Solicitação') }}</span>
                <i class="ti ti-send"></i>
              </button>
            </form>
          </div>

        </aside>

      </div>
    </div>
  </section>

@endsection