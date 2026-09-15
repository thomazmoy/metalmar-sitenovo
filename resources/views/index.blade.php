<!DOCTYPE html>
@extends('template.app')
@section('metatags')
  @if(!empty($siteconfig->taghead))
    {!!$siteconfig->taghead!!}
  @endif
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>{{$siteconfig->nomesite}}</title>
  <link rel="canonical" href='{{ url("") }}'>
  <meta property="og:url" content='{{ url("") }}'>
  <meta property="og:title" content="{{$siteconfig->nomesite}}">
  <meta property="og:image:alt" content="{{$siteconfig->nomesite}}">
  <meta name="twitter:url" content='{{ url("") }}'>
  <meta name="twitter:title" content="{{$siteconfig->nomesite}}">
@endsection
@section('metatagsog')
  @include('template.metatags')
@endsection
@section('content')

  <!-- Banner -->
  <div id="carouselMetalMar1" class="carousel slide carousel-fade" data-ride="carousel">
    <div class="carousel-inner">
      @foreach($banner as $banners)
        <div class="carousel-item @if($loop->first) active @endif" data-interval="5000">
          <a href="{{$banners->linkbanner}}" target="_blank">
            @if($banners->imgbanner)
              <picture>
                <source media="(min-width:768px)" srcset='{{ url("storage/{$banners->imgbanner}") }}'>
                <img src='{{ url("storage/{$banners->imgmobile}") }}' class="d-block w-100" alt="{{$banners->titulo}}">
              </picture>
            @endif
          </a>
        </div>
      @endforeach
    </div>
    <a class="carousel-control-prev d-md-flex d-none" href="#carouselMetalMar1" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Anterior</span>
    </a>
    <a class="carousel-control-next d-md-flex d-none" href="#carouselMetalMar1" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Próximo</span>
    </a>
  </div>

  <h1 class="d-none">Metal Mar Menutenção Industrial e Naval</h1>

  <!-- Sobre -->
  <section class="w3l-features-photo-7 py-5">
    <div class="w3l-features-photo-7_sur py-lg-5 py-sm-3">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 m-auto">
            @if($quemsomos->imgum)
              <img src='{{ url("storage/{$quemsomos->imgum}") }}' class="img-fluid" alt="{{$quemsomos->tituloum}}">
            @endif
          </div>
          <div class="col-lg-6 sobre-p m-auto text-justify">
            <h2 class="fw-bold">{{ $quemsomos->tituloum }}</h2>
            {!! $quemsomos->textoum !!}
            <a href='{{ url("metalmar-manutencao-industrial-e-naval-em-belem-do-para") }}' class="btn btn-primary btn-style mt-3">{{ tr('Conheça a MetalMar') }} <span class="fa fa-angle-double-right fw-bold ml-2"></span></a>
          </div>
        </div>
        <div class="row justify-content-center py-5">
          <div class="col-lg-10 text-center m-auto">
            <h2 class="fw-bold">{{ tr('Nossas Áreas de Atuação') }}</h2>
            <div class="feat_top">
              <div class="text-center">
                <div class="icon d-flex justify-content-center align-items-center m-auto">
                  <img src='{{ url("assets/images/i1.png") }}' alt="Manutenção Industrial">
                </div>
                <div class="info-feature">
                  <h5 class="w3l-features-photo-7-box-txt"><a>{{ tr('Manutenção Industrial') }}</a></h5>
                  <p>{{ tr('Atividade fundamental para garantir a eficiência e a segurança das máquinas e equipamentos utilizados nos processos produtivos.') }}</p>
                </div>
              </div>
              <div class="text-center">
                <div class="icon d-flex justify-content-center align-items-center m-auto">
                  <img src='{{ url("assets/images/i2.png") }}' alt="Manutenção Naval">
                </div>
                <div class="info-feature">
                  <h5 class="w3l-features-photo-7-box-txt"><a>{{ tr('Manutenção Naval') }}</a></h5>
                  <p>{{ tr('É essencial para garantir a segurança e a durabilidade dos navios e embarcações que operam em navegação interior e alto-mar.') }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-lg-6 m-auto order-lg-last">
            @if($quemsomos->imgdois)
              <img src='{{ url("storage/{$quemsomos->imgdois}") }}' class="img-fluid" alt="{{$quemsomos->titulodois}}">
            @endif
          </div>
          <div class="col-lg-6 sobre-p m-auto">
            <h2 class="fw-bold">{{ tr('Nossas Soluções') }}</h2>
            <ul class="unlisted">
              <li class="border-bottom fw-bold py-2">
                <p><span class="fa fa-angle-double-right color-item"></span> {{ tr('Preventiva e Corretiva de motores da linha Marítima e Industrial') }}</p>
              </li>
              <li class="border-bottom fw-bold py-2">
                <p><span class="fa fa-angle-double-right color-item"></span> {{ tr('Manutenção em Sistema de Refrigeração e Elaboração PMOC') }}</p>
              </li>
              <li class="border-bottom fw-bold py-2">
                <p><span class="fa fa-angle-double-right color-item"></span> {{ tr('Caldeiraria, Manutenção Estruturas Metálicas e Soldagem') }}</p>
              </li>
              <li class="border-bottom fw-bold py-2">
                <p><span class="fa fa-angle-double-right color-item"></span> {{ tr('Recuperação de Elementos de Máquinas') }}</p>
              </li>
              <li class="border-bottom fw-bold py-2">
                <p><span class="fa fa-angle-double-right color-item"></span> {{ tr('Fornecimento de Mão de Obra Qualificada nas Áreas de Supervisão, Lubrificação, Mecânica, Caldeiraria, Soldagem e Auxiliares') }}</p>
              </li>
            </ul>
            <a href="{{$siteconfig->whatsapp}}" class="btn btn-whatsapp btn-style mt-3" target="_blank"><span class="fa fa-whatsapp fs-4 fw-bold mr-2"></span> {{ tr('Peça Seu Orçamento') }}</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Blog -->
  <div class="w3l-news" id="news">
    <section id="grids5-block" class="py-5">
      <div class="container py-lg-4 py-sm-3">
        <h3 class="title text-center">Blog MetalMar</h3>
        <p class="text-center mb-sm-5 mb-4">{{ tr('Acesse Nosso Blog! Nosso Espaço para Compartilhar Conhecimento e Informações.') }}</p>
        <div class="row">
          @foreach($blog as $blogs)
            <div class="col-lg-4 col-md-6 column mb-4">
              <div class="grids5-info">
                <a href='{{ url("blog/{$blogs->urltitulo}") }}' class="d-block zoom">
                  @if($blogs->img)
                    <img src='{{ url("storage/{$blogs->img}") }}' class="img-fluid news-image" alt="{{$blogs->titulo}}">
                  @endif
                </a>
                <div class="blog-info">
                  <p class="date mb-0"><span class="fa fa-clock-o mr-2"></span>{{strftime('%d %b %Y', strtotime($blogs->created_at))}}</p>
                  <h4><a href='{{ url("blog/{$blogs->urltitulo}") }}'>{{ $blogs->titulo }}</a></h4>
                  <p>{{ $blogs->descricao }}</p>
                  <ul class="blog-tags">
                    <li><a class="fw-bold text-azul-2"><span class="fa fa-tags mr-2"></span>{{ $blogs->categoria->nome }}</a></li>
                  </ul>
                </div>
              </div>
            </div>
          @endforeach
        </div>
        <div class="row">
          <div class="col-lg-12 text-center">
            <a href='{{ url("blog-metalmar") }}' class="btn btn-primary btn-style mt-3">{{ tr('Ver Todas as Notícias') }} <span class="fa fa-angle-double-right fw-bold ml-2"></span></a>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- Galeria -->
  @if($galeria->count() > 0)
    <div class="w3l-news" id="news">
      <section id="grids5-block bg-branco" class="py-5">
        <div class="container py-lg-4 py-sm-3">
          <h3 class="title text-center">{{ tr('Galeria de Projetos') }}</h3>
          <div class="row justify-content-center py-3">
            <div class="owl-galeria owl-carousel owl-theme">
              @foreach($galeria as $galerias)
                <div class="item">
                  <div class="col-lg-12 py-3">
                    <div class="grids5-info">
                      <a class="d-block zoom" href="#galleryModal" data-large-src='{{ url("storage/{$galerias->img}") }}' data-toggle="modal">
                        @if($galerias->img)
                          <img src='{{ url("storage/{$galerias->img}") }}' class="img-fluid news-image" alt="{{$galerias->titulo}}">
                        @endif
                      </a>
                      <div class="blog-info">
                        <h4><a class="zoom text-center" href="#galleryModal" data-large-src='{{ url("storage/{$galerias->img}") }}' data-toggle="modal">{{ $galerias->titulo }}</a></h4>
                        <p class="text-justify">{{ $galerias->descricao }}</p>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </section>
    </div>
    <!-- Modal Galeria-->
    <div id="galleryModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header p-0">
            <button type="button" class="close float-right" aria-label="Close" data-dismiss="modal">
              <span aria-hidden="true">&#xD7;</span>
            </button>
          </div>
          <div class="modal-body p-0 text-center bg-alt">
            <img src="" id="galleryImage" class="loaded-image mx-auto img-fluid">
          </div>
        </div>
      </div>
    </div>
  @endif

  <!-- Depoimentos -->
  @if($depoimento->count() > 0)
    <section class="w3l-services-1 py-5">
      <div class="services1 py-lg-5 py-sm-3">
        <div class="container">
          <h3 class="title text-center mb-sm-5 mb-4">{{ tr('Depoimentos de Clientes') }}</h3>
          <div class="row">
            <div class="owl-depoimento owl-carousel owl-theme">
              @foreach($depoimento as $depoimentos)
                <div class="item d-flex justify-content-center">
                  <div class="col-md-8">
                    <div class="depoimento rounded">
                      <div class="d-md-flex d-block align-items-center">
                        <i class="fa fa-quote-left mb-auto px-2"></i>
                        <p class="text-justify">{{ $depoimentos->texto }}</p>
                        <i class="fa fa-quote-right mt-auto px-2"></i>
                      </div>
                      <h4>{{ $depoimentos->nome }}</h4>
                      <h5>{{ $depoimentos->cargo }}</h5>
                      @if($depoimentos->img)
                        <img src='{{ url("storage/{$depoimentos->img}") }}' class="img-fluid" alt="{{$depoimentos->nome}}">
                      @endif
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </section>
  @endif

@endsection