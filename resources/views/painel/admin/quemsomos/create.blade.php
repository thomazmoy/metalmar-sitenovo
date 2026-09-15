@extends('painel.admin.template.app')
<title>MS System | Quem Somos - Adicionar</title>
@section('content')

<div class="card">
  <!-- Card Header -->
  <div class="card-header p-5 sm:p-6 border-b border-ld dark:border-darkborder flex items-center justify-between gap-4">
    <div class="flex items-center gap-4.5 shrink-0">
      <div class="w-12 h-12 rounded-full bg-primary/10 text-primary dark:bg-primary/20 flex items-center justify-center text-2xl shrink-0 shadow-xs border border-primary/15">
        <i class="ti ti-info-circle"></i>
      </div>
      <div>
        <h5 class="card-title text-xl font-bold text-dark dark:text-white leading-tight">Adicionar Quem Somos</h5>
        <p class="text-xs text-bodytext dark:text-darklink mt-1">Cadastre o conteúdo institucional e traduções</p>
      </div>
    </div>
  </div>
  <div class="card-body">
    <form action="{{ route('quemsomos.store') }}" method="POST" enctype="multipart/form-data">
      @include('painel.admin.quemsomos._formularios.form')
    </form>
  </div>
</div>

@endsection