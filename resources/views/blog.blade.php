<!DOCTYPE html>
@extends('template.app')
@section('metatags')
  @if(!empty($siteconfig->taghead))
    {!!$siteconfig->taghead!!}
  @endif
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Blog MetalMar | {{$siteconfig->nomesite}}</title>
  <link rel="canonical" href='{{ url("blog-metalmar") }}'>
  <meta property="og:url" content='{{ url("blog-metalmar") }}'>
  <meta property="og:title" content="Blog MetalMar | {{$siteconfig->nomesite}}">
  <meta property="og:image:alt" content="Blog MetalMar | {{$siteconfig->nomesite}}">
  <meta name="twitter:url" content='{{ url("blog-metalmar") }}'>
  <meta name="twitter:title" content="Blog MetalMar | {{$siteconfig->nomesite}}">
@endsection
@section('metatagsog')
  @include('template.metatags')
@endsection
@section('content')

  <!--Breadcrumb -->
  <section class="w3l-about-breadcrumb">
    <div class="breadcrumb-bg breadcrumb-bg-contact py-5">
      <div class="container text-center py-lg-5 py-md-3">
        <h2>Blog MetalMar</h2>
      </div>
    </div>
  </section>

  <!-- Blog -->
  <div class="w3l-news" id="news">
    <section id="grids5-block" class="py-5">
      <div class="container py-lg-4 py-sm-3">
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
        <div class="row justify-content-center">
          <div class="col-sm-12">
            {{ $blog->links() }}
          </div>
        </div>
      </div>
    </section>
  </div>

@endsection