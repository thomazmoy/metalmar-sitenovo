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
  <section style="background: linear-gradient(135deg, var(--navy-950) 0%, var(--navy-800) 100%); color: #ffffff; padding: 4.5rem 0; position: relative; border-bottom: 3px solid var(--primary);">
    <div class="container-custom">
      <div style="max-width: 800px;">
        <div class="section-badge" style="background: rgba(37,133,192,0.2); border-color: rgba(37,133,192,0.4);">
          <i class="ti ti-tool"></i>
          <span>{{ tr('Solução Especializada') }}</span>
        </div>
        <h1 style="font-size: 2.5rem; font-weight: 800; color: #ffffff; margin-bottom: 0.75rem; line-height: 1.25;">
          {{ $post->titulo }}
        </h1>
        @if(!empty($post->descricao))
          <p style="color: var(--slate-300); font-size: 1.1rem; line-height: 1.6;">
            {{ $post->descricao }}
          </p>
        @endif
      </div>
    </div>
  </section>

  <!-- Post Content & Sidebar Layout -->
  <section style="padding: 5rem 0; background-color: var(--slate-50);">
    <div class="container-custom">
      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 3rem; align-items: flex-start;">
        
        <!-- Left: Service Details & Rich Text -->
        <article style="background: #ffffff; border-radius: 1.25rem; border: 1px solid var(--slate-200); padding: 2.5rem; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);">
          @if($post->img)
            <div style="border-radius: 0.875rem; overflow: hidden; margin-bottom: 2rem; box-shadow: 0 10px 25px -5px rgba(15,23,42,0.1);">
              <img src="{{ url('storage/' . $post->img) }}" alt="{{ $post->titulo }}" style="width: 100%; height: auto; display: block;">
            </div>
          @endif

          <div style="color: var(--slate-700); font-size: 1.05rem; line-height: 1.8; margin-bottom: 2.5rem;">
            {!! $post->texto !!}
          </div>

          <!-- Share buttons -->
          <div style="padding-top: 1.5rem; border-top: 1px solid var(--slate-200); display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1rem;">
            <span style="font-weight: 700; color: var(--navy-950); font-size: 0.9375rem;">
              {{ tr('Compartilhar esta solução:') }}
            </span>
            <div style="display: flex; gap: 0.5rem;">
              <a href="https://wa.me/?text={{ urlencode($post->titulo . ' - ' . url('solucoes/' . $post->urltitulo)) }}" target="_blank" style="width: 2.25rem; height: 2.25rem; border-radius: 9999px; background: #25d366; color: #ffffff; display: flex; align-items: center; justify-content: center;" title="Compartilhar no WhatsApp">
                <i class="ti ti-brand-whatsapp"></i>
              </a>
              <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url('solucoes/' . $post->urltitulo)) }}" target="_blank" style="width: 2.25rem; height: 2.25rem; border-radius: 9999px; background: #1877f2; color: #ffffff; display: flex; align-items: center; justify-content: center;" title="Compartilhar no Facebook">
                <i class="ti ti-brand-facebook"></i>
              </a>
              <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(url('solucoes/' . $post->urltitulo)) }}&title={{ urlencode($post->titulo) }}" target="_blank" style="width: 2.25rem; height: 2.25rem; border-radius: 9999px; background: #0a66c2; color: #ffffff; display: flex; align-items: center; justify-content: center;" title="Compartilhar no LinkedIn">
                <i class="ti ti-brand-linkedin"></i>
              </a>
            </div>
          </div>
        </article>

        <!-- Right Sidebar: Quick Contact & Quote Form -->
        <aside style="position: sticky; top: 6rem; display: flex; flex-direction: column; gap: 2rem;">
          
          <!-- Direct WhatsApp Box -->
          <div style="background: linear-gradient(135deg, var(--navy-950) 0%, var(--navy-900) 100%); border-radius: 1.25rem; padding: 2rem; color: #ffffff; border: 1px solid rgba(255,255,255,0.1); text-align: center;">
            <i class="ti ti-headset" style="font-size: 2.5rem; color: var(--primary); margin-bottom: 1rem; display: inline-block;"></i>
            <h3 style="font-size: 1.35rem; font-weight: 800; color: #ffffff; margin-bottom: 0.5rem;">
              {{ tr('Precisa de Atendimento Rápido?') }}
            </h3>
            <p style="color: var(--slate-300); font-size: 0.875rem; margin-bottom: 1.5rem; line-height: 1.6;">
              {{ tr('Nossa equipe de engenheiros está pronta para esclarecer dúvidas e apresentar uma proposta comercial sob medida.') }}
            </p>
            @if(!empty($siteconfig->whatsapp))
              <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $siteconfig->whatsapp) }}?text={{ urlencode('Olá, gostaria de um orçamento sobre: ' . $post->titulo) }}" target="_blank" class="btn-primary" style="width: 100%; background-color: #25d366; border-color: #25d366;">
                <i class="ti ti-brand-whatsapp" style="font-size: 1.2rem;"></i>
                <span>{{ tr('Chamar no WhatsApp') }}</span>
              </a>
            @endif
          </div>

          <!-- Quote Form Card -->
          <div style="background: #ffffff; border-radius: 1.25rem; border: 1px solid var(--slate-200); padding: 2rem; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);">
            <h3 style="font-size: 1.25rem; font-weight: 800; color: var(--navy-950); margin-bottom: 1.25rem; padding-bottom: 0.75rem; border-bottom: 1px solid var(--slate-100);">
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