<title>{{$post->titulo}}</title>
<meta name="description" content="{{$post->descricao}}">
<meta name="keywords" content="{{$post->palavraschave}}">
<meta name="author" content="Moy Station">
<meta property="og:locale" content="pt_BR">
<meta property="og:type" content="article">
<meta property="og:title" content="{{$post->titulo}}">
<meta property="og:description" content="{{$post->descricao}}">
@if($post->img)
  <meta property="og:image" content='{{ url("storage/{$post->img}") }}'>
  <meta property="og:image:alt" content="{{$post->titulo}}">
  <meta property="og:image:type" content="image/webp">
  <meta property="og:image:width" content="800">
  <meta property="og:image:height" content="600">
  <meta name="twitter:image" content='{{ url("storage/{$post->img}") }}'>
@endif
@if(!empty($post->iframe))
  <meta property="og:video" content="{{$post->iframe}}">
  <meta property="og:video:type" content="application/x-shockwave-flash">
  <meta property="og:video:width" content="600">
  <meta property="og:video:height" content="300">
  <meta name="twitter:player" content="{{$post->iframe}}">
@endif
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="{{$post->titulo}}">
<meta name="twitter:description" content="{{$post->descricao}}">
<meta property="og:site_name" content="{{$siteconfig->nomesite}}">
@if($siteconfig->favicon)
  <link rel="icon" type="image/webp" href='{{ url("storage/{$siteconfig->favicon}") }}'>
  <link rel="shortcut icon" href='{{ url("storage/{$siteconfig->favicon}") }}'>
  <link rel="apple-touch-icon" sizes="180x180" href='{{ url("storage/{$siteconfig->favicon}") }}'>
  <meta name="msapplication-TileImage" content='{{ url("storage/{$siteconfig->favicon}") }}'>
@endif