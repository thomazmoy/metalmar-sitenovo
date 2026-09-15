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
                      <label class="form-label form-label">Nome <span class="obrigatorio">&lowast;</span></label>
                      <input type="text" name="nome" class="form-control" placeholder="Nome" value="{{ $categorias->nome ?? old('nome')}}">
                      @error('nome')
                        <span class="text-xs text-error mt-1 block">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <!-- ABA INGLÊS -->
                  <div class="tab-pane fade" id="en" role="tabpanel">
                    <div class="mb-3">
                      <label class="form-label form-label">Nome (Inglês)</label>
                      <input type="text" name="nome_en" class="form-control" placeholder="Name" value="{{ $categorias->nome_en ?? old('nome_en')}}">
                    </div>
                  </div>

                  <!-- ABA ESPANHOL -->
                  <div class="tab-pane fade" id="es" role="tabpanel">
                    <div class="mb-3">
                      <label class="form-label form-label">Nome (Espanhol)</label>
                      <input type="text" name="nome_es" class="form-control" placeholder="Nombre" value="{{ $categorias->nome_es ?? old('nome_es')}}">
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
              
          	