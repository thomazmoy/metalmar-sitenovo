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
  <section style="background: linear-gradient(135deg, var(--navy-950) 0%, var(--navy-800) 100%); color: #ffffff; padding: 4.5rem 0; position: relative; border-bottom: 3px solid var(--primary);">
    <div class="container-custom" style="max-width: 900px; text-align: center;">
      @if($post->categoria)
        <div class="section-badge" style="background: rgba(37,133,192,0.2); border-color: rgba(37,133,192,0.4); margin-bottom: 1rem;">
          <i class="ti ti-tag"></i>
          <span>{{ $post->categoria->nome }}</span>
        </div>
      @endif
      <h1 style="font-size: 2.5rem; font-weight: 800; color: #ffffff; line-height: 1.25; margin-bottom: 1rem;">
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
  <section style="padding: 5rem 0; background-color: var(--slate-50);">
    <div class="container-custom">
      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 3.5rem; align-items: flex-start;">
        
        <!-- Main Article Container -->
        <article style="background: #ffffff; border-radius: 1.25rem; border: 1px solid var(--slate-200); padding: 2.5rem; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);">
          @if($post->img)
            <div style="border-radius: 0.875rem; overflow: hidden; margin-bottom: 2rem; box-shadow: 0 10px 25px -5px rgba(15,23,42,0.1);">
              <img src="{{ url('storage/' . $post->img) }}" alt="{{ $post->titulo }}" style="width: 100%; height: auto; display: block;">
            </div>
          @endif

          <div style="color: var(--slate-700); font-size: 1.05rem; line-height: 1.85; margin-bottom: 2.5rem;">
            {!! $post->texto !!}
          </div>

          @if(!empty($post->iframe))
            <div style="border-radius: 0.875rem; overflow: hidden; margin: 2rem 0; box-shadow: 0 10px 25px -5px rgba(15,23,42,0.1);">
              {!! $post->iframe !!}
            </div>
          @endif

          <!-- Social Share Bar -->
          <div style="padding-top: 1.5rem; border-top: 1px solid var(--slate-200); display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1rem;">
            <span style="font-weight: 700; color: var(--navy-950); font-size: 0.9375rem;">
              {{ tr('Compartilhar este artigo:') }}
            </span>
            <div style="display: flex; gap: 0.5rem;">
              <a href="https://wa.me/?text={{ urlencode($post->titulo . ' - ' . url('blog/' . $post->urltitulo)) }}" target="_blank" style="width: 2.25rem; height: 2.25rem; border-radius: 9999px; background: #25d366; color: #ffffff; display: flex; align-items: center; justify-content: center;" title="WhatsApp">
                <i class="ti ti-brand-whatsapp"></i>
              </a>
              <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url('blog/' . $post->urltitulo)) }}" target="_blank" style="width: 2.25rem; height: 2.25rem; border-radius: 9999px; background: #1877f2; color: #ffffff; display: flex; align-items: center; justify-content: center;" title="Facebook">
                <i class="ti ti-brand-facebook"></i>
              </a>
              <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(url('blog/' . $post->urltitulo)) }}&title={{ urlencode($post->titulo) }}" target="_blank" style="width: 2.25rem; height: 2.25rem; border-radius: 9999px; background: #0a66c2; color: #ffffff; display: flex; align-items: center; justify-content: center;" title="LinkedIn">
                <i class="ti ti-brand-linkedin"></i>
              </a>
            </div>
          </div>
        </article>

        <!-- Sidebar -->
        <aside style="display: flex; flex-direction: column; gap: 2rem;">
          
          <!-- Search Box -->
          <div style="background: #ffffff; border-radius: 1.25rem; border: 1px solid var(--slate-200); padding: 1.75rem;">
            <h4 style="font-size: 1.1rem; font-weight: 800; color: var(--navy-950); margin-bottom: 1rem;">
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
          <div style="background: #ffffff; border-radius: 1.25rem; border: 1px solid var(--slate-200); padding: 1.75rem;">
            <h4 style="font-size: 1.1rem; font-weight: 800; color: var(--navy-950); margin-bottom: 1.25rem; padding-bottom: 0.65rem; border-bottom: 1px solid var(--slate-100);">
              {{ tr('Artigos Recentes') }}
            </h4>
            <div style="display: flex; flex-direction: column; gap: 1.25rem;">
              @foreach($blog as $item)
                @if($item->id != $post->id)
                  <a href="{{ url('blog/' . $item->urltitulo) }}" style="display: flex; gap: 1rem; align-items: center; text-decoration: none;" group>
                    @if($item->img)
                      <img src="{{ url('storage/' . $item->img) }}" alt="{{ $item->titulo }}" style="width: 4.5rem; height: 4.5rem; border-radius: 0.625rem; object-fit: cover; flex-shrink: 0;">
                    @endif
                    <div>
                      <h5 style="font-size: 0.875rem; font-weight: 700; color: var(--navy-950); line-height: 1.35; margin-bottom: 0.25rem; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                        {{ $item->titulo }}
                      </h5>
                      <span style="font-size: 0.75rem; color: var(--slate-500); display: flex; align-items: center; gap: 0.25rem;">
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
          <div style="background: linear-gradient(135deg, var(--navy-950) 0%, var(--navy-900) 100%); border-radius: 1.25rem; padding: 2rem; color: #ffffff; border: 1px solid rgba(255,255,255,0.1); text-align: center;">
            <i class="ti ti-phone-outgoing" style="font-size: 2.25rem; color: var(--primary); margin-bottom: 0.75rem; display: inline-block;"></i>
            <h4 style="font-size: 1.25rem; font-weight: 800; color: #ffffff; margin-bottom: 0.5rem;">
              {{ tr('Solicite um Orçamento') }}
            </h4>
            <p style="color: var(--slate-300); font-size: 0.875rem; margin-bottom: 1.25rem; line-height: 1.5;">
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