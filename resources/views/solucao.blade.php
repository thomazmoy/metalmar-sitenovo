<!DOCTYPE html>
@extends('template.app')
@section('metatags')
  @if(!empty($siteconfig->taghead))
    {!!$siteconfig->taghead!!}
  @endif
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Soluções MetalMar | {{$siteconfig->nomesite}}</title>
  <link rel="canonical" href='{{ url("solucoes-em-manutencao-industrial-e-naval-em-belem-do-para") }}'>
  <meta property="og:url" content='{{ url("solucoes-em-manutencao-industrial-e-naval-em-belem-do-para") }}'>
  <meta property="og:title" content="Soluções | {{$siteconfig->nomesite}}">
  <meta property="og:image:alt" content="Soluções | {{$siteconfig->nomesite}}">
  <meta name="twitter:url" content='{{ url("solucoes-em-manutencao-industrial-e-naval-em-belem-do-para") }}'>
  <meta name="twitter:title" content="Soluções | {{$siteconfig->nomesite}}">
@endsection
@section('metatagsog')
  @include('template.metatags')
@endsection
@section('content')

  <!--Breadcrumb -->
  <section class="w3l-about-breadcrumb">
    <div class="breadcrumb-bg breadcrumb-bg-contact py-5">
      <div class="container text-center py-lg-5 py-md-3">
        <h2>{{ tr('Soluções MetalMar') }}</h2>
      </div>
    </div>
  </section>

  <!-- Soluções-->
  <section class="w3l-services-1 pt-5">
    <div class="services1 pb-3">
      <div class="container">
        @foreach($solucao as $solucoes)
          @if($solucoes->situacao == '1')
            @if($solucoes->id <= '3')
              <div class="row solucao-es mb-4">
                <div class="col-lg-12">
                  <a href='{{ url("solucoes/{$solucoes->urltitulo}") }}' class="d-block">
                    <div class="row">
                      <div class="col-md-6 m-auto">
                        @if($solucoes->img)
                          <img src='{{ url("storage/{$solucoes->img}") }}' class="img-fluid" alt="{{$solucoes->titulo}}">
                        @endif
                      </div>
                      <div class="col-md-6 sobre-p m-auto">
                        <h3 class="title">{{ $solucoes->titulo }}</h3>
                        <div class="text-justify">
                          {!! $solucoes->descricaodois !!}
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            @endif
          @endif
        @endforeach
      </div>
    </div>
  </section>

  <!-- Soluções-->
  <section class="w3l-services-1 pb-5">
    <div class="services1 py-lg-5 py-sm-3">
      <div class="container">
        <div class="row services1-content w3l-news">
          @foreach($solucao as $solucoes)
            @if($solucoes->situacao == '1')
              @if($solucoes->id > '3')
                <div class="col-lg-4">
                  <div class="grids5-info">
                    <a href='{{ url("solucoes/{$solucoes->urltitulo}") }}' class="d-block zoom">
                      @if($solucoes->img)
                        <img src='{{ url("storage/{$solucoes->img}") }}' class="img-fluid news-image" alt="{{$solucoes->titulo}}">
                      @endif
                    </a>
                    <div class="blog-info text-center">
                      <h4><a href='{{ url("solucoes/{$solucoes->urltitulo}") }}'>{{ $solucoes->titulo }}</a></h4>
                      <p>{!! $solucoes->descricao !!}</p>
                    </div>
                  </div>
                </div>
              @endif
            @endif
          @endforeach
        </div>
      </div>
    </div>
  </section>

@endsection