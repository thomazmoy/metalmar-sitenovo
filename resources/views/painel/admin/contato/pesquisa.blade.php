@extends('painel.admin.template.app')
<title>MS System | Contatos - Pesquisa</title>
@section('content')

<div class="card">
  <!-- Card Header with Title, Search & Actions -->
  <div class="card-header p-5 sm:p-6 border-b border-ld dark:border-darkborder flex items-center justify-between gap-4">
    <div class="flex items-center gap-4.5 shrink-0">
      <a href="{{ route('contato.index') }}" class="w-11 h-11 rounded-full bg-slate-100 hover:bg-primary hover:text-white text-slate-600 dark:bg-darkgray dark:text-slate-300 dark:hover:bg-primary dark:hover:text-white flex items-center justify-center text-lg shrink-0 transition-all shadow-xs" title="Voltar para todos os contatos">
        <i class="ti ti-arrow-left"></i>
      </a>
      <div>
        <div class="flex items-center gap-2">
          <h5 class="card-title text-xl font-bold text-dark dark:text-white leading-tight">Resultados da Pesquisa</h5>
          <span class="inline-flex items-center px-2 py-0.5 rounded-md text-[11px] font-semibold bg-primary/10 text-primary border border-primary/20">Contatos</span>
        </div>
        <p class="text-xs text-bodytext dark:text-darklink mt-1">
          Exibindo resultados para: <strong class="text-primary font-semibold">"{{ Request('search') }}"</strong>
        </p>
      </div>
    </div>
    
    <div class="flex items-center gap-3 justify-end shrink-0">
      <form action="{{ route('search') }}" method="get" class="relative flex items-center w-60 sm:w-72">
        <input type="text" name="search" class="form-control w-full h-10 pl-3.5 pr-10 rounded-xl text-sm" placeholder="Pesquisar..." value="{{ Request('search') }}">
        <button type="submit" class="absolute right-1 w-8 h-8 rounded-lg flex items-center justify-center text-bodytext hover:text-primary dark:text-darklink dark:hover:text-primary hover:bg-slate-100 dark:hover:bg-darkborder/50 transition-colors cursor-pointer" title="Buscar">
          <i class="ti ti-search text-base"></i>
        </button>
      </form>

      <a href="{{ route('contato.index') }}" class="h-10 px-4 rounded-xl btn btn-outline-secondary flex items-center gap-1.5 text-xs font-semibold shadow-xs hover:border-primary hover:text-primary transition-all" title="Ver Todos">
        <i class="ti ti-list text-base"></i>
        <span>Ver Todos</span>
      </a>

      <a href="{{ route('contato.create') }}" class="h-10 px-4 rounded-xl btn btn-primary flex items-center gap-2 text-sm font-semibold shadow-sm hover:shadow-md transition-all" title="Adicionar Contato Manual">
        <i class="ti ti-plus text-base"></i>
        <span>Novo</span>
      </a>
    </div>
  </div>

  <!-- Table Body -->
  <div class="p-0 overflow-x-auto">
    <table class="min-w-full whitespace-nowrap text-sm">
      <thead class="bg-slate-50 dark:bg-darkcard/50 border-y border-slate-200 dark:border-darkborder">
        <tr>
          <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400 text-left">Nome</th>
          <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400 text-left">Telefone</th>
          <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400 text-left">Situação</th>
          <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400 text-left">Data</th>
          <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400 text-center">Ações</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-ld dark:divide-darkborder">
        @forelse($search as $contato)
        @php
          $situacao = !empty($contato->situacao) ? trim($contato->situacao) : 'Recebido';
          $badgeClass = match($situacao) {
            'Recebido' => 'badge-recebido',
            'Em Atendimento' => 'badge-atendimento',
            'Finalizado' => 'badge-finalizado',
            'Cancelado' => 'badge-cancelado',
            default => 'badge-default'
          };
        @endphp
        <tr class="hover:bg-slate-50/70 dark:hover:bg-darkgray/40 transition-colors">
          <!-- Nome -->
          <td class="px-6 py-4.5 font-semibold text-dark dark:text-white">
            {{ $contato->nome }}
          </td>

          <!-- Telefone -->
          <td class="px-6 py-4.5 text-bodytext dark:text-darklink">
            @if($contato->telefone)
              <a href="tel:{{ preg_replace('/\D/', '', $contato->telefone) }}" class="hover:text-primary transition-colors flex items-center gap-1.5">
                <i class="ti ti-phone text-xs text-bodytext/70"></i> {{ $contato->telefone }}
              </a>
            @else
              <span class="text-slate-400 dark:text-slate-600">-</span>
            @endif
          </td>

          <!-- Situação -->
          <td class="px-6 py-4.5">
            <span class="badge-status {{ $badgeClass }}">
              {{ $situacao }}
            </span>
          </td>

          <!-- Data -->
          <td class="px-6 py-4.5 text-bodytext dark:text-darklink text-xs">
            <span class="font-medium text-dark dark:text-white block">{{ strftime('%d %b %Y', strtotime($contato->created_at)) }}</span>
            <span class="text-bodytext/70 text-[11px]">{{ date('H:i', strtotime($contato->created_at)) }}</span>
          </td>

          <!-- Ações -->
          <td class="px-6 py-4.5">
            <div class="flex items-center justify-center gap-2">
              <!-- Botão Visualizar Modal -->
              <button type="button" 
                      data-contato="{{ base64_encode(json_encode([
                        'id' => $contato->id,
                        'nome' => $contato->nome,
                        'email' => $contato->email,
                        'telefone' => $contato->telefone,
                        'assunto' => $contato->assunto,
                        'mensagem' => $contato->mensagem,
                        'situacao' => $situacao,
                        'data' => strftime('%d/%m/%Y às %H:%M', strtotime($contato->created_at)),
                        'edit_url' => route('contato.edit', $contato->id)
                      ])) }}"
                      onclick="openViewModal(this)"
                      class="btn-action-view" 
                      title="Visualizar Mensagem">
                <i class="ti ti-eye"></i>
              </button>

              <!-- Botão Editar -->
              <a href="{{ route('contato.edit', $contato->id) }}" 
                 class="btn-action-edit" 
                 title="Editar Contato">
                <i class="ti ti-pencil"></i>
              </a>

              <!-- Botão Excluir -->
              <button type="button" 
                      onclick="openDeleteModal('{{ $contato->id }}')" 
                      class="btn-action-delete" 
                      title="Excluir">
                <i class="ti ti-trash"></i>
              </button>
            </div>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="5" class="px-4 py-12 text-center">
            <div class="flex flex-col items-center justify-center">
              <div class="w-16 h-16 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-slate-400 dark:text-slate-500 mb-3">
                <i class="ti ti-search-off text-3xl"></i>
              </div>
              <p class="text-base font-medium text-dark dark:text-white">Nenhum resultado encontrado</p>
              <p class="text-xs text-bodytext dark:text-darklink mt-1">Nenhum contato corresponde ao termo pesquisado.</p>
              <a href="{{ route('contato.index') }}" class="btn btn-outline-secondary btn-sm mt-4">
                <i class="ti ti-arrow-left"></i> Voltar aos contatos
              </a>
            </div>
          </td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  @if($search->hasPages())
  <div class="px-4 py-3 border-t border-ld dark:border-darkborder">
    {{ $search->appends(Request::all())->links() }}
  </div>
  @endif
