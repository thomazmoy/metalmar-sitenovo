<meta name="description" content="{{$siteconfig->descricao}}">
<meta name="keywords" content="{{$siteconfig->palavraschave}}">
<meta name="author" content="Moy Station">
<meta property="og:locale" content="pt_BR">
<meta property="og:site_name" content="{{$siteconfig->nomesite}}">
<meta property="og:type" content="article">
<meta property="og:description" content="{{$siteconfig->descricao}}">
<meta property="og:image" content='{{ url("assets/images/imgseo.webp") }}'>
<meta property="og:image:type" content="image/webp">
<meta property="og:image:width" content="800">
<meta property="og:image:height" content="600">
<meta name="twitter:image" content='{{ url("assets/images/imgseo.webp") }}'>
<meta name="twitter:card" content="summary">
<meta name="twitter:description" content="{{$siteconfig->descricao}}">
@if($siteconfig->favicon)
  <link rel="icon" type="image/webp" href='{{ url("storage/{$siteconfig->favicon}") }}'>
  <link rel="shortcut icon" href='{{ url("storage/{$siteconfig->favicon}") }}'>
  <link rel="apple-touch-icon" sizes="180x180" href='{{ url("storage/{$siteconfig->favicon}") }}'>
  <meta name="msapplication-TileImage" content='{{ url("storage/{$siteconfig->favicon}") }}'>
@endif
@if(!empty($siteconfig->facebookid))
  <meta property="fb:app_id" content="{{$siteconfig->facebookid}}">
@endif