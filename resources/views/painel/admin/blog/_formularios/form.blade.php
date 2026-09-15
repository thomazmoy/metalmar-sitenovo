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
      <input type="text" name="titulo" class="form-control" placeholder="Titulo" value="{{ $blogs->titulo ?? old('titulo')}}">
      @error('titulo')
        <span class="text-xs text-error mt-1 block">{{ $message }}</span>
      @enderror
    </div>
    <div class="mb-3">
      <label class="form-label">Descrição <span class="obrigatorio">&lowast;</span></label>
      <input type="text" name="descricao" class="form-control" placeholder="Descrição" value="{{ $blogs->descricao ?? old('descricao')}}">
      @error('descricao')
        <span class="text-xs text-error mt-1 block">{{ $message }}</span>
      @enderror
    </div>
    <div class="mb-3">
      <label class="form-label">Texto <span class="obrigatorio">&lowast;</span></label>
      <textarea id="texto" name="texto" class="richtext-editor">{{ $blogs->texto ?? old('texto')}}</textarea>
      @error('texto')
        <span class="text-xs text-error mt-1 block">{{ $message }}</span>
      @enderror
    </div>
    <hr class="my-4">
    <h6 class="mb-3">Configurações e Imagens</h6>

    <div class="mb-3">
      <label class="form-label">Url Amigável <span class="obrigatorio">&lowast;</span></label>
      <input type="text" name="urltitulo" class="form-control" placeholder="Url Amigável" value="{{ $blogs->urltitulo ?? old('urltitulo')}}">
      <small class="form-text text-muted">Palavras com letras minúsculas, sem acento, sem espaço e separadas por traço (-)</small>
      @error('urltitulo')
        <span class="text-xs text-error mt-1 block">{{ $message }}</span>
      @enderror
    </div>
    
    <div class="mb-3">
      <label class="form-label">Categoria <span class="obrigatorio">&lowast;</span></label>
      <select id="id_categoria" name="id_categoria" class="form-select">
        <option value="{{$blogs->categoria->id ?? ''}}">{{$blogs->categoria->nome ?? ''}} Selecionado</option>
        @if($categorias ?? '')
          @foreach($categorias as $categoria)
            <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
          @endforeach
        @endif
      </select>
      @error('id_categoria')
        <span class="text-xs text-error mt-1 block">{{ $message }}</span>
      @enderror
    </div>

    <div class="mb-3">
      <label class="form-label">Imagem 1 (Capa) <span class="obrigatorio">&lowast;</span></label>
      <div class="mb-2 mt-2">
        @if($blogs->img ?? '')
          <img src='{{ url("storage/{$blogs->img}") }}' class="rounded-xl" width="100px">
          <small>{{ url("storage/{$blogs->img}") }}</small>
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
        @if($blogs->img2 ?? '')
          <img src='{{ url("storage/{$blogs->img2}") }}' class="rounded-xl" width="100px">
          <small>{{ url("storage/{$blogs->img2}") }}</small>
        @endif
      </div>
      <input type="file" name="img2" class="form-control" id="img2">
      <small class="form-text text-muted">jpeg, png, jpg e webp || 1MB || 800x400px</small>
      @error('img2')
        <span class="text-xs text-error mt-1 block">{{ $message }}</span>
      @enderror
    </div>
    <div class="mb-3">
      <label class="form-label">Imagem 3 <span class="obrigatorio">&lowast;</span></label>
      <div class="mb-2 mt-2">
        @if($blogs->img3 ?? '')
          <img src='{{ url("storage/{$blogs->img3}") }}' class="rounded-xl" width="100px">
          <small>{{ url("storage/{$blogs->img3}") }}</small>
        @endif
      </div>
      <input type="file" name="img3" class="form-control" id="img3">
      <small class="form-text text-muted">jpeg, png, jpg e webp || 1MB || 800x400px</small>
      @error('img3')
        <span class="text-xs text-error mt-1 block">{{ $message }}</span>
      @enderror
    </div>
    <div class="mb-3">
      <label class="form-label">iframe</label>
      <input type="text" name="iframe" class="form-control" value="{{ $blogs->iframe ?? old('iframe')}}">
      @error('iframe')
        <span class="text-xs text-error mt-1 block">{{ $message }}</span>
      @enderror
    </div>
  </div>

  <!-- ABA INGLÊS -->
  <div class="tab-pane fade" id="en" role="tabpanel">
    <div class="mb-3">
      <label class="form-label">Título (Inglês)</label>
      <input type="text" name="titulo_en" class="form-control" placeholder="Title" value="{{ $blogs->titulo_en ?? old('titulo_en')}}">
    </div>
    <div class="mb-3">
      <label class="form-label">Descrição (Inglês)</label>
      <input type="text" name="descricao_en" class="form-control" placeholder="Description" value="{{ $blogs->descricao_en ?? old('descricao_en')}}">
    </div>
    <div class="mb-3">
      <label class="form-label">Texto (Inglês)</label>
      <textarea id="texto_en" name="texto_en" class="richtext-editor">{{ $blogs->texto_en ?? old('texto_en')}}</textarea>
    </div>
  </div>

  <!-- ABA ESPANHOL -->
  <div class="tab-pane fade" id="es" role="tabpanel">
    <div class="mb-3">
      <label class="form-label">Título (Espanhol)</label>
      <input type="text" name="titulo_es" class="form-control" placeholder="Título" value="{{ $blogs->titulo_es ?? old('titulo_es')}}">
    </div>
    <div class="mb-3">
      <label class="form-label">Descrição (Espanhol)</label>
      <input type="text" name="descricao_es" class="form-control" placeholder="Descripción" value="{{ $blogs->descricao_es ?? old('descricao_es')}}">
    </div>
    <div class="mb-3">
      <label class="form-label">Texto (Espanhol)</label>
      <textarea id="texto_es" name="texto_es" class="richtext-editor">{{ $blogs->texto_es ?? old('texto_es')}}</textarea>
    </div>
  </div>
</div>

<div class="flex gap-3 mt-6 pt-6 border-t border-ld dark:border-darkborder">
  <button type="submit" class="btn btn-primary"><i class="ti ti-device-floppy"></i> Salvar</button>
  <a class="btn btn-outline-secondary ml-3" href="{{ URL::previous() }}"><i class="ti ti-x"></i>&nbsp;&nbsp;Cancelar</a>
</div>
<div class="mb-3">
  <small><span class="obrigatorio">&lowast;</span> Campo obrigatório</small>
</div>