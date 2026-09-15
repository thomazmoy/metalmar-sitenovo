<!DOCTYPE html>
@extends('template.app')
@section('metatags')
  @if(!empty($siteconfig->taghead))
    {!!$siteconfig->taghead!!}
  @endif
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Pesquisa | {{$siteconfig->nomesite}}</title>
  <link rel="canonical" href='{{ url("pesquisar") }}'>
  <meta property="og:url" content='{{ url("pesquisar") }}'>
  <meta property="og:title" content="Pesquisa | {{$siteconfig->nomesite}}">
  <meta property="og:image:alt" content="Pesquisa | {{$siteconfig->nomesite}}">
  <meta name="twitter:url" content='{{ url("pesquisar") }}'>
  <meta name="twitter:title" content="Pesquisa | {{$siteconfig->nomesite}}">
@endsection
@section('metatagsog')
  @include('template.metatags')
@endsection
@section('content')

  <!--Breadcrumb -->
  <section class="w3l-about-breadcrumb">
    <div class="breadcrumb-bg breadcrumb-bg-contact py-5">
      <div class="container text-center py-lg-5 py-md-3">
        <h2>{{ tr('Pesquisa') }}</h2>
      </div>
    </div>
  </section>

  <!-- Pesquisa Blog -->
  <div class="w3l-news" id="news">
    <section id="grids5-block bg-branco" class="py-5">
      <div class="container py-lg-4 py-sm-3">
        <div class="row justify-content-center mb-5">
          <div class="col-lg-6 w3l-contact text-center">
            <form method="GET" action="{{ route('pesquisar') }}" class="contact-form d-flex">
              <input type="text" class="form-control" name="pesquisar" id="pesquisar" placeholder="{{ tr('Pesquisar') }}" value="{{ Request('pesquisar')}}" /><br />
              <button class="btn btn-primary px-4" type="submit"><i class="fa fa-search fs-4" aria-hidden="true"></i></button>
            </form>
          </div>
        </div>
        <div class="row">
          @forelse($pesquisar as $blogs)
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
          @empty
            <div class="col-md-6 column pb-4 m-auto text-center">
              <h3 class="fw-bold text-verde pb-2">{{ tr('Conteúdo Não Encontrado') }}</h3>
              <p>{{ tr('Tente mudar os parâmetros de busca.') }}</p>
            </div>
          @endforelse
        </div>
        <div class="row justify-content-center">
          <div class="col-sm-12">
            {{ $pesquisar->appends(Request::get('pesquisar'))->links() }}
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection