@csrf

<div class="space-y-6">
  <!-- Grid 2 Colunas: Nome e E-mail -->
  <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
    <div>
      <label class="form-label font-medium text-dark dark:text-white flex items-center gap-1">
        <i class="ti ti-user text-primary text-sm"></i> Nome <span class="obrigatorio text-error">&lowast;</span>
      </label>
      <input type="text" 
             name="nome" 
             class="form-control" 
             placeholder="Ex: Carlos Silva" 
             value="{{ $contatos->nome ?? old('nome') }}" 
             required>
      @error('nome')
        <span class="text-xs text-error mt-1 block flex items-center gap-1"><i class="ti ti-alert-circle"></i> {{ $message }}</span>
      @enderror
    </div>

    <div>
      <label class="form-label font-medium text-dark dark:text-white flex items-center gap-1">
        <i class="ti ti-mail text-primary text-sm"></i> E-mail <span class="obrigatorio text-error">&lowast;</span>
      </label>
      <input type="email" 
             name="email" 
             class="form-control" 
             placeholder="exemplo@email.com" 
             value="{{ $contatos->email ?? old('email') }}" 
             required>
      @error('email')
        <span class="text-xs text-error mt-1 block flex items-center gap-1"><i class="ti ti-alert-circle"></i> {{ $message }}</span>
      @enderror
    </div>
  </div>

  <!-- Grid 2 Colunas: Telefone e Assunto -->
  <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
    <div>
      <label class="form-label font-medium text-dark dark:text-white flex items-center gap-1">
        <i class="ti ti-phone text-primary text-sm"></i> Telefone / WhatsApp <span class="obrigatorio text-error">&lowast;</span>
      </label>
      <input type="text" 
             name="telefone" 
             class="form-control" 
             placeholder="(00) 00000-0000" 
             value="{{ $contatos->telefone ?? old('telefone') }}" 
             required>
      @error('telefone')
        <span class="text-xs text-error mt-1 block flex items-center gap-1"><i class="ti ti-alert-circle"></i> {{ $message }}</span>
      @enderror
    </div>

    <div>
      <label class="form-label font-medium text-dark dark:text-white flex items-center gap-1">
        <i class="ti ti-file-text text-primary text-sm"></i> Assunto <span class="obrigatorio text-error">&lowast;</span>
      </label>
      <input type="text" 
             name="assunto" 
             class="form-control" 
             placeholder="Ex: Solicitação de Orçamento" 
             value="{{ $contatos->assunto ?? old('assunto') }}" 
             required>
      @error('assunto')
        <span class="text-xs text-error mt-1 block flex items-center gap-1"><i class="ti ti-alert-circle"></i> {{ $message }}</span>
      @enderror
    </div>
  </div>

  <!-- Situação -->
  <div>
    <label class="form-label font-medium text-dark dark:text-white flex items-center gap-1">
      <i class="ti ti-flag text-primary text-sm"></i> Situação do Atendimento
    </label>
    @php
      $currentSituacao = $contatos->situacao ?? old('situacao', 'Recebido');
    @endphp
    <select id="situacao" name="situacao" class="form-select max-w-md">
      <option value="Recebido" {{ $currentSituacao == 'Recebido' ? 'selected' : '' }}>Recebido (Novo)</option>
      <option value="Em Atendimento" {{ $currentSituacao == 'Em Atendimento' ? 'selected' : '' }}>Em Atendimento</option>
      <option value="Finalizado" {{ $currentSituacao == 'Finalizado' ? 'selected' : '' }}>Finalizado</option>
      <option value="Cancelado" {{ $currentSituacao == 'Cancelado' ? 'selected' : '' }}>Cancelado</option>
    </select>
    @error('situacao')
      <span class="text-xs text-error mt-1 block flex items-center gap-1"><i class="ti ti-alert-circle"></i> {{ $message }}</span>
    @enderror
  </div>

  <!-- Mensagem -->
  <div>
    <label class="form-label font-medium text-dark dark:text-white flex items-center gap-1">
      <i class="ti ti-message-dots text-primary text-sm"></i> Mensagem do Contato <span class="obrigatorio text-error">&lowast;</span>
    </label>
    <textarea id="mensagem" 
              name="mensagem" 
              rows="6" 
              class="form-control" 
              placeholder="Digite ou edite a mensagem..." 
              required>{{ $contatos->mensagem ?? old('mensagem') }}</textarea>
    @error('mensagem')
      <span class="text-xs text-error mt-1 block flex items-center gap-1"><i class="ti ti-alert-circle"></i> {{ $message }}</span>
    @enderror
  </div>
</div>

<!-- Rodapé de Ações -->
<div class="flex flex-wrap items-center justify-between gap-4 mt-8 pt-6 border-t border-ld dark:border-darkborder">
  <div class="flex items-center gap-3">
    <button type="submit" class="btn btn-primary">
      <i class="ti ti-device-floppy"></i> Salvar Contato
    </button>
    <a class="btn btn-outline-secondary" href="{{ route('contato.index') }}">
      <i class="ti ti-x"></i> Cancelar
    </a>
  </div>

  <small class="text-bodytext dark:text-darklink text-xs flex items-center gap-1">
    <span class="obrigatorio text-error font-bold">&lowast;</span> Campos com asterisco são obrigatórios
  </small>
</div>