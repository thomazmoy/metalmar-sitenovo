@extends('painel.admin.template.app')
<title>MS System | Detalhes do Contato</title>
@section('content')

@php
  $situacao = $contatos->situacao ?? 'Recebido';
  $badgeClass = match($situacao) {
    'Recebido' => 'bg-blue-100 text-blue-800 dark:bg-blue-900/40 dark:text-blue-300 border border-blue-200 dark:border-blue-800',
    'Em Atendimento' => 'bg-amber-100 text-amber-800 dark:bg-amber-900/40 dark:text-amber-300 border border-amber-200 dark:border-amber-800',
    'Finalizado' => 'bg-emerald-100 text-emerald-800 dark:bg-emerald-900/40 dark:text-emerald-300 border border-emerald-200 dark:border-emerald-800',
    'Cancelado' => 'bg-rose-100 text-rose-800 dark:bg-rose-900/40 dark:text-rose-300 border border-rose-200 dark:border-rose-800',
    default => 'bg-slate-100 text-slate-800 dark:bg-slate-800 dark:text-slate-300 border border-slate-200 dark:border-slate-700'
  };
  $initials = mb_strtoupper(mb_substr($contatos->nome ?? 'C', 0, 2));
  $cleanPhone = preg_replace('/\D/', '', $contatos->telefone ?? '');
@endphp

<div class="card max-w-4xl mx-auto">
  <!-- Card Header -->
  <div class="card-header flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
    <div class="flex items-center gap-3">
      <div class="h-11 w-11 rounded-full bg-primary/10 text-primary flex items-center justify-center font-bold text-base border border-primary/20 shrink-0">
        {{ $initials }}
      </div>
      <div>
        <div class="flex items-center gap-2">
          <h5 class="card-title text-xl font-bold">{{ $contatos->nome }}</h5>
          <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold {{ $badgeClass }}">
            {{ $situacao }}
          </span>
        </div>
        <p class="text-xs text-bodytext dark:text-darklink mt-0.5">
          Recebido em {{ strftime('%d de %B de %Y às %H:%M', strtotime($contatos->created_at)) }}
        </p>
      </div>
    </div>

    <div class="flex items-center gap-2">
      <a href="{{ route('contato.edit', $contatos->id) }}" class="btn btn-primary btn-sm">
        <i class="ti ti-pencil"></i> Editar
      </a>
      <a href="{{ route('contato.index') }}" class="btn btn-outline-secondary btn-sm">
        <i class="ti ti-arrow-left"></i> Voltar
      </a>
    </div>
  </div>

  <!-- Card Body -->
  <div class="card-body space-y-6">
    <!-- Grid de Informações -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      <!-- E-mail -->
      <div class="bg-slate-50 dark:bg-darkgray/30 p-4 rounded-xl border border-slate-100 dark:border-slate-800">
        <span class="text-xs font-medium text-bodytext dark:text-darklink flex items-center gap-1.5 mb-1">
          <i class="ti ti-mail text-primary"></i> E-mail de Contato
        </span>
        <a href="mailto:{{ $contatos->email }}" class="text-base font-semibold text-dark dark:text-white hover:text-primary transition-colors break-all">
          {{ $contatos->email }}
        </a>
      </div>

      <!-- Telefone -->
      <div class="bg-slate-50 dark:bg-darkgray/30 p-4 rounded-xl border border-slate-100 dark:border-slate-800">
        <span class="text-xs font-medium text-bodytext dark:text-darklink flex items-center gap-1.5 mb-1">
          <i class="ti ti-phone text-primary"></i> Telefone / WhatsApp
        </span>
        <div class="flex items-center justify-between">
          <span class="text-base font-semibold text-dark dark:text-white">
            {{ $contatos->telefone ?: 'Não informado' }}
          </span>
          @if($cleanPhone)
            <a href="https://wa.me/{{ (str_starts_with($cleanPhone, '55') ? '' : '55') . $cleanPhone }}" target="_blank" class="text-xs text-emerald-600 dark:text-emerald-400 font-semibold hover:underline flex items-center gap-1">
              <i class="ti ti-brand-whatsapp"></i> Conversar
            </a>
          @endif
        </div>
      </div>
    </div>

    <!-- Assunto -->
    <div class="bg-slate-50 dark:bg-darkgray/30 p-4 rounded-xl border border-slate-100 dark:border-slate-800">
      <span class="text-xs font-medium text-bodytext dark:text-darklink flex items-center gap-1.5 mb-1">
        <i class="ti ti-file-text text-primary"></i> Assunto da Mensagem
      </span>
      <h4 class="text-base font-bold text-dark dark:text-white">{{ $contatos->assunto ?: 'Sem assunto' }}</h4>
    </div>

    <!-- Mensagem -->
    <div>
      <label class="text-xs font-semibold text-bodytext dark:text-darklink uppercase tracking-wider block mb-2">
        Conteúdo da Mensagem
      </label>
      <div class="bg-slate-50 dark:bg-darkgray/50 p-5 rounded-xl border border-slate-200/80 dark:border-slate-800 text-dark dark:text-slate-200 whitespace-pre-wrap leading-relaxed min-h-[160px] text-sm">
        {{ $contatos->mensagem ?: 'Nenhuma mensagem preenchida.' }}
      </div>
    </div>

    <!-- Ações de Resposta -->
    <div class="flex flex-wrap items-center justify-between gap-4 pt-6 border-t border-ld dark:border-darkborder">
      <a href="mailto:{{ $contatos->email }}?subject={{ urlencode('Re: ' . ($contatos->assunto ?: 'Contato')) }}" class="btn btn-outline-secondary">
        <i class="ti ti-send"></i> Responder por E-mail
      </a>

      <div class="flex items-center gap-2">
        <a href="{{ route('contato.edit', $contatos->id) }}" class="btn btn-primary">
          <i class="ti ti-pencil"></i> Editar Contato
        </a>
      </div>
    </div>
  </div>
</div>

@endsection