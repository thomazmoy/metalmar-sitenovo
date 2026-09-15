<!DOCTYPE html>
@extends('template.app')
@section('metatags')
  @if(!empty($siteconfig->taghead))
    {!!$siteconfig->taghead!!}
  @endif
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Quem Somos | {{$siteconfig->nomesite}}</title>
  <link rel="canonical" href='{{ url("metalmar-manutencao-industrial-e-naval-em-belem-do-para") }}'>
  <meta property="og:url" content='{{ url("metalmar-manutencao-industrial-e-naval-em-belem-do-para") }}'>
  <meta property="og:title" content="Quem Somos | {{$siteconfig->nomesite}}">
  <meta property="og:image:alt" content="Quem Somos | {{$siteconfig->nomesite}}">
  <meta name="twitter:url" content='{{ url("metalmar-manutencao-industrial-e-naval-em-belem-do-para") }}'>
  <meta name="twitter:title" content="Quem Somos | {{$siteconfig->nomesite}}">
@endsection
@section('metatagsog')
  @include('template.metatags')
@endsection
@section('content')

  <!--Breadcrumb -->
  <section class="w3l-about-breadcrumb">
    <div class="breadcrumb-bg breadcrumb-bg-contact py-5">
      <div class="container text-center py-lg-5 py-md-3">
        <h2>{{ tr('Quem Somos') }}</h2>
      </div>
    </div>
  </section>

  <!-- Quem Somos-->
  <section class="w3l-features-photo-7 py-5">
    <div class="w3l-features-photo-7_sur py-lg-5 py-sm-3">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 m-auto">
            @if($quemsomos->imgtres)
              <img src='{{ url("storage/{$quemsomos->imgtres}") }}' class="img-fluid" alt="{{$quemsomos->titulodois}}">
            @endif
          </div>
          <div class="col-lg-6 sobre-p m-auto">
            <h2 class="fw-bold">{{ $quemsomos->titulodois }}</h2>
            <div class="text-justify">
              {!! $quemsomos->textodois !!}
            </div>
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
          <div class="col-lg-6 mb-4 m-lg-auto order-lg-last">
            @if(empty($quemsomos->iframevideo))
              @if($quemsomos->imgtres)
                <img src='{{ url("storage/{$quemsomos->imgdois}") }}' class="img-fluid" alt="{{$quemsomos->titulotres}}">
              @endif
            @else
              {!!$quemsomos->iframevideo!!}
            @endif
          </div>
          <div class="col-lg-6 sobre-p mb-4 m-lg-auto">
            <h2 class="fw-bold">{{ $quemsomos->titulotres }}</h2>
            <div class="text-justify">
              {!! $quemsomos->textotres !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

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