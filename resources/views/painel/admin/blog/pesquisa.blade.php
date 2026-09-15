@extends('painel.admin.template.app')
<title>MS System | Blog - Pesquisa</title>
@section('content')

<div class="card">
  <!-- Card Header -->
  <div class="card-header p-5 sm:p-6 border-b border-ld dark:border-darkborder flex items-center justify-between gap-4">
    <div class="flex items-center gap-4.5 shrink-0">
      <a href="{{ route('blog.index') }}" class="w-11 h-11 rounded-full bg-slate-100 hover:bg-primary hover:text-white text-slate-600 dark:bg-darkgray dark:text-slate-300 dark:hover:bg-primary dark:hover:text-white flex items-center justify-center text-lg shrink-0 transition-all shadow-xs" title="Voltar ao Blog">
        <i class="ti ti-arrow-left"></i>
      </a>
      <div>
        <div class="flex items-center gap-2">
          <h5 class="card-title text-xl font-bold text-dark dark:text-white leading-tight">Resultados da Pesquisa</h5>
          <span class="inline-flex items-center px-2 py-0.5 rounded-md text-[11px] font-semibold bg-primary/10 text-primary border border-primary/20">Blog</span>
        </div>
        <p class="text-xs text-bodytext dark:text-darklink mt-1">
          Exibindo publicações para: <strong class="text-primary font-semibold">"{{ Request('procurar') }}"</strong>
        </p>
      </div>
    </div>
    <div class="flex items-center gap-3 justify-end shrink-0">
      <form action="/procurar" method="get" class="relative flex items-center w-60 sm:w-72">
        <input type="text" name="procurar" class="form-control w-full h-10 pl-3.5 pr-10 rounded-xl text-sm" placeholder="Pesquisar..." value="{{ Request('procurar') }}">
        <button type="submit" class="absolute right-1 w-8 h-8 rounded-lg flex items-center justify-center text-bodytext hover:text-primary dark:text-darklink dark:hover:text-primary hover:bg-slate-100 dark:hover:bg-darkborder/50 transition-colors cursor-pointer" title="Buscar">
          <i class="ti ti-search text-base"></i>
        </button>
      </form>
      <a href="{{ route('blog.index') }}" class="h-10 px-4 rounded-xl btn btn-outline-secondary flex items-center gap-1.5 text-xs font-semibold shadow-xs hover:border-primary hover:text-primary transition-all" title="Ver Todos">
        <i class="ti ti-list text-base"></i>
        <span>Ver Todos</span>
      </a>
      <a href="{{ route('blog.create') }}" class="h-10 px-4 rounded-xl btn btn-primary flex items-center gap-2 text-sm font-semibold shadow-sm hover:shadow-md transition-all">
        <i class="ti ti-plus text-base"></i>
        <span>Novo Post</span>
      </a>
    </div>
  </div>

  <!-- Table Body -->
  <div class="p-0 overflow-x-auto">
    <table class="min-w-full whitespace-nowrap text-sm">
      <thead class="bg-slate-50 dark:bg-darkcard/50 border-y border-slate-200 dark:border-darkborder">
        <tr>
          <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400 text-left">Imagem</th>
          <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400 text-left">Título</th>
          <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400 text-left">Categoria</th>
          <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400 text-left">Data</th>
          <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400 text-center">Ações</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-ld dark:divide-darkborder">
        @forelse($procurar as $blog)
        <tr class="hover:bg-slate-50/70 dark:hover:bg-darkgray/40 transition-colors">
          <td class="px-6 py-4.5">
            @if($blog->img)
              <img src='{{ url("storage/{$blog->img}") }}' class="w-16 h-12 rounded-xl object-cover border border-ld dark:border-darkborder shadow-xs">
            @else
              <div class="w-16 h-12 rounded-xl bg-lightprimary flex items-center justify-center text-primary"><i class="ti ti-photo text-xl"></i></div>
            @endif
          </td>
          <td class="px-6 py-4.5 font-semibold text-dark dark:text-white max-w-xs truncate">{{ $blog->titulo }}</td>
          <td class="px-6 py-4.5 text-bodytext dark:text-darklink">
            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-slate-100 dark:bg-slate-800 text-slate-800 dark:text-slate-200">
              {{ $blog->categoria->nome ?? '-' }}
            </span>
          </td>
          <td class="px-6 py-4.5 text-bodytext dark:text-darklink text-xs">
            <span class="font-medium text-dark dark:text-white block">{{ \Carbon\Carbon::parse($blog->created_at)->locale('pt_BR')->isoFormat('DD MMM YYYY') }}</span>
          </td>
          <td class="px-6 py-4.5">
            <div class="flex items-center justify-center gap-2">
              <a href="{{ route('blog.edit', $blog->id) }}" class="btn-action-edit" title="Editar"><i class="ti ti-pencil"></i></a>
              <button type="button" onclick="openDeleteModal('{{ $blog->id }}')" class="btn-action-delete" title="Excluir"><i class="ti ti-trash"></i></button>
            </div>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="5" class="px-6 py-12 text-center">
            <div class="flex flex-col items-center justify-center">
              <div class="w-16 h-16 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-slate-400 dark:text-slate-500 mb-3">
                <i class="ti ti-search-off text-3xl"></i>
              </div>
              <p class="text-base font-medium text-dark dark:text-white">Nenhum resultado encontrado</p>
              <p class="text-xs text-bodytext dark:text-darklink mt-1">Nenhum artigo corresponde aos termos da busca.</p>
              <a href="{{ route('blog.index') }}" class="btn btn-outline-secondary btn-sm mt-4">
                <i class="ti ti-arrow-left"></i> Voltar ao Blog
              </a>
            </div>
          </td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  @if($procurar->hasPages())
  <div class="px-6 py-4 border-t border-ld dark:border-darkborder">
    {{ $procurar->appends(Request::get('procurar'))->links() }}
  </div>
  @endif
</div>

<!-- Modal Excluir -->
<div id="deleteModal" class="ms-modal hidden">
  <div class="ms-modal-backdrop" onclick="closeDeleteModal()"></div>
  <div class="ms-modal-content max-w-md mx-auto p-6">
    <div class="flex items-center justify-center w-14 h-14 mx-auto mb-4 rounded-full bg-lighterror text-error">
      <i class="ti ti-trash text-2xl"></i>
    </div>
    <h4 class="text-center text-lg font-bold text-dark dark:text-white mb-2">Confirmar exclusão</h4>
    <p class="text-center text-sm text-bodytext dark:text-darklink mb-6">Tem certeza de que deseja remover esta publicação? Esta ação não poderá ser desfeita.</p>
    <form action="{{ route('blog.destroy','blog') }}" method="post" class="flex gap-3 justify-center">
      {{ method_field('delete') }}{{ csrf_field() }}
      <input type="hidden" name="blog_id" id="delete_id" value="">
      <button type="button" onclick="closeDeleteModal()" class="btn btn-outline-secondary flex-1 cursor-pointer">Cancelar</button>
      <button type="submit" class="btn btn-danger flex-1 cursor-pointer"><i class="ti ti-trash"></i> Sim, excluir</button>
    </form>
  </div>
</div>

<script>
function openDeleteModal(id) { 
  document.getElementById('delete_id').value = id; 
  document.getElementById('deleteModal').classList.remove('hidden'); 
  document.body.style.overflow = 'hidden';
}
function closeDeleteModal() { 
  document.getElementById('deleteModal').classList.add('hidden'); 
  document.body.style.overflow = '';
}
document.addEventListener('keydown', function(event) {
  if (event.key === 'Escape') closeDeleteModal();
});
</script>

@endsection