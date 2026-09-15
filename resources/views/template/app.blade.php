<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  @yield('metatags')
  @yield('metatagsog')
  
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@500;600;700&display=swap">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.44.0/tabler-icons.min.css">
  <link rel="stylesheet" href="{{ asset('assets/css/site-tailwind.css') }}">

  @if(!empty($siteconfig->taghead))
    {!! $siteconfig->taghead !!}
  @endif

  @if($siteconfig)
  <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "Organization",
      "image": "{{ url('assets/images/imgseo.webp') }}",
      "url": "{{ url('/') }}",
      "sameAs": [
        @if(!empty($siteconfig->facebook)) "{{ $siteconfig->facebook }}", @endif
        @if(!empty($siteconfig->instagram)) "{{ $siteconfig->instagram }}", @endif
        @if(!empty($siteconfig->linkedin)) "{{ $siteconfig->linkedin }}" @endif
      ],
      "logo": "{{ $siteconfig->logoescura ? url('storage/' . $siteconfig->logoescura) : '' }}",
      "name": "{{ $siteconfig->nomesite }}",
      "description": "{{ $siteconfig->descricao }}",
      "email": "{{ $siteconfig->email }}",
      "telephone": "{{ $siteconfig->celular ?? $siteconfig->telefone }}",
      "address": {
        "@@type": "PostalAddress",
        "streetAddress": "{{ $siteconfig->endereco }}",
        "addressLocality": "Belém",
        "addressCountry": "BR",
        "addressRegion": "PA"
      }
    }
  </script>
  @endif
