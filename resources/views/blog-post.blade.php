@extends('template.app')

@section('metatags')
  @if(!empty($siteconfig->taghead))
    {!! $siteconfig->taghead !!}
  @endif
  <meta charset="utf-8">
  <title>{{ $post->titulo }} | {{ $siteconfig->nomesite ?? 'MetalMar' }}</title>
  <link rel="canonical" href="{{ url('blog/' . $post->urltitulo) }}">
  <meta property="og:url" content="{{ url('blog/' . $post->urltitulo) }}">
  <meta property="og:title" content="{{ $post->titulo }} | {{ $siteconfig->nomesite ?? 'MetalMar' }}">
  <meta property="og:description" content="{{ $post->descricao }}">
  <meta name="twitter:url" content="{{ url('blog/' . $post->urltitulo) }}">
  <meta name="twitter:title" content="{{ $post->titulo }} | {{ $siteconfig->nomesite ?? 'MetalMar' }}">
@endsection

@section('metatagsog')
  @include('template.metatags-post')
@endsection

@section('content')

  <!-- Article Header Breadcrumb -->
  <section class="subpage-hero" style="text-align: center;">
    <div class="container-custom" style="max-width: 800px;">
      @if($post->categoria)
        <div style="margin-bottom: 1rem;">
          <span class="section-badge">
            {{ $post->categoria->nome }}
          </span>
        </div>
      @endif
      <h1 class="subpage-hero-title">
        {{ $post->titulo }}
      </h1>
      <div style="display: flex; align-items: center; justify-content: center; gap: 1.5rem; color: var(--slate-300); font-size: 0.9375rem;">
        <span style="display: flex; align-items: center; gap: 0.35rem;">
          <i class="ti ti-calendar" style="color: var(--primary);"></i>
          {{ $post->created_at ? $post->created_at->translatedFormat('d \d\e F \d\e Y') : '' }}
        </span>
        <span style="display: flex; align-items: center; gap: 0.35rem;">
          <i class="ti ti-user" style="color: var(--primary);"></i>
          MetalMar
        </span>
      </div>
    </div>
  </section>

  <!-- Article Body & Sidebar -->
  <section class="section-py section-bg-slate">
    <div class="container-custom">
      <div class="layout-content-sidebar">
        
        <!-- Main Article Container -->
        <article class="article-card">
          @if($post->img)
            <div class="article-media-box">
              <img src="{{ url('storage/' . $post->img) }}" alt="{{ $post->titulo }}">
            </div>
          @endif

          <div class="article-body-text">
            {!! $post->texto !!}
          </div>

          @if(!empty($post->iframe))
            <div class="article-iframe-box">
              {!! $post->iframe !!}
            </div>
          @endif

          <!-- Social Share Bar -->
          <div class="share-bar">
            <span class="share-bar-title">
              {{ tr('Compartilhar este artigo:') }}
            </span>
            <div class="share-bar-actions">
              <a href="https://wa.me/?text={{ urlencode($post->titulo . ' - ' . url('blog/' . $post->urltitulo)) }}" target="_blank" class="share-btn share-btn-wa" title="WhatsApp">
                <i class="ti ti-brand-whatsapp"></i>
              </a>
              <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url('blog/' . $post->urltitulo)) }}" target="_blank" class="share-btn share-btn-fb" title="Facebook">
                <i class="ti ti-brand-facebook"></i>
              </a>
              <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(url('blog/' . $post->urltitulo)) }}&title={{ urlencode($post->titulo) }}" target="_blank" class="share-btn share-btn-in" title="LinkedIn">
                <i class="ti ti-brand-linkedin"></i>
              </a>
            </div>
          </div>
        </article>

        <!-- Sidebar -->
        <aside class="sidebar-sticky">
          
          <!-- Search Box -->
          <div class="sidebar-card">
            <h4 class="sidebar-title" style="border-bottom: none; padding-bottom: 0; margin-bottom: 1rem;">
              {{ tr('Pesquisar no Blog') }}
            </h4>
            <form method="GET" action="{{ route('pesquisar') }}" style="display: flex; gap: 0.5rem;">
              <input type="text" name="pesquisar" placeholder="{{ tr('Digite palavras-chave...') }}" value="{{ request('pesquisar') }}" class="form-input-custom" style="padding: 0.65rem 0.85rem; font-size: 0.875rem;">
              <button type="submit" class="btn-primary" style="padding: 0.65rem 1rem;">
                <i class="ti ti-search"></i>
              </button>
            </form>
          </div>

          <!-- Recent Articles -->
          <div class="sidebar-card">
            <h4 class="sidebar-title">
              {{ tr('Artigos Recentes') }}
            </h4>
            <div class="sidebar-recent-list">
              @foreach($blog as $item)
                @if($item->id != $post->id)
                  <a href="{{ url('blog/' . $item->urltitulo) }}" class="sidebar-recent-item">
                    @if($item->img)
                      <img src="{{ url('storage/' . $item->img) }}" alt="{{ $item->titulo }}">
                    @endif
                    <div>
                      <h5>{{ $item->titulo }}</h5>
                      <span>
                        <i class="ti ti-calendar" style="color: var(--primary);"></i>
                        {{ $item->created_at ? $item->created_at->translatedFormat('d M Y') : '' }}
                      </span>
                    </div>
                  </a>
                @endif
              @endforeach
            </div>
          </div>

          <!-- Quick Contact CTA -->
          <div class="sidebar-cta-box">
            <i class="ti ti-phone-outgoing sidebar-cta-icon"></i>
            <h4 class="sidebar-cta-title">
              {{ tr('Solicite um Orçamento') }}
            </h4>
            <p class="sidebar-cta-text">
              {{ tr('Entre em contato com nossos especialistas e obtenha consultoria técnica ágil.') }}
            </p>
            <a href="{{ url('contato-metalmar-manutencao-industrial-e-naval-em-belem-do-para') }}" class="btn-primary" style="width: 100%;">
              <span>{{ tr('Falar com Especialista') }}</span>
              <i class="ti ti-arrow-right"></i>
            </a>
          </div>

        </aside>

      </div>
    </div>
  </section>

@endsection