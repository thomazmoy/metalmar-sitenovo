<html lang="pt-BR">
<head>
  @yield('metatags')
  @yield('metatagsog')
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link href='{{ url("assets/fonts/flaticon/flaticon.css") }}' rel="stylesheet">
  <link href='{{ url("assets/css/style-starter.css") }}' rel="stylesheet">
  <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "Organization",
      "image": "https://www.metalmar.ind.br/assets/images/imgseo.webp",
      "url": "https://www.metalmar.ind.br",
      "sameAs": ["https://www.facebook.com/LMSEngenharia1",
        "https://www.instagram.com/lms_engenharia/"],
      "logo": "https://www.metalmar.ind.br/storage/{{$siteconfig->logoescura}}",
      "name": "{{$siteconfig->nomesite}}",
      "description": "{{$siteconfig->descricao}}",
      "email": "{{$siteconfig->email}}",
      "telephone": "{{$siteconfig->celular}}",
      "address": {
        "@@type": "PostalAddress",
        "streetAddress": "Rod. Augusto Montenegro, 3796 - Sala 3 - Parque Guajará",
        "addressLocality": "Belém",
        "addressCountry": "BR",
        "addressRegion": "PA",
        "postalCode": "66823-010"
      }
    }
  </script>
</head>
<body>
  <!-- Menu -->
  <section class="w3l-bootstrap-header">
    <h2 class="d-none">{{$siteconfig->nomesite}}</h2>
    <h3 class="d-none">{{$siteconfig->nomesite}}</h3>
    <nav class="navbar navbar-expand-lg navbar-light py-2">
      <div class="container">
        <a class="navbar-brand" href='{{ url("") }}'>
          @if($siteconfig->logoescura)
            <img src='{{ url("storage/{$siteconfig->logoescura}") }}' class="img-fluid menu-logo" alt="{{$siteconfig->nomesite}}">
          @endif
        </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="{{ Request::url() == url('/') ? 'nav-link active' : 'nav-link' }}" href='{{ url("") }}'>
                {{ tr('Início') }}
              </a>
            </li>
            <li class="nav-item">
              <a class="{{ Request::url() == url('metalmar-manutencao-industrial-e-naval-em-belem-do-para') ? 'nav-link active' : 'nav-link' }}"
                href='{{ url("metalmar-manutencao-industrial-e-naval-em-belem-do-para") }}'>
                {{ tr('Quem Somos') }}
              </a>
            </li>
            <li class="nav-item">
              <a class="{{ Request::url() == url('solucoes-em-manutencao-industrial-e-naval-em-belem-do-para') ? 'nav-link active' : 'nav-link' }}
                {{ Request::segment(1) === 'solucoes' ? 'active' : '' }}"
                href='{{ url("solucoes-em-manutencao-industrial-e-naval-em-belem-do-para") }}'>
                {{ tr('Soluções') }}
              </a>
            </li>
            <li class="nav-item">
              <a class="{{ Request::url() == url('blog-metalmar') ? 'nav-link active' : 'nav-link' }}
                {{ Request::segment(1) === 'blog' ? 'active' : '' }}
                {{ Request::segment(1) === 'pesquisar' ? 'active' : '' }}"
                href='{{ url("blog-metalmar") }}'>Blog</a>
            </li>
            <li class="nav-item">
              <a class="{{ Request::url() == url('contato-metalmar-manutencao-industrial-e-naval-em-belem-do-para') ? 'nav-link active' : 'nav-link' }}"
                href='{{ url("contato-metalmar-manutencao-industrial-e-naval-em-belem-do-para") }}'>
                {{ tr('Contato') }}
              </a>
            </li>
          </ul>
        </div>
        <select class="changeLanguage ms-3">
          <option value="pt-BR" title="Português" selected>🇧🇷</option>
          <option value="en" title="Inglês" {{ session()->get('locale') == 'en' ? 'selected' : ''}}>🇬🇧</option>
          <option value="es" title="Espanhol" {{ session()->get('locale') == 'es' ? 'selected' : ''}}>🇪🇸</option>
        </select>
        <a href="#menu" class="domain ml-2" data-toggle="modal" data-target="#DomainModal">
          <div class="hamburger1">
            <div></div>
            <div></div>
            <div></div>
          </div>
        </a>
      </div>
    </nav>
  </section>
  <!-- Menu Modal -->
  <div class="modal right fade" id="DomainModal" tabindex="-1" role="dialog" aria-labelledby="DomainModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="modal-body pt-0">
          <div class="modal__content">
            <h2 class="logo">
              @if($siteconfig->logoescura)
                <img src='{{ url("storage/{$siteconfig->logoescura}") }}' class="img-fluid menu-logo-2" alt="{{$siteconfig->nomesite}}">
              @endif
            </h2>
            <div class="widget-menu-items mt-4">
              <h5 class="widget-title">Menu</h5>
              <nav class="navbar p-0">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="{{ Request::url() == url('/') ? 'nav-link active' : 'nav-link' }}" href='{{ url("") }}'>
                      {{ tr('Início') }}
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="{{ Request::url() == url('metalmar-manutencao-industrial-e-naval-em-belem-do-para') ? 'nav-link active' : 'nav-link' }}"
                      href='{{ url("metalmar-manutencao-industrial-e-naval-em-belem-do-para") }}'>
                      {{ tr('Quem Somos') }}
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="{{ Request::url() == url('solucoes-em-manutencao-industrial-e-naval-em-belem-do-para') ? 'nav-link active' : 'nav-link' }}
                      {{ Request::segment(1) === 'solucoes' ? 'active' : '' }}"
                      href='{{ url("solucoes-em-manutencao-industrial-e-naval-em-belem-do-para") }}'>
                      {{ tr('Soluções') }}
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="{{ Request::url() == url('blog-metalmar') ? 'nav-link active' : 'nav-link' }}
                      {{ Request::segment(1) === 'blog' ? 'active' : '' }}
                      {{ Request::segment(1) === 'pesquisar' ? 'active' : '' }}"
                      href='{{ url("blog-metalmar") }}'>Blog</a>
                  </li>
                  <li class="nav-item">
                    <a class="{{ Request::url() == url('contato-metalmar-manutencao-industrial-e-naval-em-belem-do-para') ? 'nav-link active' : 'nav-link' }}"
                      href='{{ url("contato-metalmar-manutencao-industrial-e-naval-em-belem-do-para") }}'>
                      {{ tr('Contato') }}
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
            <div class="widget-social-icons mt-4">
              <h5 class="widget-title">{{ tr('Onde Estamos?') }}</h5>
              <ul class="icon-rounded address d-grid">
                <li>
                  <p><span class="fa fa-map"></span>
                    <a href="{{$siteconfig->linkendereco}}" target="_blank">
                      {{ $siteconfig->endereco }}
                    </a>
                  </p>
                </li>
                <li class="mt-2">
                  <p><span class="fa fa-mobile"></span>
                    <a href='tel:{{preg_replace("/[^0-9]/", "", $siteconfig->celular)}}' target="_blank">{{$siteconfig->celular}}</a>
                  </p>
                </li>
                @if(!empty($siteconfig->telefone))
                  <li class="mt-2">
                    <p><span class="fa fa-phone"></span>
                      <a href='tel:{{preg_replace("/[^0-9]/", "", $siteconfig->telefone)}}' target="_blank">{{$siteconfig->telefone}}</a>
                    </p>
                  </li>
                @endif
                <li class="mt-2">
                  <p><span class="fa fa-envelope"></span>
                    <a href="mailto:{{$siteconfig->email}}" target="_blank">{{$siteconfig->email}}</a>
                  </p>
                </li>
              </ul>
            </div>
            <div class="widget-social-icons mt-4">
              <h5 class="widget-title">{{ tr('Siga-nos') }}</h5>
              <ul class="icon-rounded">
                @if(!empty($siteconfig->facebook))
                  <li><a class="social-link facebook" href="{{$siteconfig->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                @endif
                @if(!empty($siteconfig->instagram))
                  <li><a class="social-link instagram" href="{{$siteconfig->instagram}}" target="_blank"><i class="fa fa-instagram"></i></a></li>
                @endif
                @if(!empty($siteconfig->whatsapp))
                  <li><a class="social-link whatsapp" href="{{$siteconfig->whatsapp}}" target="_blank"><i class="fa fa-whatsapp"></i></a></li>
                @endif
                @if(!empty($siteconfig->twitter))
                  <li><a class="social-link twitter" href="{{$siteconfig->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                @endif
                @if(!empty($siteconfig->linkedin))
                  <li><a class="social-link linkedin" href="{{$siteconfig->linkedin}}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                @endif
                @if(!empty($siteconfig->youtube))
                  <li><a class="social-link youtube" href="{{$siteconfig->youtube}}" target="_blank"><i class="fa fa-youtube"></i></a></li>
                @endif
              </ul>
            </div>
            <div class="widget-social-icons my-4">
              <h5 class="widget-title">{{ tr('Horário de Atendimento') }}</h5>
              <ul class="icon-rounded address d-grid">
                <li class="top_li1 mt-2">
                  <p><span class="fa fa-clock-o"></span>
                    <a href="#horario">{{ tr('Segunda à Sexta 8h - 18h') }}</a>
                  </p>
                  <p><span class="fa fa-clock-o"></span>
                    <a href="#horario">{{ tr('Sábado 8h - 12h') }}</a>
                  </p>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @yield('content')

  <!-- Footer -->
  <section class="w3l-medpill-footer">
    <footer class="footer-28">
      <div class="footer-bg-layer">
        <div class="container py-3">
          <div class="row footer-top-28 justify-content-center">
            <div class="col-md-4 mt-sm-5 mt-4">
              <h6 class="footer-title-28">{{ tr('Onde Estamos?') }}</h6>
              <ul class="unlisted timing">
                <li>
                  <a href="{{$siteconfig->linkendereco}}" target="_blank"><span class="fa fa-map"></span>
                    {{ $siteconfig->endereco }}
                  </a>
                </li>
                <li>
                  <a href='tel:{{preg_replace("/[^0-9]/", "", $siteconfig->celular)}}' target="_blank"><span class="fa fa-mobile"></span> {{$siteconfig->celular}}</a>
                </li>
                @if(!empty($siteconfig->telefone))
                  <li>
                    <a href='tel:{{preg_replace("/[^0-9]/", "", $siteconfig->telefone)}}' target="_blank"><span class="fa fa-phone"></span> {{$siteconfig->telefone}}</a>
                  </li>
                @endif
                <li>
                  <a href="mailto:{{$siteconfig->email}}" target="_blank"><span class="fa fa-envelope"></span> {{$siteconfig->email}}</a>
                </li>
              </ul>
            </div>
            <div class="col-md-6 text-center footer-list-28 mt-sm-5 mt-4">
              <a href='{{ url("") }}'>
                @if($siteconfig->logobranca)
                  <img src='{{ url("storage/{$siteconfig->logobranca}") }}' class="img-fluid menu-logo-2" alt="{{$siteconfig->nomesite}}">
                @endif
              </a>
              <p class="my-3">
                {{ $siteconfig->descricao }}
              </p>
              <p class="fw-bold mb-3">CNPJ: 20.606.008/0001-03</p>
              <h6 class="footer-title-28 mb-2">
                {{ tr('Siga-nos') }}
              </h6>
              <div class="widget-social-icons mb-4">
                <ul class="unlisted d-flex justify-content-center">
                  @if(!empty($siteconfig->facebook))
                    <li><a class="social-link text-white facebook" href="{{$siteconfig->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                  @endif
                  @if(!empty($siteconfig->instagram))
                    <li><a class="social-link text-white instagram" href="{{$siteconfig->instagram}}" target="_blank"><i class="fa fa-instagram"></i></a></li>
                  @endif
                  @if(!empty($siteconfig->whatsapp))
                    <li><a class="social-link text-white whatsapp" href="{{$siteconfig->whatsapp}}" target="_blank"><i class="fa fa-whatsapp"></i></a></li>
                  @endif
                  @if(!empty($siteconfig->twitter))
                    <li><a class="social-link text-white twitter" href="{{$siteconfig->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                  @endif
                  @if(!empty($siteconfig->linkedin))
                    <li><a class="social-link text-white linkedin" href="{{$siteconfig->linkedin}}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                  @endif
                  @if(!empty($siteconfig->youtube))
                    <li><a class="social-link text-white youtube" href="{{$siteconfig->youtube}}" target="_blank"><i class="fa fa-youtube"></i></a></li>
                  @endif
                </ul>
              </div>
              <a href='{{ url("politica-de-privacidade") }}'><i class="ic fa fa-lock"></i> {{ tr('Política de Privacidade') }}</a>
            </div>
          </div>
        </div>
      </div>
      <div class="midd-footer-28 py-lg-4 py-3 mt-md-5 mt-3">
        <div class="container">
          <div class="row">
            <div class="col-md-10">
              <p class="copy-footer-28 text-md-left text-center">MetalMar &copy;2014-{{ date('Y') }} {{ tr('Todos os direitos reservados.') }} <a class="d-block" href="https://www.moystation.com/" target="_blank">{{ tr('Desenvolvido por') }} <img class="mt-n2" src='{{ url("assets/images/moy.webp") }}' alt="Moy Station"></a></p>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </section>

  <!-- Cod Chat -->
  <div class="d-md-block d-none">
    <a href="{{$siteconfig->whatsapp}}" class="btn btn-flutuante btn-flutuante-whatsapp bg-whatsapp d-flex align-items-center justify-content-center" target="_blank">
      <i class="fa fa-whatsapp mr-2"></i> WhatsApp
    </a>
    <a href='tel:{{preg_replace("/[^0-9]/", "", $siteconfig->celular)}}' class="btn btn-flutuante btn-flutuante-ligacao d-flex align-items-center justify-content-center" target="_blank">
      <i class="fa fa-mobile mr-2"></i> {{ tr('Celular') }}
    </a>
  </div>
  <div class="row btn-flutuante-2 d-md-none w-100 mx-0">
    <div class="col-6 bg-primary d-flex justify-content-center align-items-center text-center py-2 px-0">
      <a href='tel:{{preg_replace("/[^0-9]/", "", $siteconfig->celular)}}' class="fw-medium text-white" target="_blank"><i class="fa fa-mobile"></i> {{ tr('Celular') }}</a>
    </div>
    <div class="col-6 bg-whatsapp d-flex justify-content-center align-items-center text-center py-2 px-0">
      <a href="{{$siteconfig->whatsapp}}" class="fw-medium text-white" target="_blank"><i class="fa fa-whatsapp"></i> WhatsApp</a>
    </div>
  </div>
  {!!$siteconfig->codchat!!}

  @include('sweetalert::alert')
  @include('cookie-consent::index')

  <script src='{{ url("assets/js/jquery-3.3.1.min.js") }}'></script>
  <script src='{{ url("assets/js/owl.carousel.js") }}'></script>
  <script src='{{ url("assets/js/bootstrap.min.js") }}'></script>
  <script src='{{ url("assets/js/script.js") }}'></script>
  <script>
    $('.changeLanguage').change(function(event){
      var url = "{{ route('google.translate.change') }}";
      window.location.href = url+"?lang="+$(this).val()
    })
  </script>
</body>
</html>