@extends('painel.admin.template.app')
<title>MS System | Blog - Adicionar</title>
@section('content')

<div class="card">
  <div class="card-header">
    <h5 class="card-title">Adicionar Blog</h5>
    <a href="{{ route('blog.index') }}" class="btn btn-outline-secondary"><i class="ti ti-arrow-left"></i> Voltar</a>
  </div>
  <div class="card-body">
    <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
      @include('painel.admin.blog._formularios.form')
    </form>
  </div>
</div>

@endsection