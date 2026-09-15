@extends('painel.admin.template.app')
<title>MS System | Política de Privacidade</title>
@section('content')

<div class="card">
  <!-- Card Header -->
  <div class="card-header p-5 sm:p-6 border-b border-ld dark:border-darkborder flex items-center justify-between gap-4">
    <div class="flex items-center gap-4.5 shrink-0">
      <div class="w-12 h-12 rounded-full bg-primary/10 text-primary dark:bg-primary/20 flex items-center justify-center text-2xl shrink-0 shadow-xs border border-primary/15">
        <i class="ti ti-shield-check"></i>
      </div>
      <div>
        <h5 class="card-title text-xl font-bold text-dark dark:text-white leading-tight">Política de Privacidade</h5>
        <p class="text-xs text-bodytext dark:text-darklink mt-1">Gerencie os termos de privacidade, uso de dados e conformidade legal</p>
      </div>
    </div>
  </div>
  <div class="card-body">
    <form action="{{ route('privacidade.update', $privacidades) }}" method="POST" enctype="multipart/form-data">
      @method('PUT')
      @include('painel.admin.privacidade._formularios.form')
    </form>
  </div>
</div>

@endsection