</head>
<body>

  <!-- Top Info Bar -->
  <div class="top-bar">
    <div class="container-custom top-bar-inner">
      <div class="top-bar-contacts">
        @if(!empty($siteconfig->celular))
          <a href="tel:{{ preg_replace('/[^0-9]/', '', $siteconfig->celular) }}" class="top-bar-link">
            <i class="ti ti-phone"></i>
            <span>{{ $siteconfig->celular }}</span>
          </a>
        @endif
        @if(!empty($siteconfig->email))
          <a href="mailto:{{ $siteconfig->email }}" class="top-bar-link">
            <i class="ti ti-mail"></i>
            <span>{{ $siteconfig->email }}</span>
          </a>
        @endif
      </div>

      <div style="display: flex; align-items: center; gap: 1rem;">
        <div class="footer-social-bar" style="margin-top: 0;">
          @if(!empty($siteconfig->facebook))
            <a href="{{ $siteconfig->facebook }}" target="_blank" title="Facebook" class="top-bar-link"><i class="ti ti-brand-facebook"></i></a>
          @endif
          @if(!empty($siteconfig->instagram))
            <a href="{{ $siteconfig->instagram }}" target="_blank" title="Instagram" class="top-bar-link"><i class="ti ti-brand-instagram"></i></a>
          @endif
          @if(!empty($siteconfig->linkedin))
            <a href="{{ $siteconfig->linkedin }}" target="_blank" title="LinkedIn" class="top-bar-link"><i class="ti ti-brand-linkedin"></i></a>
          @endif
        </div>
      </div>
    </div>
  </div>

  <!-- Main Navigation Header -->
  <header class="site-header" id="mainHeader">
    <div class="container-custom header-inner">
      
      <!-- Brand Logo -->
      <a href="{{ url('/') }}" class="header-logo">
        @if(!empty($siteconfig->logoescura))
          <img src="{{ url('storage/' . $siteconfig->logoescura) }}" alt="{{ $siteconfig->nomesite }}">
        @else
          <span style="font-size: 1.5rem; font-weight: 800; color: var(--navy-950); font-family: var(--font-display);">Metal<span style="color: var(--primary);">Mar</span></span>
        @endif
      </a>

      <!-- Desktop Nav Links -->
      <nav class="header-nav" id="desktopNav">
        <a href="{{ url('/') }}" class="nav-link-item {{ Request::is('/') ? 'active' : '' }}">
          {{ tr('Início') }}
        </a>
        <a href="{{ url('metalmar-manutencao-industrial-e-naval-em-belem-do-para') }}" class="nav-link-item {{ Request::is('metalmar-manutencao-industrial-e-naval-em-belem-do-para') ? 'active' : '' }}">
          {{ tr('Quem Somos') }}
        </a>
        <a href="{{ url('solucoes-em-manutencao-industrial-e-naval-em-belem-do-para') }}" class="nav-link-item {{ Request::is('*solucoes*') ? 'active' : '' }}">
          {{ tr('Soluções') }}
        </a>
        <a href="{{ url('blog-metalmar') }}" class="nav-link-item {{ Request::is('*blog*') || Request::is('*pesquisar*') ? 'active' : '' }}">
          Blog
        </a>
        <a href="{{ url('contato-metalmar-manutencao-industrial-e-naval-em-belem-do-para') }}" class="nav-link-item {{ Request::is('*contato*') ? 'active' : '' }}">
          {{ tr('Contato') }}
        </a>
      </nav>

      <!-- Actions (Language + CTA + Mobile Toggle) -->
      <div class="header-actions">
        <!-- Language Switcher -->
        <div class="lang-select-wrapper">
          <i class="ti ti-world lang-select-icon" aria-hidden="true"></i>
          <select class="lang-select-custom" id="langSelectDesktop" title="{{ tr('Alterar Idioma') }}" aria-label="{{ tr('Alterar Idioma') }}" onchange="handleLangChange(this.value)">
            <option value="pt-BR" {{ session()->get('locale') == 'pt-BR' || !session()->has('locale') ? 'selected' : '' }}>PT</option>
            <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>EN</option>
            <option value="es" {{ session()->get('locale') == 'es' ? 'selected' : '' }}>ES</option>
          </select>
        </div>

        <!-- CTA Button -->
        <a href="{{ url('contato-metalmar-manutencao-industrial-e-naval-em-belem-do-para') }}" class="btn-primary header-cta-btn" style="padding: 0.55rem 1.15rem; font-size: 0.875rem;" id="headerCtaBtn">
          <span>{{ tr('Orçamento') }}</span>
          <i class="ti ti-arrow-right" style="font-size: 1rem;"></i>
        </a>

        <!-- Mobile Toggle Button -->
        <button type="button" id="mobileMenuBtn" class="mobile-menu-btn" aria-label="Abrir Menu">
          <i class="ti ti-menu-2"></i>
        </button>
      </div>

    </div>
  </header>

  <!-- Mobile Drawer Menu -->
  <div class="mobile-drawer" id="mobileDrawer">
    <div class="mobile-drawer-backdrop" id="mobileDrawerBackdrop"></div>
    <div class="mobile-drawer-content">
      
      <!-- Drawer Header -->
      <div class="mobile-drawer-header">
        @if(!empty($siteconfig->logoescura))
          <img src="{{ url('storage/' . $siteconfig->logoescura) }}" alt="{{ $siteconfig->nomesite }}" style="max-height: 38px; width: auto;">
        @else
          <span style="font-size: 1.35rem; font-weight: 800; color: var(--navy-950); font-family: var(--font-display);">Metal<span style="color: var(--primary);">Mar</span></span>
        @endif
        <button type="button" id="closeDrawerBtn" aria-label="Fechar Menu" class="mobile-menu-btn" style="display: flex;">
          <i class="ti ti-x"></i>
        </button>
      </div>

      <!-- Drawer Nav Links -->
      <nav class="mobile-nav-list">
        <a href="{{ url('/') }}" class="mobile-nav-link {{ Request::is('/') ? 'active' : '' }}">
          <span><i class="ti ti-home" style="margin-right: 0.65rem; color: var(--primary);"></i>{{ tr('Início') }}</span>
          <i class="ti ti-chevron-right" style="font-size: 0.875rem;"></i>
        </a>
        <a href="{{ url('metalmar-manutencao-industrial-e-naval-em-belem-do-para') }}" class="mobile-nav-link {{ Request::is('*metalmar-manutencao-industrial*') ? 'active' : '' }}">
          <span><i class="ti ti-building" style="margin-right: 0.65rem; color: var(--primary);"></i>{{ tr('Quem Somos') }}</span>
          <i class="ti ti-chevron-right" style="font-size: 0.875rem;"></i>
        </a>
        <a href="{{ url('solucoes-em-manutencao-industrial-e-naval-em-belem-do-para') }}" class="mobile-nav-link {{ Request::is('*solucoes*') ? 'active' : '' }}">
          <span><i class="ti ti-tool" style="margin-right: 0.65rem; color: var(--primary);"></i>{{ tr('Soluções') }}</span>
          <i class="ti ti-chevron-right" style="font-size: 0.875rem;"></i>
        </a>
        <a href="{{ url('blog-metalmar') }}" class="mobile-nav-link {{ Request::is('*blog*') || Request::is('*pesquisar*') ? 'active' : '' }}">
          <span><i class="ti ti-news" style="margin-right: 0.65rem; color: var(--primary);"></i>Blog</span>
          <i class="ti ti-chevron-right" style="font-size: 0.875rem;"></i>
        </a>
        <a href="{{ url('contato-metalmar-manutencao-industrial-e-naval-em-belem-do-para') }}" class="mobile-nav-link {{ Request::is('*contato*') ? 'active' : '' }}">
          <span><i class="ti ti-mail" style="margin-right: 0.65rem; color: var(--primary);"></i>{{ tr('Contato') }}</span>
          <i class="ti ti-chevron-right" style="font-size: 0.875rem;"></i>
        </a>
      </nav>

      <!-- Drawer Contact & Language Info -->
      <div style="margin-top: auto; padding-top: 1.25rem; border-top: 1px solid var(--slate-200); display: flex; flex-direction: column; gap: 0.75rem;">
        <div style="font-size: 0.8125rem; color: var(--slate-500); font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em;">
          {{ tr('Fale Conosco') }}
        </div>
        @if(!empty($siteconfig->celular))
          <a href="tel:{{ preg_replace('/[^0-9]/', '', $siteconfig->celular) }}" style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.9375rem; color: var(--slate-800); font-weight: 600;">
            <i class="ti ti-phone-call" style="color: var(--primary);"></i>
            {{ $siteconfig->celular }}
          </a>
        @endif
        @if(!empty($siteconfig->email))
          <a href="mailto:{{ $siteconfig->email }}" style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.875rem; color: var(--slate-600);">
            <i class="ti ti-mail" style="color: var(--primary);"></i>
            {{ $siteconfig->email }}
          </a>
        @endif

        <!-- Drawer Language Switcher -->
        <div style="font-size: 0.8125rem; color: var(--slate-500); font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; margin-top: 0.25rem;">
          {{ tr('Idioma') }}
        </div>
        <div class="lang-select-wrapper" style="width: 100%;">
          <i class="ti ti-world lang-select-icon" aria-hidden="true"></i>
          <select class="lang-select-custom" id="langSelectMobile" style="width: 100%;" title="{{ tr('Alterar Idioma') }}" aria-label="{{ tr('Alterar Idioma') }}" onchange="handleLangChange(this.value)">
            <option value="pt-BR" {{ session()->get('locale') == 'pt-BR' || !session()->has('locale') ? 'selected' : '' }}>Português (PT)</option>
            <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English (EN)</option>
            <option value="es" {{ session()->get('locale') == 'es' ? 'selected' : '' }}>Español (ES)</option>
          </select>
        </div>

        <a href="{{ url('contato-metalmar-manutencao-industrial-e-naval-em-belem-do-para') }}" class="btn-primary" style="margin-top: 0.5rem; width: 100%;">
          {{ tr('Solicitar Orçamento') }}
        </a>
      </div>

    </div>
  </div>

  <!-- Dynamic Content Yield -->
  <main style="flex: 1 0 auto;">
    @yield('content')
  </main>

  <!-- WhatsApp Floating Button -->
  @if(!empty($siteconfig->whatsapp) || !empty($siteconfig->celular))
    @php
      $wppRaw = $siteconfig->whatsapp ?? $siteconfig->celular;
      $wppClean = preg_replace('/[^0-9]/', '', $wppRaw);
      if (strlen($wppClean) <= 11 && !str_starts_with($wppClean, '55')) {
          $wppClean = '55' . $wppClean;
      }
    @endphp
    <a href="https://wa.me/{{ $wppClean }}?text={{ urlencode('Olá! Gostaria de mais informações sobre os serviços da MetalMar.') }}" target="_blank" rel="noopener noreferrer" class="whatsapp-float" title="{{ tr('Fale Conosco pelo WhatsApp') }}" aria-label="WhatsApp">
      <i class="ti ti-brand-whatsapp"></i>
    </a>
  @endif

  <!-- Modern Site Footer -->
  <footer class="site-footer">
    <div class="container-custom">
      <div class="footer-grid">
        
        <!-- Col 1: Brand & About -->
        <div>
          <div style="margin-bottom: 1.25rem;">
            @if(!empty($siteconfig->logobranca))
              <img src="{{ url('storage/' . $siteconfig->logobranca) }}" alt="{{ $siteconfig->nomesite }}" style="max-height: 44px; width: auto;">
            @elseif(!empty($siteconfig->logoescura))
              <img src="{{ url('storage/' . $siteconfig->logoescura) }}" alt="{{ $siteconfig->nomesite }}" style="max-height: 44px; width: auto; filter: brightness(0) invert(1);">
            @else
              <span style="font-size: 1.5rem; font-weight: 800; color: #ffffff; font-family: var(--font-display);">Metal<span style="color: var(--primary);">Mar</span></span>
            @endif
          </div>
          <p style="color: var(--slate-400); font-size: 0.9375rem; line-height: 1.6; margin-bottom: 1.5rem;">
            {{ $siteconfig->descricao ?? 'Especialistas em Manutenção Industrial e Naval em Belém do Pará, fornecendo serviços com alto padrão de qualidade e segurança operacional.' }}
          </p>
          <div class="footer-social-bar">
            @if(!empty($siteconfig->facebook))
              <a href="{{ $siteconfig->facebook }}" target="_blank" class="footer-social-link" title="Facebook"><i class="ti ti-brand-facebook"></i></a>
            @endif
            @if(!empty($siteconfig->instagram))
              <a href="{{ $siteconfig->instagram }}" target="_blank" class="footer-social-link" title="Instagram"><i class="ti ti-brand-instagram"></i></a>
            @endif
            @if(!empty($siteconfig->linkedin))
              <a href="{{ $siteconfig->linkedin }}" target="_blank" class="footer-social-link" title="LinkedIn"><i class="ti ti-brand-linkedin"></i></a>
            @endif
          </div>
        </div>

        <!-- Col 2: Navigation Links -->
        <div>
          <h4 class="footer-heading">{{ tr('Navegação') }}</h4>
          <ul class="footer-nav-list">
            <li><a href="{{ url('/') }}" class="footer-link">{{ tr('Página Inicial') }}</a></li>
            <li><a href="{{ url('metalmar-manutencao-industrial-e-naval-em-belem-do-para') }}" class="footer-link">{{ tr('Quem Somos') }}</a></li>
            <li><a href="{{ url('solucoes-em-manutencao-industrial-e-naval-em-belem-do-para') }}" class="footer-link">{{ tr('Nossas Soluções') }}</a></li>
            <li><a href="{{ url('blog-metalmar') }}" class="footer-link">Blog & Notícias</a></li>
            <li><a href="{{ url('contato-metalmar-manutencao-industrial-e-naval-em-belem-do-para') }}" class="footer-link">{{ tr('Fale Conosco') }}</a></li>
            <li><a href="{{ url('politica-de-privacidade') }}" class="footer-link">{{ tr('Política de Privacidade') }}</a></li>
          </ul>
        </div>

        <!-- Col 3: Areas de Atuacao -->
        <div>
          <h4 class="footer-heading">{{ tr('Áreas de Atuação') }}</h4>
          <ul class="footer-nav-list">
            <li style="color: var(--slate-400); font-size: 0.9375rem; display: flex; align-items: center; gap: 0.5rem;">
              <i class="ti ti-chevron-right" style="color: var(--primary);"></i>
              {{ tr('Manutenção Industrial') }}
            </li>
            <li style="color: var(--slate-400); font-size: 0.9375rem; display: flex; align-items: center; gap: 0.5rem;">
              <i class="ti ti-chevron-right" style="color: var(--primary);"></i>
              {{ tr('Manutenção Naval') }}
            </li>
            <li style="color: var(--slate-400); font-size: 0.9375rem; display: flex; align-items: center; gap: 0.5rem;">
              <i class="ti ti-chevron-right" style="color: var(--primary);"></i>
              {{ tr('Caldeiraria & Soldagem') }}
            </li>
            <li style="color: var(--slate-400); font-size: 0.9375rem; display: flex; align-items: center; gap: 0.5rem;">
              <i class="ti ti-chevron-right" style="color: var(--primary);"></i>
              {{ tr('Usinagem & Reparos') }}
            </li>
            <li style="color: var(--slate-400); font-size: 0.9375rem; display: flex; align-items: center; gap: 0.5rem;">
              <i class="ti ti-chevron-right" style="color: var(--primary);"></i>
              {{ tr('Engenharia Diagnóstica') }}
            </li>
          </ul>
        </div>

        <!-- Col 4: Contacts & Address -->
        <div>
          <h4 class="footer-heading">{{ tr('Localização & Contato') }}</h4>
          <div style="display: flex; flex-direction: column; gap: 0.85rem; font-size: 0.9375rem;">
            @if(!empty($siteconfig->endereco))
              <div style="display: flex; gap: 0.65rem; color: var(--slate-300);">
                <i class="ti ti-map-pin" style="color: var(--primary); font-size: 1.25rem; flex-shrink: 0; margin-top: 0.2rem;"></i>
                <span>{{ $siteconfig->endereco }}</span>
              </div>
            @endif
            @if(!empty($siteconfig->celular))
              <div style="display: flex; gap: 0.65rem; color: var(--slate-300);">
                <i class="ti ti-phone" style="color: var(--primary); font-size: 1.15rem; flex-shrink: 0;"></i>
                <a href="tel:{{ preg_replace('/[^0-9]/', '', $siteconfig->celular) }}" class="footer-link">{{ $siteconfig->celular }}</a>
              </div>
            @endif
            @if(!empty($siteconfig->email))
              <div style="display: flex; gap: 0.65rem; color: var(--slate-300);">
                <i class="ti ti-mail" style="color: var(--primary); font-size: 1.15rem; flex-shrink: 0;"></i>
                <a href="mailto:{{ $siteconfig->email }}" class="footer-link">{{ $siteconfig->email }}</a>
              </div>
            @endif
          </div>
        </div>

      </div>

      <!-- Copyright Bottom Bar -->
      <div class="footer-bottom">
        <div class="footer-bottom-inner">
          <p>© {{ date('Y') }} {{ $siteconfig->nomesite ?? 'MetalMar' }}. {{ tr('Todos os direitos reservados.') }}</p>
          <p>Desenvolvido com excelência por <a href="https://moystation.com" target="_blank" style="color: #ffffff; font-weight: 600;">Moy Station</a></p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Responsive Header & Drawer Scripts -->
  <script>
    // Header shadow on scroll
    const mainHeader = document.getElementById('mainHeader');
    window.addEventListener('scroll', () => {
      if (window.scrollY > 20) {
        mainHeader.classList.add('scrolled');
      } else {
        mainHeader.classList.remove('scrolled');
      }
    });

    // Mobile drawer toggles
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const mobileDrawer = document.getElementById('mobileDrawer');
    const mobileDrawerBackdrop = document.getElementById('mobileDrawerBackdrop');
    const closeDrawerBtn = document.getElementById('closeDrawerBtn');

    function openDrawer() {
      mobileDrawer.classList.add('active');
      document.body.style.overflow = 'hidden';
    }

    function closeDrawer() {
      mobileDrawer.classList.remove('active');
      document.body.style.overflow = '';
    }

    if (mobileMenuBtn) mobileMenuBtn.addEventListener('click', openDrawer);
    if (closeDrawerBtn) closeDrawerBtn.addEventListener('click', closeDrawer);
    if (mobileDrawerBackdrop) mobileDrawerBackdrop.addEventListener('click', closeDrawer);

    // Language Change handler
    function handleLangChange(locale) {
      window.location.href = "{{ url('google/translate/change') }}?lang=" + encodeURIComponent(locale);
    }
  </script>


  @if(!empty($siteconfig->codchat))
    {!! $siteconfig->codchat !!}
  @endif

  @yield('scripts')
</body>
</html>