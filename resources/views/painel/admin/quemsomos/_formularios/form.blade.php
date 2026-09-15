@csrf

<div class="flex border-b border-ld dark:border-darkborder mb-6 gap-1" id="langTabs">
  <button class="px-4 py-2 text-sm font-medium text-primary border-b-2 border-primary bg-transparent cursor-pointer" id="pt-tab" data-bs-toggle="tab" data-bs-target="#pt" type="button" role="tab">Português</button>
  <button class="px-4 py-2 text-sm font-medium text-bodytext hover:text-primary cursor-pointer" id="en-tab" data-bs-toggle="tab" data-bs-target="#en" type="button" role="tab">Inglês</button>
  <button class="px-4 py-2 text-sm font-medium text-bodytext hover:text-primary cursor-pointer" id="es-tab" data-bs-toggle="tab" data-bs-target="#es" type="button" role="tab">Espanhol</button>
</div>

<div class="tab-content" id="langTabsContent">
  
  <!-- ABA PORTUGUÊS -->
  <div class="tab-pane fade show active" id="pt" role="tabpanel">
    
    <div class="bg-slate-50 border border-slate-200 rounded-xl p-5 mb-5">
      <h5 class="font-weight-bolder">1</h5>
      <h6 class="text-uppercase text-body text-xs font-weight-bolder">Seção da 1ª Página em baixo do Banner</h6>
      <div class="w-full">
        <div class="mb-3">
          <label class="form-label">Título <span class="obrigatorio">&lowast;</span></label>
          <input type="text" name="tituloum" class="form-control" placeholder="Titulo" value="{{ $quemsomos->tituloum ?? old('tituloum')}}">
          @error('tituloum')
            <span class="text-xs text-error mt-1 block">{{ $message }}</span>
          @enderror
        </div>
        <div class="mb-3">
          <label class="form-label">Texto <span class="obrigatorio">&lowast;</span></label>
          <textarea id="textoum" name="textoum" class="richtext-editor">{{ $quemsomos->textoum ?? old('textoum')}}</textarea>
          @error('textoum')
            <span class="text-xs text-error mt-1 block">{{ $message }}</span>
          @enderror
        </div>
        <div class="mb-3">
          <label class="form-label">Imagem <span class="obrigatorio">&lowast;</span></label>
          <div class="form-group mt-2">
            @if($quemsomos->imgum ?? '')
            <img src='{{ url("storage/{$quemsomos->imgum}") }}' class="rounded-xl" width="100px">
            @endif
          </div>
          <input type="file" name="imgum" class="form-control" id="imgum">
          @error('imgum')
            <span class="text-xs text-error mt-1 block">{{ $message }}</span>
          @enderror
          <small class="form-text text-muted">jpeg, png, jpg e webp || 1MB || 800X800px</small>
        </div>
      </div>
    </div>

    <div class="bg-slate-50 border border-slate-200 rounded-xl p-5 mb-5">
      <h5 class="font-weight-bolder">2</h5>
      <h6 class="text-uppercase text-body text-xs font-weight-bolder">2ª Seção da 1ª Página em baixo do Banner</h6>
      <div class="w-full">
        <div class="mb-3">
          <label class="form-label">Imagem <span class="obrigatorio">&lowast;</span></label>
          <div class="form-group mt-2">
            @if($quemsomos->imgdois ?? '')
            <img src='{{ url("storage/{$quemsomos->imgdois}") }}' class="rounded-xl" width="100px">
            @endif
          </div>
          <input type="file" name="imgdois" class="form-control" id="imgdois">
          @error('imgdois')
            <span class="text-xs text-error mt-1 block">{{ $message }}</span>
          @enderror
          <small class="form-text text-muted">jpeg, png, jpg e webp || 1MB || 800X800px</small>
        </div>
      </div>
    </div>

    <div class="bg-slate-50 border border-slate-200 rounded-xl p-5 mb-5">
      <h5 class="font-weight-bolder">3</h5>
      <h6 class="text-uppercase text-body text-xs font-weight-bolder">1ª Seção da Página Quem Somos</h6>
      <div class="w-full">
        <div class="mb-3">
          <label class="form-label">Título <span class="obrigatorio">&lowast;</span></label>
          <input type="text" name="titulodois" class="form-control" placeholder="Titulo" value="{{ $quemsomos->titulodois ?? old('titulodois')}}">
          @error('titulodois')
            <span class="text-xs text-error mt-1 block">{{ $message }}</span>
          @enderror
        </div>
        <div class="mb-3">
          <label class="form-label">Texto <span class="obrigatorio">&lowast;</span></label>
          <textarea id="textodois" name="textodois" class="richtext-editor">{{ $quemsomos->textodois ?? old('textodois')}}</textarea>
          @error('textodois')
            <span class="text-xs text-error mt-1 block">{{ $message }}</span>
          @enderror
        </div>
        <div class="mb-3">
          <label class="form-label">Imagem <span class="obrigatorio">&lowast;</span></label>
          <div class="form-group mt-2">
            @if($quemsomos->imgtres ?? '')
            <img src='{{ url("storage/{$quemsomos->imgtres}") }}' class="rounded-xl" width="100px">
            @endif
          </div>
          <input type="file" name="imgtres" class="form-control" id="imgtres">
          @error('imgtres')
            <span class="text-xs text-error mt-1 block">{{ $message }}</span>
          @enderror
          <small class="form-text text-muted">jpeg, png, jpg e webp || 1MB || 800X800px</small>
        </div>
      </div>
    </div>

    <div class="bg-slate-50 border border-slate-200 rounded-xl p-5 mb-5">
      <h5 class="font-weight-bolder">4</h5>
      <h6 class="text-uppercase text-body text-xs font-weight-bolder">2ª Seção da Página Quem Somos</h6>
      <div class="w-full">
        <div class="mb-3">
          <label class="form-label">Título <span class="obrigatorio">&lowast;</span></label>
          <input type="text" name="titulotres" class="form-control" placeholder="Titulo" value="{{ $quemsomos->titulotres ?? old('titulotres')}}">
          @error('titulotres')
            <span class="text-xs text-error mt-1 block">{{ $message }}</span>
          @enderror
        </div>
        <div class="mb-3">
          <label class="form-label">Texto <span class="obrigatorio">&lowast;</span></label>
          <textarea id="textotres" name="textotres" class="richtext-editor">{{ $quemsomos->textotres ?? old('textotres')}}</textarea>
          @error('textotres')
            <span class="text-xs text-error mt-1 block">{{ $message }}</span>
          @enderror
        </div>
        <div class="mb-3">
          <label class="form-label">iframe do Vídeo</label>
          <input type="text" name="iframevideo" class="form-control" placeholder="iframe do Vídeo" value="{{ $quemsomos->iframevideo ?? old('iframevideo')}}">
          @error('iframevideo')
            <span class="text-xs text-error mt-1 block">{{ $message }}</span>
          @enderror
        </div>
      </div>
    </div>

  </div> <!-- FIM ABA PORTUGUÊS -->

  <!-- ABA INGLÊS -->
  <div class="tab-pane fade" id="en" role="tabpanel">
    
    <div class="bg-slate-50 border border-slate-200 rounded-xl p-5 mb-5">
      <h5 class="font-weight-bolder">1</h5>
      <h6 class="text-uppercase text-body text-xs font-weight-bolder">Seção da 1ª Página em baixo do Banner</h6>
      <div class="w-full">
        <div class="mb-3">
          <label class="form-label">Título (Inglês)</label>
          <input type="text" name="tituloum_en" class="form-control" placeholder="Title" value="{{ $quemsomos->tituloum_en ?? old('tituloum_en')}}">
        </div>
        <div class="mb-3">
          <label class="form-label">Texto (Inglês)</label>
          <textarea id="textoum_en" name="textoum_en" class="richtext-editor">{{ $quemsomos->textoum_en ?? old('textoum_en')}}</textarea>
        </div>
      </div>
    </div>

    <div class="bg-slate-50 border border-slate-200 rounded-xl p-5 mb-5">
      <h5 class="font-weight-bolder">3</h5>
      <h6 class="text-uppercase text-body text-xs font-weight-bolder">1ª Seção da Página Quem Somos</h6>
      <div class="w-full">
        <div class="mb-3">
          <label class="form-label">Título (Inglês)</label>
          <input type="text" name="titulodois_en" class="form-control" placeholder="Title" value="{{ $quemsomos->titulodois_en ?? old('titulodois_en')}}">
        </div>
        <div class="mb-3">
          <label class="form-label">Texto (Inglês)</label>
          <textarea id="textodois_en" name="textodois_en" class="richtext-editor">{{ $quemsomos->textodois_en ?? old('textodois_en')}}</textarea>
        </div>
      </div>
    </div>

    <div class="bg-slate-50 border border-slate-200 rounded-xl p-5 mb-5">
      <h5 class="font-weight-bolder">4</h5>
      <h6 class="text-uppercase text-body text-xs font-weight-bolder">2ª Seção da Página Quem Somos</h6>
      <div class="w-full">
        <div class="mb-3">
          <label class="form-label">Título (Inglês)</label>
          <input type="text" name="titulotres_en" class="form-control" placeholder="Title" value="{{ $quemsomos->titulotres_en ?? old('titulotres_en')}}">
        </div>
        <div class="mb-3">
          <label class="form-label">Texto (Inglês)</label>
          <textarea id="textotres_en" name="textotres_en" class="richtext-editor">{{ $quemsomos->textotres_en ?? old('textotres_en')}}</textarea>
        </div>
      </div>
    </div>

  </div> <!-- FIM ABA INGLÊS -->

  <!-- ABA ESPANHOL -->
  <div class="tab-pane fade" id="es" role="tabpanel">
    
    <div class="bg-slate-50 border border-slate-200 rounded-xl p-5 mb-5">
      <h5 class="font-weight-bolder">1</h5>
      <h6 class="text-uppercase text-body text-xs font-weight-bolder">Seção da 1ª Página em baixo do Banner</h6>
      <div class="w-full">
        <div class="mb-3">
          <label class="form-label">Título (Espanhol)</label>
          <input type="text" name="tituloum_es" class="form-control" placeholder="Título" value="{{ $quemsomos->tituloum_es ?? old('tituloum_es')}}">
        </div>
        <div class="mb-3">
          <label class="form-label">Texto (Espanhol)</label>
          <textarea id="textoum_es" name="textoum_es" class="richtext-editor">{{ $quemsomos->textoum_es ?? old('textoum_es')}}</textarea>
        </div>
      </div>
    </div>

    <div class="bg-slate-50 border border-slate-200 rounded-xl p-5 mb-5">
      <h5 class="font-weight-bolder">3</h5>
      <h6 class="text-uppercase text-body text-xs font-weight-bolder">1ª Seção da Página Quem Somos</h6>
      <div class="w-full">
        <div class="mb-3">
          <label class="form-label">Título (Espanhol)</label>
          <input type="text" name="titulodois_es" class="form-control" placeholder="Título" value="{{ $quemsomos->titulodois_es ?? old('titulodois_es')}}">
        </div>
        <div class="mb-3">
          <label class="form-label">Texto (Espanhol)</label>
          <textarea id="textodois_es" name="textodois_es" class="richtext-editor">{{ $quemsomos->textodois_es ?? old('textodois_es')}}</textarea>
        </div>
      </div>
    </div>

    <div class="bg-slate-50 border border-slate-200 rounded-xl p-5 mb-5">
      <h5 class="font-weight-bolder">4</h5>
      <h6 class="text-uppercase text-body text-xs font-weight-bolder">2ª Seção da Página Quem Somos</h6>
      <div class="w-full">
        <div class="mb-3">
          <label class="form-label">Título (Espanhol)</label>
          <input type="text" name="titulotres_es" class="form-control" placeholder="Título" value="{{ $quemsomos->titulotres_es ?? old('titulotres_es')}}">
        </div>
        <div class="mb-3">
          <label class="form-label">Texto (Espanhol)</label>
          <textarea id="textotres_es" name="textotres_es" class="richtext-editor">{{ $quemsomos->textotres_es ?? old('textotres_es')}}</textarea>
        </div>
      </div>
    </div>

  </div> <!-- FIM ABA ESPANHOL -->

</div>

<div class="flex gap-3 mt-6 pt-6 border-t border-ld dark:border-darkborder p-4">
  <button type="submit" class="btn btn-primary"><i class="ti ti-device-floppy"></i> Enviar</button>
  <a class="btn btn-outline-secondary ml-3" href="{{ URL::previous() }}"><i class="ti ti-x"></i>&nbsp;&nbsp;Cancelar</a>
</div>
<div class="mb-3 p-4">
  <small><span class="obrigatorio">&lowast;</span> Campo obrigatório</small>
</div>