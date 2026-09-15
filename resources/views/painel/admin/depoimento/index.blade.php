@extends('painel.admin.template.app')
<title>MS System | Depoimentos</title>
@section('content')

<div class="card">
  <!-- Card Header -->
  <div class="card-header p-5 sm:p-6 border-b border-ld dark:border-darkborder flex items-center justify-between gap-4">
    <div class="flex items-center gap-4.5 shrink-0">
      <div class="w-12 h-12 rounded-full bg-primary/10 text-primary dark:bg-primary/20 flex items-center justify-center text-2xl shrink-0 shadow-xs border border-primary/15">
        <i class="ti ti-message-2"></i>
      </div>
      <div>
        <h5 class="card-title text-xl font-bold text-dark dark:text-white leading-tight">Depoimentos</h5>
        <p class="text-xs text-bodytext dark:text-darklink mt-1">Gerencie os depoimentos e avaliações de clientes</p>
      </div>
    </div>
    <div class="flex items-center gap-3 justify-end shrink-0">
      <a href="{{ route('depoimento.create') }}" class="h-10 px-4 rounded-xl btn btn-primary flex items-center gap-2 text-sm font-semibold shadow-sm hover:shadow-md transition-all">
        <i class="ti ti-plus text-base"></i>
        <span>Novo Depoimento</span>
      </a>
    </div>
  </div>

  <!-- Table Body -->
  <div class="p-0 overflow-x-auto">
    <table class="min-w-full whitespace-nowrap text-sm">
      <thead class="bg-slate-50 dark:bg-darkcard/50 border-y border-slate-200 dark:border-darkborder">
        <tr>
          <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400 text-left">Foto</th>
          <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400 text-left">Nome</th>
          <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400 text-left">Cargo / Empresa</th>
          <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400 text-left">Visível</th>
          <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400 text-center">Ações</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-ld dark:divide-darkborder">
        @forelse($depoimentos as $depoimento)
        <tr class="hover:bg-slate-50/70 dark:hover:bg-darkgray/40 transition-colors">
          <td class="px-6 py-4.5">
            @if($depoimento->img ?? '')
              <img src="{{ url('storage/'.$depoimento->img) }}" class="w-12 h-12 rounded-full object-cover border border-ld dark:border-darkborder shadow-xs">
            @else
              <div class="w-12 h-12 rounded-full bg-lightprimary flex items-center justify-center text-primary"><i class="ti ti-user text-lg"></i></div>
            @endif
          </td>
          <td class="px-6 py-4.5 font-semibold text-dark dark:text-white">{{ $depoimento->nome }}</td>
          <td class="px-6 py-4.5 text-bodytext dark:text-darklink">{{ $depoimento->cargo ?? '-' }}</td>
          <td class="px-6 py-4.5">
            <label class="relative inline-flex items-center cursor-pointer">
              <input type="checkbox" class="sr-only peer toggle-situacao-index" data-model="Depoimento" data-id="{{ $depoimento->id }}" {{ $depoimento->situacao == 1 ? 'checked' : '' }}>
              <div class="w-10 h-5 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:bg-primary peer-checked:after:translate-x-5 after:content-[''] after:absolute after:top-0.5 after:left-0.5 after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all"></div>
            </label>
          </td>
          <td class="px-6 py-4.5">
            <div class="flex items-center justify-center gap-2">
              <a href="{{ route('depoimento.edit', $depoimento->id) }}" class="btn-action-edit" title="Editar">
                <i class="ti ti-pencil"></i>
              </a>
              <button type="button" onclick="openDeleteModal('{{ $depoimento->id }}')" class="btn-action-delete" title="Excluir">
                <i class="ti ti-trash"></i>
              </button>
            </div>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="5" class="px-6 py-12 text-center">
            <div class="flex flex-col items-center justify-center">
              <div class="w-16 h-16 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-slate-400 dark:text-slate-500 mb-3">
                <i class="ti ti-message-off text-3xl"></i>
              </div>
              <p class="text-base font-medium text-dark dark:text-white">Nenhum depoimento cadastrado</p>
              <p class="text-xs text-bodytext dark:text-darklink mt-1">Clique no botão acima para adicionar um novo depoimento.</p>
            </div>
          </td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  @if($depoimentos->hasPages())
  <div class="px-6 py-4 border-t border-ld dark:border-darkborder">
    {{ $depoimentos->links() }}
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
    <p class="text-center text-sm text-bodytext dark:text-darklink mb-6">Tem certeza de que deseja remover este depoimento? Esta ação não poderá ser desfeita.</p>
    <form action="{{ route('depoimento.destroy','depoimento') }}" method="post" class="flex gap-3 justify-center">
      {{ method_field('delete') }}{{ csrf_field() }}
      <input type="hidden" name="depoimento_id" id="delete_id" value="">
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