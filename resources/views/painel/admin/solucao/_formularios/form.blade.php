@csrf

<div class="flex border-b border-ld dark:border-darkborder mb-6 gap-1" id="langTabs">
  <button class="px-4 py-2 text-sm font-medium text-primary border-b-2 border-primary bg-transparent cursor-pointer" id="pt-tab" data-bs-toggle="tab" data-bs-target="#pt" type="button" role="tab">Português</button>
  <button class="px-4 py-2 text-sm font-medium text-bodytext hover:text-primary cursor-pointer" id="en-tab" data-bs-toggle="tab" data-bs-target="#en" type="button" role="tab">Inglês</button>
  <button class="px-4 py-2 text-sm font-medium text-bodytext hover:text-primary cursor-pointer" id="es-tab" data-bs-toggle="tab" data-bs-target="#es" type="button" role="tab">Espanhol</button>
</div>

<div class="tab-content" id="langTabsContent">
  <!-- ABA PORTUGUÊS -->
  <div class="tab-pane fade show active" id="pt" role="tabpanel">
    <div class="mb-3">
      <label class="form-label">Titulo <span class="obrigatorio">&lowast;</span></label>
      <input type="text" name="titulo" class="form-control" value="{{ $solucoes->titulo ?? old('titulo')}}">
      @error('titulo')
        <span class="text-xs text-error mt-1 block">{{ $message }}</span>
      @enderror
    </div>
    <div class="mb-3">
      <label class="form-label">Texto <span class="obrigatorio">&lowast;</span></label>
      <textarea id="texto" name="texto" class="richtext-editor">{{ $solucoes->texto ?? old('texto')}}</textarea>
      @error('texto')
        <span class="text-xs text-error mt-1 block">{{ $message }}</span>
      @enderror
    </div>
    <div class="mb-3">
      <label class="form-label">Descrição <span class="obrigatorio">&lowast;</span></label>
      <textarea id="descricao" name="descricao" class="form-control">{{ $solucoes->descricao ?? old('descricao')}}</textarea>
      @error('descricao')
        <span class="text-xs text-error mt-1 block">{{ $message }}</span>
      @enderror
    </div>
    @if($solucoes->id ?? '')
      @if($solucoes->id <= '3')
        <div class="mb-3">
          <label class="form-label">Descrição da Seção <span class="obrigatorio">&lowast;</span></label>
          <textarea id="descricaodois" name="descricaodois" class="richtext-editor">{{ $solucoes->descricaodois ?? old('descricaodois')}}</textarea>
          @error('descricaodois')
            <span class="text-xs text-error mt-1 block">{{ $message }}</span>
          @enderror
        </div>
      @endif
    @endif
    <hr class="my-4">
    <h6 class="mb-3">Configurações e Imagens</h6>

    <div class="mb-3">
      <label class="form-label">Url Amigável <span class="obrigatorio">&lowast;</span></label>
      <input type="text" name="urltitulo" class="form-control" placeholder="Url Amigável" value="{{ $solucoes->urltitulo ?? old('urltitulo')}}">
      <small class="form-text text-muted">Palavras com letras minúsculas, sem acento, sem espaço e separadas por traço (-)</small>
      @error('urltitulo')
        <span class="text-xs text-error mt-1 block">{{ $message }}</span>
      @enderror
    </div>
    
    <div class="mb-3">
      <label class="form-label">Imagem 1 (Capa) <span class="obrigatorio">&lowast;</span></label>
      <div class="mb-2 mt-2">
        @if($solucoes->img ?? '')
          <img src='{{ url("storage/{$solucoes->img}") }}' class="rounded-xl" width="100px">
          <small>{{ url("storage/{$solucoes->img}") }}</small>
        @endif
      </div>
      <input type="file" name="img" class="form-control" id="img">
      <small class="form-text text-muted">jpeg, png, jpg e webp || 1MB || 800x600px</small>
      @error('img')
        <span class="text-xs text-error mt-1 block">{{ $message }}</span>
      @enderror
    </div>
    <div class="mb-3">
      <label class="form-label">Imagem 2 <span class="obrigatorio">&lowast;</span></label>
      <div class="mb-2 mt-2">
        @if($solucoes->img2 ?? '')
          <img src='{{ url("storage/{$solucoes->img2}") }}' class="rounded-xl" width="100px">
          <small>{{ url("storage/{$solucoes->img2}") }}</small>
        @endif
      </div>
      <input type="file" name="img2" class="form-control" id="img2">
      <small class="form-text text-muted">jpeg, png, jpg e webp || 1MB || 800x600px</small>
      @error('img2')
        <span class="text-xs text-error mt-1 block">{{ $message }}</span>
      @enderror
    </div>
    <div class="mb-3">
      <label class="form-label">Imagem 3 <span class="obrigatorio">&lowast;</span></label>
      <div class="mb-2 mt-2">
        @if($solucoes->img3 ?? '')
          <img src='{{ url("storage/{$solucoes->img3}") }}' class="rounded-xl" width="100px">
          <small>{{ url("storage/{$solucoes->img3}") }}</small>
        @endif
      </div>
      <input type="file" name="img3" class="form-control" id="img3">
      <small class="form-text text-muted">jpeg, png, jpg e webp || 1MB || 800x600px</small>
      @error('img3')
        <span class="text-xs text-error mt-1 block">{{ $message }}</span>
      @enderror
    </div>
  </div>

  <!-- ABA INGLÊS -->
  <div class="tab-pane fade" id="en" role="tabpanel">
    <div class="mb-3">
      <label class="form-label">Titulo (Inglês)</label>
      <input type="text" name="titulo_en" class="form-control" value="{{ $solucoes->titulo_en ?? old('titulo_en')}}">
    </div>
    <div class="mb-3">
      <label class="form-label">Texto (Inglês)</label>
      <textarea id="texto_en" name="texto_en" class="richtext-editor">{{ $solucoes->texto_en ?? old('texto_en')}}</textarea>
    </div>
    <div class="mb-3">
      <label class="form-label">Descrição (Inglês)</label>
      <textarea id="descricao_en" name="descricao_en" class="form-control">{{ $solucoes->descricao_en ?? old('descricao_en')}}</textarea>
    </div>
    @if($solucoes->id ?? '')
      @if($solucoes->id <= '3')
        <div class="mb-3">
          <label class="form-label">Descrição da Seção (Inglês)</label>
          <textarea id="descricaodois_en" name="descricaodois_en" class="richtext-editor">{{ $solucoes->descricaodois_en ?? old('descricaodois_en')}}</textarea>
        </div>
      @endif
    @endif
  </div>

  <!-- ABA ESPANHOL -->
  <div class="tab-pane fade" id="es" role="tabpanel">
    <div class="mb-3">
      <label class="form-label">Titulo (Espanhol)</label>
      <input type="text" name="titulo_es" class="form-control" value="{{ $solucoes->titulo_es ?? old('titulo_es')}}">
    </div>
    <div class="mb-3">
      <label class="form-label">Texto (Espanhol)</label>
      <textarea id="texto_es" name="texto_es" class="richtext-editor">{{ $solucoes->texto_es ?? old('texto_es')}}</textarea>
    </div>
    <div class="mb-3">
      <label class="form-label">Descrição (Espanhol)</label>
      <textarea id="descricao_es" name="descricao_es" class="form-control">{{ $solucoes->descricao_es ?? old('descricao_es')}}</textarea>
    </div>
    @if($solucoes->id ?? '')
      @if($solucoes->id <= '3')
        <div class="mb-3">
          <label class="form-label">Descrição da Seção (Espanhol)</label>
          <textarea id="descricaodois_es" name="descricaodois_es" class="richtext-editor">{{ $solucoes->descricaodois_es ?? old('descricaodois_es')}}</textarea>
        </div>
      @endif
    @endif
  </div>
</div>

<div class="flex items-center gap-3 mt-6 pt-6 border-t border-ld dark:border-darkborder">
  <button type="submit" class="btn btn-primary"><i class="ti ti-device-floppy"></i> Enviar</button>
  <a href="{{route('solucao.index')}}" class="btn btn-outline-secondary"><i class="ti ti-x"></i> Cancelar</a>
</div>
<div class="mt-3">
  <small><span class="obrigatorio">&lowast;</span> Campo obrigatório</small>
</div>