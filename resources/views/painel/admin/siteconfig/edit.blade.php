@extends('painel.admin.template.app')
<title>MS System | Configurações do Site</title>
@section('content')

<div class="card">
  <div class="card-header">
    <h5 class="card-title">Configurações do Site</h5>
  </div>
  <div class="card-body">
    <form action="{{ route('siteconfig.update', $siteconfigs) }}" method="POST" enctype="multipart/form-data">
      @method('PUT')
      @include('painel.admin.siteconfig._formularios.form')
    </form>
  </div>
</div>

@endsection