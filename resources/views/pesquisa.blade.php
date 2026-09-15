@extends('template.app')

@section('metatags')
  @if(!empty($siteconfig->taghead))
    {!! $siteconfig->taghead !!}
  @endif
  <meta charset="utf-8">
  <title>{{ tr('Pesquisa') }} | {{ $siteconfig->nomesite ?? 'MetalMar' }}</title>
  <link rel="canonical" href="{{ url('pesquisar') }}">
  <meta property="og:url" content="{{ url('pesquisar') }}">
  <meta property="og:title" content="Pesquisa | {{ $siteconfig->nomesite ?? 'MetalMar' }}">
  <meta property="og:image:alt" content="Pesquisa | {{ $siteconfig->nomesite ?? 'MetalMar' }}">
  <meta name="twitter:url" content="{{ url('pesquisar') }}">
  <meta name="twitter:title" content="Pesquisa | {{ $siteconfig->nomesite ?? 'MetalMar' }}">
@endsection

@section('metatagsog')
  @include('template.metatags')
@endsection

@section('content')

  <!-- Page Header Breadcrumb -->
  <section class="subpage-hero" style="text-align: center;">
    <div class="container-custom">
      <div class="section-badge">
        <i class="ti ti-search"></i>
        <span>{{ tr('Resultado da Busca') }}</span>
      </div>
      <h1 class="subpage-hero-title">
        {{ tr('Pesquisa no Blog') }}
      </h1>
      @if(request('pesquisar'))
        <p class="subpage-hero-desc" style="margin: 0 auto;">
          {{ tr('Resultados para:') }} <strong style="color: #ffffff;">"{{ request('pesquisar') }}"</strong>
        </p>
      @endif

      <!-- Search Input Bar -->
      <form method="GET" action="{{ route('pesquisar') }}" style="max-width: 480px; margin: 2rem auto 0; display: flex; gap: 0.5rem;">
        <input type="text" name="pesquisar" placeholder="{{ tr('Digite palavras-chave...') }}" value="{{ request('pesquisar') }}" class="form-input-custom" style="border-radius: 9999px; padding-left: 1.25rem;">
        <button type="submit" class="btn-primary" style="border-radius: 9999px; padding: 0.65rem 1.25rem; flex-shrink: 0;">
          <i class="ti ti-search"></i>
          <span>{{ tr('Buscar') }}</span>
        </button>
      </form>
    </div>
  </section>

  <!-- Search Results -->
  <section class="section-py section-bg-slate">
    <div class="container-custom">
      
      @if($pesquisar->count() > 0)
        <div class="blog-grid" style="margin-bottom: 3.5rem;">
          @foreach($pesquisar as $item)
            <article class="blog-card">
              <a href="{{ url('blog/' . $item->urltitulo) }}" class="blog-card-media">
                @if($item->img)
                  <img src="{{ url('storage/' . $item->img) }}" alt="{{ $item->titulo }}" loading="lazy">
                @endif
              </a>
              <div class="blog-card-body">
                
                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.75rem; font-size: 0.8125rem; color: var(--slate-500);">
                  <span style="display: flex; align-items: center; gap: 0.35rem;">
                    <i class="ti ti-calendar" style="color: var(--primary);"></i>
                    {{ $item->created_at ? $item->created_at->translatedFormat('d M Y') : '' }}
                  </span>
                  @if($item->categoria)
                    <span style="background: var(--slate-100); color: var(--navy-900); padding: 0.2rem 0.6rem; border-radius: 9999px; font-weight: 600; font-size: 0.75rem;">
                      {{ $item->categoria->nome }}
                    </span>
                  @endif
                </div>

                <h3 class="blog-card-title">
                  <a href="{{ url('blog/' . $item->urltitulo) }}" class="footer-link" style="color: var(--navy-950);">
                    {{ $item->titulo }}
                  </a>
                </h3>

                <p class="blog-card-desc">
                  {{ $item->descricao }}
                </p>

                <div style="margin-top: auto; padding-top: 1.25rem; border-top: 1px solid var(--slate-100);">
                  <a href="{{ url('blog/' . $item->urltitulo) }}" class="blog-card-link">
                    <span>{{ tr('Ler Artigo Completo') }}</span>
                    <i class="ti ti-arrow-right"></i>
                  </a>
                </div>

              </div>
            </article>
          @endforeach
        </div>

        <div style="display: flex; justify-content: center;">
          {{ $pesquisar->links() }}
        </div>
      @else
        <div style="text-align: center; padding: 4rem 1rem; max-width: 500px; margin: 0 auto;">
          <i class="ti ti-search-off" style="font-size: 3.5rem; color: var(--slate-400); margin-bottom: 1rem; display: inline-block;"></i>
          <h3 style="font-size: 1.5rem; font-weight: 800; color: var(--navy-950); margin-bottom: 0.5rem;">{{ tr('Nenhum resultado encontrado') }}</h3>
          <p style="color: var(--slate-500); margin-bottom: 2rem;">{{ tr('Não encontramos publicações correspondentes ao termo informado. Tente palavras-chave diferentes.') }}</p>
          <a href="{{ url('blog-metalmar') }}" class="btn-primary">
            <span>{{ tr('Ver Todos os Artigos') }}</span>
            <i class="ti ti-arrow-right"></i>
          </a>
        </div>
      @endif

    </div>
  </section>

@endsection