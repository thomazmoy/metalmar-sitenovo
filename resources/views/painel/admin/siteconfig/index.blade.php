@extends('painel.admin.template.app')
<title>MS System | Configurações do Site</title>
@section('content')

<div class="card">
  <!-- Card Header -->
  <div class="card-header p-5 sm:p-6 border-b border-ld dark:border-darkborder flex items-center justify-between gap-4">
    <div class="flex items-center gap-4.5 shrink-0">
      <div class="w-12 h-12 rounded-full bg-primary/10 text-primary dark:bg-primary/20 flex items-center justify-center text-2xl shrink-0 shadow-xs border border-primary/15">
        <i class="ti ti-settings"></i>
      </div>
      <div>
        <h5 class="card-title text-xl font-bold text-dark dark:text-white leading-tight">Configurações do Site</h5>
        <p class="text-xs text-bodytext dark:text-darklink mt-1">Gerencie as informações institucionais, contatos e preferências gerais</p>
      </div>
    </div>
    <div class="flex items-center gap-3 justify-end shrink-0">
      @if($siteconfigs->count() < 1)
        <a href="{{ route('siteconfig.create') }}" class="h-10 px-4 rounded-xl btn btn-primary flex items-center gap-2 text-sm font-semibold shadow-sm hover:shadow-md transition-all">
          <i class="ti ti-plus text-base"></i>
          <span>Configurar Site</span>
        </a>
      @endif
    </div>
  </div>

  <!-- Table Body -->
  <div class="p-0 overflow-x-auto">
    <table class="min-w-full whitespace-nowrap text-sm">
      <thead class="bg-slate-50 dark:bg-darkcard/50 border-y border-slate-200 dark:border-darkborder">
        <tr>
          <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400 text-left w-24">Favicon</th>
          <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400 text-left">Nome do Site</th>
          <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400 text-left">E-mail Principal</th>
          <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400 text-left">Celular / WhatsApp</th>
          <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400 text-center w-32">Ações</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-ld dark:divide-darkborder">
        @forelse($siteconfigs as $siteconfig)
        <tr class="hover:bg-slate-50/70 dark:hover:bg-darkgray/40 transition-colors">
          <td class="px-6 py-4.5">
            @if($siteconfig->favicon)
              <img src='{{ url("storage/{$siteconfig->favicon}") }}' class="w-10 h-10 rounded-xl object-contain border border-ld dark:border-darkborder p-1 bg-white dark:bg-darkcard shadow-xs">
            @else
              <div class="w-10 h-10 rounded-xl bg-lightprimary flex items-center justify-center text-primary"><i class="ti ti-world text-lg"></i></div>
            @endif
          </td>
          <td class="px-6 py-4.5 font-semibold text-dark dark:text-white">{{ $siteconfig->nomesite }}</td>
          <td class="px-6 py-4.5 text-bodytext dark:text-darklink">{{ $siteconfig->email ?? '-' }}</td>
          <td class="px-6 py-4.5 text-bodytext dark:text-darklink">{{ $siteconfig->celular ?? '-' }}</td>
          <td class="px-6 py-4.5">
            <div class="flex items-center justify-center gap-2">
              <a href="{{ route('siteconfig.edit', $siteconfig->id) }}" class="btn-action-edit" title="Editar">
                <i class="ti ti-pencil"></i>
              </a>
            </div>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="5" class="px-6 py-12 text-center">
            <div class="flex flex-col items-center justify-center">
              <div class="w-16 h-16 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-slate-400 dark:text-slate-500 mb-3">
                <i class="ti ti-settings-off text-3xl"></i>
              </div>
              <p class="text-base font-medium text-dark dark:text-white">Nenhuma configuração registrada</p>
              <p class="text-xs text-bodytext dark:text-darklink mt-1">Clique no botão acima para adicionar a configuração inicial do site.</p>
            </div>
          </td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

@endsection