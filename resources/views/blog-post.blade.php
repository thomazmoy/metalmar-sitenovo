<!DOCTYPE html>
@extends('template.app-post')
@section('metatags')
  @if(!empty($siteconfig->taghead))
    {!!$siteconfig->taghead!!}
  @endif
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  @if(!empty($siteconfig->facebookid))
    <meta property="fb:app_id" content="{{$siteconfig->facebookid}}">
  @endif
  <link rel="canonical" href='{{ url("blog/{$post->urltitulo}") }}'>
  <meta property="og:url" content='{{ url("blog/{$post->urltitulo}") }}'>
  <meta name="twitter:url" content='{{ url("blog/{$post->urltitulo}") }}'>
@endsection
@section('metatagsog')
  @include('template.metatags-post')
@endsection
@section('content')

  <!--Breadcrumb -->
  <section class="w3l-about-breadcrumb">
    <div class="breadcrumb-bg breadcrumb-bg-contact py-5">
      <div class="container text-center py-lg-5 py-md-3">
        <h1 class="text-white fw-bold">{{ $post->titulo }}</h1>
      </div>
    </div>
  </section>

  <!-- Post -->
  <div class="w3l-news" id="news">
    <section id="grids5-block" class="bg-branco py-5">
      <div class="container py-lg-4 py-sm-3">
        <div class="row justify-content-between">
          <div class="col-lg-8 bg-branco rounded box-shadow-1 p-4">
            @if($post->img)
              <img src='{{ url("storage/{$post->img}") }}' class="img-fluid d-block w-100 rounded text-center" alt="{{$post->titulo}}">
            @endif
            <div class="row my-3 justify-content-between">
              <div class="col-md-6">
                <p class="fw-bold text-amarelo"><span class="fa fa-clock-o mr-2"></span>{{strftime('%d %b %Y', strtotime($post->created_at))}}</p>
              </div>
              <div class="col-md-6 text-md-right">
                <p class="fw-bold text-azul-2"><span class="fa fa-tags mr-2"></span>{{ $post->categoria->nome }}</p>
              </div>
            </div>
            <div class="sobre-p text-justify mt-3">
              {!! $post->texto !!}
            </div>
            <div class="mt-4">
              {!!$post->iframe!!}
            </div>
            <div class="d-grid justify-content-center my-4">
              <h4 class="fw-bold py-2">{{ tr('Compartilhe') }}</h4>
              <div class="a2a_kit a2a_kit_size_32 a2a_default_style d-flex justify-content-lg-start justify-content-center">
                <a class="a2a_button_facebook"></a>
                <a class="a2a_button_twitter"></a>
                <a class="a2a_button_whatsapp"></a>
                <a class="a2a_button_telegram"></a>
              </div>
              <script>
                var a2a_config = a2a_config || {};
                a2a_config.locale = "pt-BR";
              </script>
              <script async src="https://static.addtoany.com/menu/page.js"></script>
            </div>
          </div>
          <div class="col-lg-4 p-4">
            <ul class="unlisted w3l-contact pb-4">
              <li class="border-bottom pb-3">
                <h3 class="fw-bold pb-2">{{ tr('Pesquisar') }}</h3>
                <form method="GET" action="{{ route('pesquisar') }}" class="contact-form d-flex">
                  <input type="text" class="form-control" name="pesquisar" id="pesquisar" placeholder="{{ tr('Digite aqui') }}" value="{{ Request('pesquisar')}}"><br>
                  <button class="btn btn-primary" type="submit"><i class="fa fa-search fs-4" aria-hidden="true"></i></button>
                </form>
              </li>
            </ul>
            <h3 class="fw-bold pb-2">{{ tr('Posts Recentes') }}</h3>
            <ul class="unlisted">
              @foreach($blog as $blogs)
                @if($blogs->id != $post->id)
                  <li class="media border-bottom py-3">
                    <a href='{{ url("blog/{$blogs->urltitulo}") }}' class="d-flex align-items-center">
                      @if($blogs->img)
                        <img src='{{ url("storage/{$blogs->img}") }}' class="img-fluid rounded mr-3" alt='{{ $blogs->titulo }}'>
                      @endif
                      <div class="d-block">
                        <h6 class="text-primary fw-bold pb-2">{{ $blogs->titulo }}</h6>
                        <h6 class="text-amarelo fw-bold"><span class="fa fa-clock-o mr-2"></span>{{strftime('%d %b %Y', strtotime($blogs->created_at))}}</h6>
                      </div>
                    </a>
                  </li>
                @endif
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </section>
  </div>

@endsection