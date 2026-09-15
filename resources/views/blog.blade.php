@extends('template.app')

@section('metatags')
  @if(!empty($siteconfig->taghead))
    {!! $siteconfig->taghead !!}
  @endif
  <meta charset="utf-8">
  <title>Blog MetalMar | {{ $siteconfig->nomesite ?? 'MetalMar' }}</title>
  <link rel="canonical" href="{{ url('blog-metalmar') }}">
  <meta property="og:url" content="{{ url('blog-metalmar') }}">
  <meta property="og:title" content="Blog MetalMar | {{ $siteconfig->nomesite ?? 'MetalMar' }}">
  <meta property="og:image:alt" content="Blog MetalMar | {{ $siteconfig->nomesite ?? 'MetalMar' }}">
  <meta name="twitter:url" content="{{ url('blog-metalmar') }}">
  <meta name="twitter:title" content="Blog MetalMar | {{ $siteconfig->nomesite ?? 'MetalMar' }}">
@endsection

@section('metatagsog')
  @include('template.metatags')
@endsection

@section('content')

  <!-- Page Header Breadcrumb -->
  <section class="subpage-hero" style="text-align: center;">
    <div class="container-custom">
      <div class="section-badge">
        <i class="ti ti-news"></i>
        <span>{{ tr('Conhecimento Técnico') }}</span>
      </div>
      <h1 class="subpage-hero-title">
        Blog MetalMar
      </h1>
      <p class="subpage-hero-desc" style="margin: 0 auto;">
        {{ tr('Artigos, novidades, dicas de manutenção preventiva e tendências dos setores naval e industrial.') }}
      </p>

      <!-- Search Bar -->
      <form method="GET" action="{{ url('pesquisar') }}" style="max-width: 480px; margin: 2rem auto 0; display: flex; gap: 0.5rem;">
        <input type="text" name="pesquisar" placeholder="{{ tr('Pesquisar artigos no blog...') }}" value="{{ request('pesquisar') }}" class="form-input-custom" style="border-radius: 9999px; padding-left: 1.25rem;">
        <button type="submit" class="btn-primary" style="border-radius: 9999px; padding: 0.65rem 1.25rem; flex-shrink: 0;">
          <i class="ti ti-search"></i>
          <span>{{ tr('Buscar') }}</span>
        </button>
      </form>
    </div>
  </section>

  <!-- Blog Listing Grid -->
  <section class="section-py section-bg-slate">
    <div class="container-custom">
      
      @if($blog->count() > 0)
        <div class="blog-grid" style="margin-bottom: 3.5rem;">
          @foreach($blog as $item)
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

        <!-- Paginação -->
        <div style="display: flex; justify-content: center;">
          {{ $blog->links() }}
        </div>
      @else
        <div style="text-align: center; padding: 4rem 1rem;">
          <i class="ti ti-file-search" style="font-size: 3.5rem; color: var(--slate-400); margin-bottom: 1rem; display: inline-block;"></i>
          <h3 style="font-size: 1.5rem; font-weight: 700; color: var(--navy-950);">{{ tr('Nenhum artigo encontrado') }}</h3>
          <p style="color: var(--slate-500); margin-top: 0.5rem;">{{ tr('Em breve novos conteúdos serão publicados aqui.') }}</p>
        </div>
      @endif

    </div>
  </section>

@endsection