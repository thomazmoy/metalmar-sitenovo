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
      <label class="form-label">Título <span class="obrigatorio">&lowast;</span></label>
      <input type="text" name="titulo" class="form-control" placeholder="Titulo" value="{{ $privacidades->titulo ?? old('titulo')}}">
      @error('titulo')
        <span class="text-xs text-error mt-1 block">{{ $message }}</span>
      @enderror
    </div>
    <div class="mb-3">
      <label class="form-label">Texto <span class="obrigatorio">&lowast;</span></label>
      <textarea id="texto" name="texto" class="richtext-editor">{{ $privacidades->texto ?? old('texto')}}</textarea>
      @error('texto')
        <span class="text-xs text-error mt-1 block">{{ $message }}</span>
      @enderror
    </div>
  </div>

  <!-- ABA INGLÊS -->
  <div class="tab-pane fade" id="en" role="tabpanel">
    <div class="mb-3">
      <label class="form-label">Título (Inglês)</label>
      <input type="text" name="titulo_en" class="form-control" placeholder="Title" value="{{ $privacidades->titulo_en ?? old('titulo_en')}}">
    </div>
    <div class="mb-3">
      <label class="form-label">Texto (Inglês)</label>
      <textarea id="texto_en" name="texto_en" class="richtext-editor">{{ $privacidades->texto_en ?? old('texto_en')}}</textarea>
    </div>
  </div>

  <!-- ABA ESPANHOL -->
  <div class="tab-pane fade" id="es" role="tabpanel">
    <div class="mb-3">
      <label class="form-label">Título (Espanhol)</label>
      <input type="text" name="titulo_es" class="form-control" placeholder="Título" value="{{ $privacidades->titulo_es ?? old('titulo_es')}}">
    </div>
    <div class="mb-3">
      <label class="form-label">Texto (Espanhol)</label>
      <textarea id="texto_es" name="texto_es" class="richtext-editor">{{ $privacidades->texto_es ?? old('texto_es')}}</textarea>
    </div>
  </div>
</div>

<div class="flex gap-3 mt-6 pt-6 border-t border-ld dark:border-darkborder">
  <button type="submit" class="btn btn-primary"><i class="ti ti-device-floppy"></i> Enviar</button>
  <a class="btn btn-outline-secondary ml-3" href="{{ URL::previous() }}"><i class="ti ti-x"></i>&nbsp;&nbsp;Cancelar</a>
</div>
<div class="mb-3">
  <small><span class="obrigatorio">&lowast;</span> Campo obrigatório</small>
</div>