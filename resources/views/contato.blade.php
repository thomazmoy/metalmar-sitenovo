@extends('template.app')

@section('metatags')
  @if(!empty($siteconfig->taghead))
    {!! $siteconfig->taghead !!}
  @endif
  <meta charset="utf-8">
  <title>{{ tr('Fale Conosco') }} | {{ $siteconfig->nomesite ?? 'MetalMar' }}</title>
  <link rel="canonical" href="{{ url('contato-metalmar-manutencao-industrial-e-naval-em-belem-do-para') }}">
  <meta property="og:url" content="{{ url('contato-metalmar-manutencao-industrial-e-naval-em-belem-do-para') }}">
  <meta property="og:title" content="Contato | {{ $siteconfig->nomesite ?? 'MetalMar' }}">
  <meta property="og:image:alt" content="Contato | {{ $siteconfig->nomesite ?? 'MetalMar' }}">
  <meta name="twitter:url" content="{{ url('contato-metalmar-manutencao-industrial-e-naval-em-belem-do-para') }}">
  <meta name="twitter:title" content="Contato | {{ $siteconfig->nomesite ?? 'MetalMar' }}">
@endsection

@section('metatagsog')
  @include('template.metatags')
@endsection

@section('content')

  <!-- Page Header Breadcrumb -->
  <section class="subpage-hero" style="text-align: center;">
    <div class="container-custom">
      <div class="section-badge">
        <i class="ti ti-mail"></i>
        <span>{{ tr('Canais de Atendimento') }}</span>
      </div>
      <h1 class="subpage-hero-title">
        {{ tr('Fale Conosco') }}
      </h1>
      <p class="subpage-hero-desc" style="margin: 0 auto;">
        {{ tr('Estamos à disposição para atender sua demanda com agilidade, seriedade e precisão técnica.') }}
      </p>
    </div>
  </section>

  <!-- Contact Form & Details Section -->
  <section class="section-py section-bg-slate">
    <div class="container-custom">
      <div class="contact-grid">
        
        <!-- Left: Contact Details Cards -->
        <div>
          <div class="section-badge">
            <i class="ti ti-phone-call"></i>
            <span>{{ tr('Informações Diretas') }}</span>
          </div>
          <h2 class="section-title" style="margin-bottom: 1.5rem;">
            {{ tr('Como Podemos Ajudar?') }}
          </h2>
          <p style="color: var(--slate-600); font-size: 1.05rem; line-height: 1.7; margin-bottom: 2.5rem;">
            {{ tr('Entre em contato pelos nossos canais oficiais de telefone, e-mail ou WhatsApp, ou preencha o formulário para receber uma proposta técnica.') }}
          </p>

          <div style="display: flex; flex-direction: column; gap: 1.25rem; margin-bottom: 2.5rem;">
            
            @if(!empty($siteconfig->endereco))
              <div class="contact-item" style="padding: 1.25rem; background: #ffffff; border-radius: 1rem; border: 1px solid var(--slate-200); box-shadow: 0 4px 6px -1px rgba(0,0,0,0.03);">
                <div class="contact-icon-box">
                  <i class="ti ti-map-pin"></i>
                </div>
                <div>
                  <h4 style="font-size: 0.875rem; font-weight: 700; color: var(--slate-500); text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.25rem;">{{ tr('Endereço') }}</h4>
                  <a href="{{ $siteconfig->linkendereco }}" target="_blank" style="color: var(--navy-950); font-weight: 600; font-size: 0.95rem;">
                    {{ $siteconfig->endereco }}
                  </a>
                </div>
              </div>
            @endif

            @if(!empty($siteconfig->celular))
              <div class="contact-item" style="padding: 1.25rem; background: #ffffff; border-radius: 1rem; border: 1px solid var(--slate-200); box-shadow: 0 4px 6px -1px rgba(0,0,0,0.03);">
                <div class="contact-icon-box">
                  <i class="ti ti-device-mobile"></i>
                </div>
                <div>
                  <h4 style="font-size: 0.875rem; font-weight: 700; color: var(--slate-500); text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.25rem;">{{ tr('Celular / Comercial') }}</h4>
                  <a href="tel:{{ preg_replace('/[^0-9]/', '', $siteconfig->celular) }}" style="color: var(--navy-950); font-weight: 600; font-size: 0.95rem;">
                    {{ $siteconfig->celular }}
                  </a>
                </div>
              </div>
            @endif

            @if(!empty($siteconfig->email))
              <div class="contact-item" style="padding: 1.25rem; background: #ffffff; border-radius: 1rem; border: 1px solid var(--slate-200); box-shadow: 0 4px 6px -1px rgba(0,0,0,0.03);">
                <div class="contact-icon-box">
                  <i class="ti ti-mail"></i>
                </div>
                <div>
                  <h4 style="font-size: 0.875rem; font-weight: 700; color: var(--slate-500); text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.25rem;">E-mail</h4>
                  <a href="mailto:{{ $siteconfig->email }}" style="color: var(--navy-950); font-weight: 600; font-size: 0.95rem;">
                    {{ $siteconfig->email }}
                  </a>
                </div>
              </div>
            @endif

          </div>

          <!-- Social Media Icons -->
          <div>
            <h4 style="font-size: 0.875rem; font-weight: 700; color: var(--slate-500); text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.75rem;">
              {{ tr('Redes Sociais Oficiais') }}
            </h4>
            <div style="display: flex; gap: 0.75rem;">
              @if(!empty($siteconfig->facebook))
                <a href="{{ $siteconfig->facebook }}" target="_blank" class="footer-social-link" style="background: #ffffff; border: 1px solid var(--slate-200); color: #1877f2; width: 2.75rem; height: 2.75rem; border-radius: 0.65rem;">
                  <i class="ti ti-brand-facebook"></i>
                </a>
              @endif
              @if(!empty($siteconfig->instagram))
                <a href="{{ $siteconfig->instagram }}" target="_blank" class="footer-social-link" style="background: #ffffff; border: 1px solid var(--slate-200); color: #e1306c; width: 2.75rem; height: 2.75rem; border-radius: 0.65rem;">
                  <i class="ti ti-brand-instagram"></i>
                </a>
              @endif
              @if(!empty($siteconfig->whatsapp))
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $siteconfig->whatsapp) }}" target="_blank" class="footer-social-link" style="background: #ffffff; border: 1px solid var(--slate-200); color: #25d366; width: 2.75rem; height: 2.75rem; border-radius: 0.65rem;">
                  <i class="ti ti-brand-whatsapp"></i>
                </a>
              @endif
              @if(!empty($siteconfig->linkedin))
                <a href="{{ $siteconfig->linkedin }}" target="_blank" class="footer-social-link" style="background: #ffffff; border: 1px solid var(--slate-200); color: #0a66c2; width: 2.75rem; height: 2.75rem; border-radius: 0.65rem;">
                  <i class="ti ti-brand-linkedin"></i>
                </a>
              @endif
            </div>
          </div>

        </div>

        <!-- Right: Modern Contact Form Card -->
        <div class="contact-form-card">
          <h3 style="font-size: 1.5rem; font-weight: 800; color: var(--navy-950); margin-bottom: 0.5rem;">
            {{ tr('Envie Sua Mensagem') }}
          </h3>
          <p style="color: var(--slate-500); font-size: 0.9375rem; margin-bottom: 2rem;">
            {{ tr('Preencha os campos abaixo e entraremos em contato o mais breve possível.') }}
          </p>

          <form method="POST" action="{{ route('store') }}">
            @csrf

            {{-- Honeypot oculto anti-spam --}}
            <div style="display:none !important;" aria-hidden="true">
              <input type="text" name="hp_company_field" tabindex="-1" autocomplete="off">
            </div>

            <div class="form-group">
              <label class="form-label-custom">{{ tr('Nome Completo') }} *</label>
              <input type="text" class="form-input-custom" name="nome" placeholder="{{ tr('Digite seu nome') }}" value="{{ old('nome') }}" required>
              @error('nome')
                <span style="color: #ef4444; font-size: 0.8125rem; margin-top: 0.25rem; display: block;">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group">
              <label class="form-label-custom">E-mail *</label>
              <input type="email" class="form-input-custom" name="email" placeholder="seuemail@empresa.com" value="{{ old('email') }}" required>
              @error('email')
                <span style="color: #ef4444; font-size: 0.8125rem; margin-top: 0.25rem; display: block;">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group">
              <label class="form-label-custom">{{ tr('Telefone / WhatsApp') }} *</label>
              <input type="text" class="form-input-custom" name="telefone" placeholder="(00) 00000-0000" value="{{ old('telefone') }}" required>
              @error('telefone')
                <span style="color: #ef4444; font-size: 0.8125rem; margin-top: 0.25rem; display: block;">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group">
              <label class="form-label-custom">{{ tr('Assunto') }} *</label>
              <input type="text" class="form-input-custom" name="assunto" placeholder="{{ tr('Ex: Orçamento de Manutenção Naval') }}" value="{{ old('assunto') }}" required>
              @error('assunto')
                <span style="color: #ef4444; font-size: 0.8125rem; margin-top: 0.25rem; display: block;">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group">
              <label class="form-label-custom">{{ tr('Mensagem') }} *</label>
              <textarea class="form-input-custom" name="mensagem" placeholder="{{ tr('Como podemos ajudar a sua empresa?') }}" required style="min-height: 120px;">{{ old('mensagem') }}</textarea>
              @error('mensagem')
                <span style="color: #ef4444; font-size: 0.8125rem; margin-top: 0.25rem; display: block;">{{ $message }}</span>
              @enderror
            </div>

            <!-- LGPD disclaimer -->
            <div style="margin-bottom: 1.5rem; font-size: 0.8125rem; color: var(--slate-500); line-height: 1.5;">
              <label style="display: flex; align-items: flex-start; gap: 0.65rem; cursor: pointer;">
                <input type="checkbox" required style="margin-top: 0.2rem;">
                <span>
                  {{ tr('Declaro estar de acordo com o tratamento dos meus dados para fins de retorno comercial, conforme a') }} 
                  <a href="{{ url('politica-de-privacidade') }}" target="_blank" style="color: var(--primary); text-decoration: underline;">{{ tr('Política de Privacidade') }}</a>.
                </span>
              </label>
            </div>

            <button type="submit" class="btn-primary" style="width: 100%; padding: 0.85rem;">
              <span>{{ tr('Enviar Mensagem') }}</span>
              <i class="ti ti-send"></i>
            </button>
          </form>
        </div>

      </div>
    </div>
  </section>

  <!-- Google Map Embed -->
  @if(!empty($siteconfig->iframemapa))
    <section class="map-container" style="border-radius: 0; height: 420px; border-left: none; border-right: none;">
      {!! $siteconfig->iframemapa !!}
    </section>
  @endif

@endsection