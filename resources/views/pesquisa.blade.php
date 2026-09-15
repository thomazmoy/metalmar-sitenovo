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
  <section style="background: linear-gradient(135deg, var(--navy-950) 0%, var(--navy-800) 100%); color: #ffffff; padding: 4.5rem 0; position: relative; border-bottom: 3px solid var(--primary);">
    <div class="container-custom" style="text-align: center;">
      <div class="section-badge" style="background: rgba(37,133,192,0.2); border-color: rgba(37,133,192,0.4);">
        <i class="ti ti-search"></i>
        <span>{{ tr('Resultado da Busca') }}</span>
      </div>
      <h1 style="font-size: 2.75rem; font-weight: 800; color: #ffffff; margin-bottom: 0.75rem;">
        {{ tr('Pesquisa no Blog') }}
      </h1>
      @if(request('pesquisar'))
        <p style="color: var(--slate-300); font-size: 1.1rem; max-width: 600px; margin: 0 auto;">
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
  <section style="padding: 5.5rem 0; background-color: var(--slate-50);">
    <div class="container-custom">
      
      @if($pesquisar->count() > 0)
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(340px, 1fr)); gap: 2rem; margin-bottom: 3.5rem;">
          @foreach($pesquisar as $item)
            <article class="blog-card">
              <a href="{{ url('blog/' . $item->urltitulo) }}" class="img-container">
                @if($item->img)
                  <img src="{{ url('storage/' . $item->img) }}" alt="{{ $item->titulo }}" loading="lazy">
                @endif
              </a>
              <div style="padding: 1.75rem; display: flex; flex-direction: column; flex-grow: 1;">
                
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

                <h3 style="font-size: 1.25rem; font-weight: 700; line-height: 1.35; margin-bottom: 0.75rem;">
                  <a href="{{ url('blog/' . $item->urltitulo) }}" style="color: var(--navy-950); transition: color 0.2s;" onmouseover="this.style.color='var(--primary)'" onmouseout="this.style.color='var(--navy-950)'">
                    {{ $item->titulo }}
                  </a>
                </h3>

                <p style="color: var(--slate-600); font-size: 0.9375rem; line-height: 1.6; margin-bottom: 1.5rem; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                  {{ $item->descricao }}
                </p>

                <div style="margin-top: auto; padding-top: 1.25rem; border-top: 1px solid var(--slate-100);">
                  <a href="{{ url('blog/' . $item->urltitulo) }}" style="display: inline-flex; align-items: center; gap: 0.35rem; color: var(--primary); font-weight: 700; font-size: 0.875rem;">
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