@extends('painel.admin.template.app')
<title>MS System | Traduções do Site</title>
@section('content')

<div class="card mb-6">
  <!-- Card Header -->
  <div class="card-header p-5 sm:p-6 border-b border-ld dark:border-darkborder flex items-center justify-between gap-4">
    <div class="flex items-center gap-4.5 shrink-0">
      <div class="w-12 h-12 rounded-full bg-primary/10 text-primary dark:bg-primary/20 flex items-center justify-center text-2xl shrink-0 shadow-xs border border-primary/15">
        <i class="ti ti-language"></i>
      </div>
      <div>
        <h5 class="card-title text-xl font-bold text-dark dark:text-white leading-tight">Dicionário de Traduções</h5>
        <p class="text-xs text-bodytext dark:text-darklink mt-1">Gerencie os termos em Inglês e Espanhol do site institucional</p>
      </div>
    </div>

    <div class="flex items-center gap-3 justify-end shrink-0">
      <form action="{{ route('admin.traducoes.index') }}" method="GET" class="flex items-center gap-2">
        <div class="relative flex items-center w-64 sm:w-72">
          <input type="text" 
                 name="pesquisar" 
                 class="form-control w-full h-10 pl-3.5 pr-10 rounded-xl text-sm" 
                 placeholder="Buscar termo em Português..." 
                 value="{{ request('pesquisar') }}">
          <button type="submit" class="absolute right-1 w-8 h-8 rounded-lg flex items-center justify-center text-bodytext hover:text-primary dark:text-darklink dark:hover:text-primary hover:bg-slate-100 dark:hover:bg-darkborder/50 transition-colors cursor-pointer" title="Buscar">
            <i class="ti ti-search text-base"></i>
          </button>
        </div>
        @if(request('pesquisar'))
          <a href="{{ route('admin.traducoes.index') }}" class="h-10 px-3 rounded-xl btn btn-outline-secondary flex items-center justify-center shadow-xs hover:border-rose-500 hover:text-rose-500 transition-all" title="Limpar busca">
            <i class="ti ti-x text-base"></i>
          </a>
        @endif
      </form>
    </div>
  </div>

  <form action="{{ route('admin.traducoes.update') }}" method="POST">
    @csrf
    @method('PUT')

    <div class="p-0 overflow-x-auto">
      <table class="min-w-full whitespace-nowrap text-sm text-left">
        <thead class="bg-slate-50 dark:bg-darkcard/50 border-y border-slate-200 dark:border-darkborder">
          <tr>
            <th scope="col" class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400 text-left w-1/3">Termo Original (Português)</th>
            <th scope="col" class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400 text-left w-1/3">Inglês (EN)</th>
            <th scope="col" class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400 text-left w-1/3">Espanhol (ES)</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-ld dark:divide-darkborder text-bodytext dark:text-darklink">
          @forelse($traducoes as $traducao)
          <tr class="hover:bg-slate-50/70 dark:hover:bg-darkgray/40 transition-colors">
            <td class="px-6 py-4.5 align-top whitespace-normal">
              <textarea class="form-control text-sm font-medium bg-lightgray dark:bg-darkgray cursor-not-allowed resize-none opacity-80" 
                        rows="2" 
                        disabled>{{ $traducao->chave_pt }}</textarea>
            </td>
            <td class="px-6 py-4.5 align-top whitespace-normal">
              <textarea name="traducoes[{{ $traducao->id }}][en]" 
                        class="form-control text-sm resize-y" 
                        rows="2" 
                        placeholder="Tradução em Inglês">{{ $traducao->valor_en }}</textarea>
            </td>
            <td class="px-6 py-4.5 align-top whitespace-normal">
              <textarea name="traducoes[{{ $traducao->id }}][es]" 
                        class="form-control text-sm resize-y" 
                        rows="2" 
                        placeholder="Tradução em Espanhol">{{ $traducao->valor_es }}</textarea>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="3" class="px-6 py-12 text-center text-bodytext dark:text-darklink">
              <div class="flex flex-col items-center justify-center gap-2">
                <i class="ti ti-search-off text-3xl opacity-40"></i>
                <p class="font-medium">Nenhuma tradução encontrada.</p>
              </div>
            </td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="card-footer p-6 flex flex-col md:flex-row items-center justify-between gap-4 border-t border-ld dark:border-darkborder">
      <div>
        {{ $traducoes->links() }}
      </div>
      <button type="submit" class="btn btn-primary">
        <i class="ti ti-device-floppy"></i> Salvar Alterações
      </button>
    </div>
  </form>
</div>

@endsection
