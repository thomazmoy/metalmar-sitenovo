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
                      <label class="form-label form-label">Título <span class="obrigatorio">&lowast;</span></label>
                      <input type="text" name="titulo" class="form-control" value="{{ $galerias->titulo ?? old('titulo')}}">
                      @error('titulo')
                        <span class="text-xs text-error mt-1 block">{{ $message }}</span>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label class="form-label form-label">Descrição <span class="obrigatorio">&lowast;</span></label>
                      <textarea id="descricao" name="descricao" class="form-control">{{ $galerias->descricao ?? old('descricao')}}</textarea>
                      @error('descricao')
                        <span class="text-xs text-error mt-1 block">{{ $message }}</span>
                      @enderror
                    </div>
                    <hr class="my-4">
                    <h6 class="mb-3">Configurações e Imagens</h6>
                    <div class="mb-3">
                      <label class="form-label form-label">Imagem <span class="obrigatorio">&lowast;</span></label>
                      <div class="block py-2">
                        @if($galerias->img ?? '')
                          <img src='{{ url("storage/{$galerias->img}") }}' class="rounded-xl" width="100px">
                        @endif
                      </div>
                      <input type="file" name="img" class="form-control" id="img">
                      <small class="form-text text-muted">jpeg, png, jpg e webp || 1MB || 800x600px</small>
                      @error('img')
                        <span class="text-xs text-error mt-1 block">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <!-- ABA INGLÊS -->
                  <div class="tab-pane fade" id="en" role="tabpanel">
                    <div class="mb-3">
                      <label class="form-label form-label">Título (Inglês)</label>
                      <input type="text" name="titulo_en" class="form-control" value="{{ $galerias->titulo_en ?? old('titulo_en')}}">
                    </div>
                    <div class="mb-3">
                      <label class="form-label form-label">Descrição (Inglês)</label>
                      <textarea id="descricao_en" name="descricao_en" class="form-control">{{ $galerias->descricao_en ?? old('descricao_en')}}</textarea>
                    </div>
                  </div>

                  <!-- ABA ESPANHOL -->
                  <div class="tab-pane fade" id="es" role="tabpanel">
                    <div class="mb-3">
                      <label class="form-label form-label">Título (Espanhol)</label>
                      <input type="text" name="titulo_es" class="form-control" value="{{ $galerias->titulo_es ?? old('titulo_es')}}">
                    </div>
                    <div class="mb-3">
                      <label class="form-label form-label">Descrição (Espanhol)</label>
                      <textarea id="descricao_es" name="descricao_es" class="form-control">{{ $galerias->descricao_es ?? old('descricao_es')}}</textarea>
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
              
          	