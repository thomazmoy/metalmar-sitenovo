<!DOCTYPE html>
@extends('template.app')
@section('metatags')
  @if(!empty($siteconfig->taghead))
    {!!$siteconfig->taghead!!}
  @endif
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Política de Privacidade | {{$siteconfig->nomesite}}</title>
  <link rel="canonical" href='{{ url("politica-de-privacidade") }}'>
  <meta property="og:url" content='{{ url("politica-de-privacidade") }}'>
  <meta property="og:title" content="Política de Privacidade | {{$siteconfig->nomesite}}">
  <meta property="og:image:alt" content="Política de Privacidade | {{$siteconfig->nomesite}}">
  <meta name="twitter:url" content='{{ url("politica-de-privacidade") }}'>
  <meta name="twitter:title" content="Política de Privacidade | {{$siteconfig->nomesite}}">
@endsection
@section('metatagsog')
  @include('template.metatags')
@endsection
@section('content')

  <!--Breadcrumb -->
  <section class="w3l-about-breadcrumb">
    <div class="breadcrumb-bg breadcrumb-bg-contact py-5">
      <div class="container text-center py-lg-5 py-md-3">
        <h2>{{ tr('Política de Privacidade') }}</h2>
      </div>
    </div>
  </section>

  <!-- Quem Somos-->
  @foreach($privacidade as $privacidades)
    <section class="w3l-features-photo-7 py-5">
      <div class="w3l-features-photo-7_sur py-lg-5 py-sm-3">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-10 sobre-p m-auto">
              <h2 class="fw-bold">{{ $privacidades->titulo }}</h2>
              <div class="sobre-p text-justify">
                {!! $privacidades->texto !!}
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  @endforeach

@endsection