</div>

<!-- ======================================================== -->
<!-- MODAL DE VISUALIZAÇÃO DE CONTATO                         -->
<!-- ======================================================== -->
<div id="viewContatoModal" class="ms-modal hidden">
  <!-- Backdrop -->
  <div class="ms-modal-backdrop" onclick="closeViewModal()"></div>

  <!-- Modal Container -->
  <div class="ms-modal-content max-w-2xl mx-auto">
    
    <!-- Modal Header -->
    <div class="px-6 py-4.5 border-b border-ld dark:border-darkborder flex items-center justify-between bg-slate-50/70 dark:bg-darkgray/40">
      <div class="flex items-center gap-3">
        <div id="modal-view-avatar" class="h-10 w-10 rounded-full bg-primary/10 text-primary flex items-center justify-center font-bold text-sm border border-primary/20 shrink-0">
          <span id="modal-view-initials">CO</span>
        </div>
        <div>
          <h4 id="modal-view-nome" class="text-base font-bold text-dark dark:text-white leading-tight">Nome do Contato</h4>
          <span id="modal-view-data" class="text-xs text-bodytext dark:text-darklink">Data</span>
        </div>
      </div>
      
      <div class="flex items-center gap-2">
        <span id="modal-view-situacao" class="badge-status badge-recebido">Recebido</span>
        <button type="button" onclick="closeViewModal()" class="h-8 w-8 rounded-lg flex items-center justify-center text-bodytext dark:text-darklink hover:bg-slate-200 dark:hover:bg-slate-700 transition-colors cursor-pointer">
          <i class="ti ti-x text-lg"></i>
        </button>
      </div>
    </div>

    <!-- Modal Body -->
    <div class="p-6 space-y-4 max-h-[calc(85vh-160px)] overflow-y-auto">
      <!-- Grid de Contato -->
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <!-- E-mail -->
        <div class="bg-slate-50 dark:bg-darkgray/30 p-3.5 rounded-xl border border-slate-100 dark:border-slate-800">
          <span class="text-xs font-medium text-bodytext dark:text-darklink flex items-center gap-1.5 mb-1">
            <i class="ti ti-mail text-primary"></i> E-mail
          </span>
          <a id="modal-view-email-link" href="#" class="text-sm font-semibold text-dark dark:text-white hover:text-primary dark:hover:text-primary break-all transition-colors">
            <span id="modal-view-email">-</span>
          </a>
        </div>

        <!-- Telefone -->
        <div class="bg-slate-50 dark:bg-darkgray/30 p-3.5 rounded-xl border border-slate-100 dark:border-slate-800">
          <span class="text-xs font-medium text-bodytext dark:text-darklink flex items-center gap-1.5 mb-1">
            <i class="ti ti-phone text-primary"></i> Telefone
          </span>
          <div class="flex items-center justify-between">
            <span id="modal-view-telefone" class="text-sm font-semibold text-dark dark:text-white">-</span>
            <a id="modal-view-phone-link" href="#" target="_blank" class="hidden text-xs text-emerald-600 dark:text-emerald-400 font-semibold hover:underline flex items-center gap-1">
              <i class="ti ti-brand-whatsapp"></i> WhatsApp
            </a>
          </div>
        </div>
      </div>

      <!-- Assunto -->
      <div class="bg-slate-50 dark:bg-darkgray/30 p-3.5 rounded-xl border border-slate-100 dark:border-slate-800">
        <span class="text-xs font-medium text-bodytext dark:text-darklink flex items-center gap-1.5 mb-1">
          <i class="ti ti-file-text text-primary"></i> Assunto
        </span>
        <h5 id="modal-view-assunto" class="text-sm font-bold text-dark dark:text-white">-</h5>
      </div>

      <!-- Mensagem -->
      <div>
        <label class="text-xs font-semibold text-bodytext dark:text-darklink uppercase tracking-wider block mb-2">
          Mensagem do Cliente
        </label>
        <div class="bg-slate-50 dark:bg-darkgray/50 p-4 rounded-xl border border-slate-200/80 dark:border-slate-800 text-sm text-dark dark:text-slate-200 whitespace-pre-wrap leading-relaxed min-h-[120px]" id="modal-view-mensagem">
          -
        </div>
      </div>
    </div>

    <!-- Modal Footer -->
    <div class="px-6 py-4 border-t border-ld dark:border-darkborder bg-slate-50/70 dark:bg-darkgray/40 flex flex-wrap items-center justify-between gap-3">
      <div class="flex items-center gap-2">
        <a id="modal-view-mailto" href="#" class="btn btn-outline-secondary text-xs">
          <i class="ti ti-send"></i> Responder por E-mail
        </a>
      </div>

      <div class="flex items-center gap-2">
        <a id="modal-view-edit-link" href="#" class="btn btn-primary text-xs">
          <i class="ti ti-pencil"></i> Editar Registro
        </a>
        <button type="button" onclick="closeViewModal()" class="btn btn-outline-secondary text-xs cursor-pointer">
          Fechar
        </button>
      </div>
    </div>

  </div>
