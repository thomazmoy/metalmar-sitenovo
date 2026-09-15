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
  <section style="background: linear-gradient(135deg, var(--navy-950) 0%, var(--navy-800) 100%); color: #ffffff; padding: 4.5rem 0; position: relative; border-bottom: 3px solid var(--primary);">
    <div class="container-custom" style="text-align: center;">
      <div class="section-badge" style="background: rgba(37,133,192,0.2); border-color: rgba(37,133,192,0.4);">
        <i class="ti ti-mail"></i>
        <span>{{ tr('Canais de Atendimento') }}</span>
      </div>
      <h1 style="font-size: 2.75rem; font-weight: 800; color: #ffffff; margin-bottom: 0.75rem;">
        {{ tr('Fale Conosco') }}
      </h1>
      <p style="color: var(--slate-300); font-size: 1.1rem; max-width: 600px; margin: 0 auto;">
        {{ tr('Estamos à disposição para atender sua demanda com agilidade, seriedade e precisão técnica.') }}
      </p>
    </div>
  </section>

  <!-- Contact Form & Details Section -->
  <section style="padding: 5.5rem 0; background-color: var(--slate-50);">
    <div class="container-custom">
      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 3.5rem; align-items: flex-start;">
        
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
              <div style="display: flex; gap: 1rem; padding: 1.25rem; background: #ffffff; border-radius: 1rem; border: 1px solid var(--slate-200); box-shadow: 0 4px 6px -1px rgba(0,0,0,0.03);">
                <div style="width: 2.75rem; height: 2.75rem; border-radius: 0.65rem; background: var(--primary-light); color: var(--primary); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                  <i class="ti ti-map-pin" style="font-size: 1.4rem;"></i>
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
              <div style="display: flex; gap: 1rem; padding: 1.25rem; background: #ffffff; border-radius: 1rem; border: 1px solid var(--slate-200); box-shadow: 0 4px 6px -1px rgba(0,0,0,0.03);">
                <div style="width: 2.75rem; height: 2.75rem; border-radius: 0.65rem; background: var(--primary-light); color: var(--primary); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                  <i class="ti ti-device-mobile" style="font-size: 1.4rem;"></i>
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
              <div style="display: flex; gap: 1rem; padding: 1.25rem; background: #ffffff; border-radius: 1rem; border: 1px solid var(--slate-200); box-shadow: 0 4px 6px -1px rgba(0,0,0,0.03);">
                <div style="width: 2.75rem; height: 2.75rem; border-radius: 0.65rem; background: var(--primary-light); color: var(--primary); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                  <i class="ti ti-mail" style="font-size: 1.4rem;"></i>
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
                <a href="{{ $siteconfig->facebook }}" target="_blank" style="width: 2.75rem; height: 2.75rem; border-radius: 0.65rem; background: #ffffff; border: 1px solid var(--slate-200); color: #1877f2; display: flex; align-items: center; justify-content: center; font-size: 1.25rem; transition: transform 0.2s;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
                  <i class="ti ti-brand-facebook"></i>
                </a>
              @endif
              @if(!empty($siteconfig->instagram))
                <a href="{{ $siteconfig->instagram }}" target="_blank" style="width: 2.75rem; height: 2.75rem; border-radius: 0.65rem; background: #ffffff; border: 1px solid var(--slate-200); color: #e1306c; display: flex; align-items: center; justify-content: center; font-size: 1.25rem; transition: transform 0.2s;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
                  <i class="ti ti-brand-instagram"></i>
                </a>
              @endif
              @if(!empty($siteconfig->whatsapp))
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $siteconfig->whatsapp) }}" target="_blank" style="width: 2.75rem; height: 2.75rem; border-radius: 0.65rem; background: #ffffff; border: 1px solid var(--slate-200); color: #25d366; display: flex; align-items: center; justify-content: center; font-size: 1.25rem; transition: transform 0.2s;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
                  <i class="ti ti-brand-whatsapp"></i>
                </a>
              @endif
              @if(!empty($siteconfig->linkedin))
                <a href="{{ $siteconfig->linkedin }}" target="_blank" style="width: 2.75rem; height: 2.75rem; border-radius: 0.65rem; background: #ffffff; border: 1px solid var(--slate-200); color: #0a66c2; display: flex; align-items: center; justify-content: center; font-size: 1.25rem; transition: transform 0.2s;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
                  <i class="ti ti-brand-linkedin"></i>
                </a>
              @endif
            </div>
          </div>

        </div>

        <!-- Right: Modern Contact Form Card -->
        <div style="background: #ffffff; border-radius: 1.25rem; border: 1px solid var(--slate-200); padding: 2.5rem; box-shadow: 0 10px 25px -5px rgba(15, 23, 42, 0.08);">
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
    <section style="line-height: 0; filter: grayscale(0.2) contrast(1.1);">
      {!! $siteconfig->iframemapa !!}
    </section>
  @endif

@endsection