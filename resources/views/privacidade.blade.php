@extends('template.app')

@section('metatags')
  @if(!empty($siteconfig->taghead))
    {!! $siteconfig->taghead !!}
  @endif
  <meta charset="utf-8">
  <title>{{ tr('Política de Privacidade') }} | {{ $siteconfig->nomesite ?? 'MetalMar' }}</title>
  <link rel="canonical" href="{{ url('politica-de-privacidade') }}">
  <meta property="og:url" content="{{ url('politica-de-privacidade') }}">
  <meta property="og:title" content="Política de Privacidade | {{ $siteconfig->nomesite ?? 'MetalMar' }}">
  <meta property="og:image:alt" content="Política de Privacidade | {{ $siteconfig->nomesite ?? 'MetalMar' }}">
  <meta name="twitter:url" content="{{ url('politica-de-privacidade') }}">
  <meta name="twitter:title" content="Política de Privacidade | {{ $siteconfig->nomesite ?? 'MetalMar' }}">
@endsection

@section('metatagsog')
  @include('template.metatags')
@endsection

@section('content')

  <!-- Page Header Breadcrumb -->
  <section style="background: linear-gradient(135deg, var(--navy-950) 0%, var(--navy-800) 100%); color: #ffffff; padding: 4.5rem 0; position: relative; border-bottom: 3px solid var(--primary);">
    <div class="container-custom" style="text-align: center;">
      <div class="section-badge" style="background: rgba(37,133,192,0.2); border-color: rgba(37,133,192,0.4);">
        <i class="ti ti-shield-lock"></i>
        <span>{{ tr('LGPD & Termos') }}</span>
      </div>
      <h1 style="font-size: 2.75rem; font-weight: 800; color: #ffffff; margin-bottom: 0.75rem;">
        {{ tr('Política de Privacidade') }}
      </h1>
      <p style="color: var(--slate-300); font-size: 1.1rem; max-width: 600px; margin: 0 auto;">
        {{ tr('Transparência, proteção de dados e respeito à privacidade dos nossos usuários e clientes.') }}
      </p>
    </div>
  </section>

  <!-- Content Section -->
  <section style="padding: 5.5rem 0; background-color: var(--slate-50);">
    <div class="container-custom" style="max-width: 900px;">
      
      <div style="background: #ffffff; border-radius: 1.25rem; border: 1px solid var(--slate-200); padding: 3rem; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);">
        @foreach($privacidade as $item)
          <div style="margin-bottom: 2.5rem; padding-bottom: 2.5rem; border-bottom: 1px solid var(--slate-100);">
            <h2 style="font-size: 1.5rem; font-weight: 800; color: var(--navy-950); margin-bottom: 1.25rem;">
              {{ $item->titulo }}
            </h2>
            <div style="color: var(--slate-700); font-size: 1.05rem; line-height: 1.8;">
              {!! $item->texto !!}
            </div>
          </div>
        @endforeach
      </div>

    </div>
  </section>

@endsection