</div>

<!-- ======================================================== -->
<!-- MODAL DE CONFIRMAÇÃO DE EXCLUSÃO                         -->
<!-- ======================================================== -->
<div id="deleteModal" class="ms-modal hidden">
  <div class="ms-modal-backdrop" onclick="closeDeleteModal()"></div>
  <div class="ms-modal-content max-w-md mx-auto p-6">
    <div class="flex items-center justify-center w-14 h-14 mx-auto mb-4 rounded-full bg-lighterror text-error">
      <i class="ti ti-trash text-2xl"></i>
    </div>
    <h4 class="text-center text-lg font-bold text-dark dark:text-white mb-2">Confirmar exclusão</h4>
    <p class="text-center text-sm text-bodytext dark:text-darklink mb-6">Tem certeza de que deseja remover esta mensagem de contato? Esta ação não poderá ser desfeita.</p>
    <form action="{{ route('contato.destroy', 'contato') }}" method="post" class="flex gap-3 justify-center">
      {{ method_field('delete') }}
      {{ csrf_field() }}
      <input type="hidden" name="contato_id" id="delete_id" value="">
      <button type="button" onclick="closeDeleteModal()" class="btn btn-outline-secondary flex-1 cursor-pointer">Cancelar</button>
      <button type="submit" class="btn btn-danger flex-1 cursor-pointer"><i class="ti ti-trash"></i> Sim, excluir</button>
    </form>
  </div>
