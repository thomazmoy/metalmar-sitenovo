@csrf

  
    
      <div class="mb-3">
                  <label class="form-label form-label">Título <span class="obrigatorio">&lowast;</span></label>
                  <input type="text" name="titulo" class="form-control" value="{{ $banners->titulo ?? old('titulo')}}">
                  @error('titulo')
                    <span class="text-xs text-error mt-1 block">{{ $message }}</span>
                  @enderror
                </div>
                <div class="mb-3">
                  <label class="form-label form-label">Link do Banner</label>
                  <input type="text" name="linkbanner" class="form-control" value="{{ $banners->linkbanner ?? old('linkbanner')}}">
                  @error('linkbanner')
                    <span class="text-xs text-error mt-1 block">{{ $message }}</span>
                  @enderror
                </div>
                <div class="mb-3">
                  <label class="form-label form-label">Imagem do Banner <span class="obrigatorio">&lowast;</span></label>
                  <div class="block py-2">
                    @if($banners->imgbanner ?? '')
                      <img src='{{ url("storage/{$banners->imgbanner}") }}' class="rounded-xl" width="100px">
                    @endif
                  </div>
                  <input type="file" name="imgbanner" class="form-control" id="imgbanner">
                  <small class="form-text text-muted">jpeg, png, jpg e webp || 2MB || 2000x800px</small>
                  @error('imgbanner')
                    <span class="text-xs text-error mt-1 block">{{ $message }}</span>
                  @enderror
                </div>
                <div class="mb-3">
                  <label class="form-label form-label">Imagem do Banner para Mobile <span class="obrigatorio">&lowast;</span></label>
                  <div class="block py-2">
                    @if($banners->imgmobile ?? '')
                      <img src='{{ url("storage/{$banners->imgmobile}") }}' class="rounded-xl" width="100px">
                    @endif
                  </div>
                  <input type="file" name="imgmobile" class="form-control" id="imgmobile">
                  <small class="form-text text-muted">jpeg, png, jpg e webp || 1MB || 800x1000px</small>
                  @error('imgmobile')
                    <span class="text-xs text-error mt-1 block">{{ $message }}</span>
                  @enderror
                </div>
                <div class="flex gap-3 mt-6 pt-6 border-t border-ld dark:border-darkborder">
                  <button type="submit" class="btn btn-primary"><i class="ti ti-device-floppy"></i> Salvar</button>
                  <a class="btn btn-outline-secondary ml-3" href="{{ URL::previous() }}"><i class="ti ti-x"></i>&nbsp;&nbsp;Cancelar</a>
                </div>
                <div class="mb-3">
                  <small><span class="obrigatorio">&lowast;</span> Campo obrigatório</small>
                </div>
              
          	