</div>

<script>
function decodeBase64Utf8(base64) {
  try {
    const binaryString = atob(base64);
    const bytes = new Uint8Array(binaryString.length);
    for (let i = 0; i < binaryString.length; i++) {
      bytes[i] = binaryString.charCodeAt(i);
    }
    return new TextDecoder().decode(bytes);
  } catch(e) {
    return decodeURIComponent(escape(atob(base64)));
  }
}

function openViewModal(btn) {
  try {
    const raw = btn.getAttribute('data-contato');
    const jsonStr = decodeBase64Utf8(raw);
    const data = JSON.parse(jsonStr);
    document.getElementById('modal-view-nome').textContent = data.nome || 'Sem nome';
    
    // Initials
    const initials = (data.nome || 'CO').trim().substring(0, 2).toUpperCase();
    document.getElementById('modal-view-initials').textContent = initials;
    
    // Email
    document.getElementById('modal-view-email').textContent = data.email || '-';
    const emailLink = document.getElementById('modal-view-email-link');
    const mailtoBtn = document.getElementById('modal-view-mailto');
    if (data.email) {
      emailLink.href = 'mailto:' + data.email;
      mailtoBtn.href = 'mailto:' + data.email + '?subject=' + encodeURIComponent('Re: ' + (data.assunto || 'Contato Metalmar'));
      mailtoBtn.classList.remove('hidden');
    } else {
      emailLink.href = '#';
      mailtoBtn.classList.add('hidden');
    }

    // Telefone
    document.getElementById('modal-view-telefone').textContent = data.telefone || '-';
    const cleanPhone = (data.telefone || '').replace(/\D/g, '');
    const phoneLink = document.getElementById('modal-view-phone-link');
    if (cleanPhone.length >= 8) {
      let waNumber = cleanPhone;
      if (!waNumber.startsWith('55') && waNumber.length <= 11) {
        waNumber = '55' + waNumber;
      }
      phoneLink.href = 'https://wa.me/' + waNumber;
      phoneLink.classList.remove('hidden');
    } else {
      phoneLink.classList.add('hidden');
    }

    // Assunto e Mensagem
    document.getElementById('modal-view-assunto').textContent = data.assunto || 'Sem assunto';
    document.getElementById('modal-view-mensagem').textContent = data.mensagem || 'Nenhuma mensagem preenchida.';
    document.getElementById('modal-view-data').textContent = data.data || '-';

    // Situação badge
    const badge = document.getElementById('modal-view-situacao');
    const situacao = data.situacao || 'Recebido';
    badge.textContent = situacao;
    
    let badgeClass = 'badge-default';
    if (situacao === 'Recebido') badgeClass = 'badge-recebido';
    else if (situacao === 'Em Atendimento') badgeClass = 'badge-atendimento';
    else if (situacao === 'Finalizado') badgeClass = 'badge-finalizado';
    else if (situacao === 'Cancelado') badgeClass = 'badge-cancelado';
    badge.className = 'badge-status ' + badgeClass;

    // Link de edição
    document.getElementById('modal-view-edit-link').href = data.edit_url;

    // Exibir Modal
    const modal = document.getElementById('viewContatoModal');
    modal.classList.remove('hidden');
    document.body.style.overflow = 'hidden';
  } catch (e) {
    console.error('Erro ao abrir modal de contato:', e);
  }
}

function closeViewModal() {
  const modal = document.getElementById('viewContatoModal');
  modal.classList.add('hidden');
  document.body.style.overflow = '';
}

function openDeleteModal(id) { 
  document.getElementById('delete_id').value = id; 
  document.getElementById('deleteModal').classList.remove('hidden'); 
  document.body.style.overflow = 'hidden';
}

function closeDeleteModal() { 
  document.getElementById('deleteModal').classList.add('hidden'); 
  document.body.style.overflow = '';
}

// Fechar modais ao pressionar ESC
document.addEventListener('keydown', function(event) {
  if (event.key === 'Escape') {
    closeViewModal();
    closeDeleteModal();
  }
});
</script>

@endsection