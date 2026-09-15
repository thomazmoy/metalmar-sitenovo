@csrf

  
    
      <div class="border border-ld dark:border-darkborder rounded-xl p-4 mb-3">
                  <div class="mb-3">
                    <label class="form-label">Nome do Site <span class="obrigatorio">&lowast;</span></label>
                    <input type="text" name="nomesite" class="form-control" value="{{ $siteconfigs->nomesite ?? old('nomesite')}}">
                    @error('nomesite')
                      <span class="text-xs text-error mt-1 block">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Descrição <span class="obrigatorio">&lowast;</span></label>
                    <input type="text" name="descricao" class="form-control" value="{{ $siteconfigs->descricao ?? old('descricao')}}">
                    @error('descricao')
                      <span class="text-xs text-error mt-1 block">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Palavras-Chave (250 caracteres) <span class="obrigatorio">&lowast;</span></label>
                    <textarea onkeyup="limite_textarea(this.value)" id="palavraschave" name="palavraschave" class="form-control">{{ $siteconfigs->palavraschave ?? old('palavraschave')}}</textarea>
                    <small><span id="cont">250</span> restantes</small>
                    @error('palavraschave')
                      <span class="text-xs text-error mt-1 block">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Endereço <span class="obrigatorio">&lowast;</span></label>
                    <input type="text" name="endereco" class="form-control" value="{{ $siteconfigs->endereco ?? old('endereco')}}">
                    @error('endereco')
                      <span class="text-xs text-error mt-1 block">{{ $message }}</span>
                    @enderror
                  </div>
                  
                  <div class="mb-3">
                    <label class="form-label">Email <span class="obrigatorio">&lowast;</span></label>
                    <input type="email" name="email" class="form-control" value="{{ $siteconfigs->email ?? old('email')}}">
                    @error('email')
                      <span class="text-xs text-error mt-1 block">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Celular <span class="obrigatorio">&lowast;</span></label>
                    <input type="text" name="celular" class="form-control" value="{{ $siteconfigs->celular ?? old('celular')}}">
                    @error('celular')
                      <span class="text-xs text-error mt-1 block">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Telefone Fixo ou Celular 2</label>
                    <input type="text" name="telefone" class="form-control" value="{{ $siteconfigs->telefone ?? old('telefone')}}">
                    @error('telefone')
                      <span class="text-xs text-error mt-1 block">{{ $message }}</span>
                    @enderror
                  </div>
                  
                  <div class="mb-3">
                    <label class="form-label">Link do Google Maps</label>
                    <input type="text" name="linkendereco" class="form-control" value="{{ $siteconfigs->linkendereco ?? old('linkendereco')}}">
                    @error('linkendereco')
                      <span class="text-xs text-error mt-1 block">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label class="form-label">iframe do Google Maps</label>
                    <textarea id="iframemapa" name="iframemapa" class="form-control">{{ $siteconfigs->iframemapa ?? old('iframemapa')}}</textarea>
                    @error('iframemapa')
                      <span class="text-xs text-error mt-1 block">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label class="form-label">ID Facebook App</label>
                    <input type="text" name="facebookid" class="form-control" value="{{ $siteconfigs->facebookid ?? old('facebookid')}}">
                    @error('facebookid')
                      <span class="text-xs text-error mt-1 block">{{ $message }}</span>
                    @enderror
                  </div>
                  
                  <div class="mb-3">
                    <label class="form-label">Facebook</label>
                    <input type="text" name="facebook" class="form-control" value="{{ $siteconfigs->facebook ?? old('facebook')}}">
                    @error('facebook')
                      <span class="text-xs text-error mt-1 block">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Instagram</label>
                    <input type="text" name="instagram" class="form-control" value="{{ $siteconfigs->instagram ?? old('instagram')}}">
                    @error('instagram')
                      <span class="text-xs text-error mt-1 block">{{ $message }}</span>
                    @enderror
                  </div>
                  
                  <div class="mb-3">
                    <label class="form-label">Whatsapp</label>
                    <input type="text" name="whatsapp" class="form-control" value="{{ $siteconfigs->whatsapp ?? old('whatsapp')}}">
                    @error('whatsapp')
                      <span class="text-xs text-error mt-1 block">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Twitter</label>
                    <input type="text" name="twitter" class="form-control" value="{{ $siteconfigs->twitter ?? old('twitter')}}">
                    @error('twitter')
                      <span class="text-xs text-error mt-1 block">{{ $message }}</span>
                    @enderror
                  </div>
                  
                  <div class="mb-3">
                    <label class="form-label">Linkedin</label>
                    <input type="text" name="linkedin" class="form-control" value="{{ $siteconfigs->linkedin ?? old('linkedin')}}">
                    @error('linkedin')
                      <span class="text-xs text-error mt-1 block">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label class="form-label">YouTube</label>
                    <input type="text" name="youtube" class="form-control" value="{{ $siteconfigs->youtube ?? old('youtube')}}">
                    @error('youtube')
                      <span class="text-xs text-error mt-1 block">{{ $message }}</span>
                    @enderror
                  </div>
                  
                  <div class="mb-3">
                    <label class="form-label">Código para Tag HEAD</label>
                    <textarea id="taghead" name="taghead" class="form-control">{{ $siteconfigs->taghead ?? old('taghead')}}</textarea>
                    @error('taghead')
                      <span class="text-xs text-error mt-1 block">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Código para chat externo</label>
                    <textarea id="codchat" name="codchat" class="form-control">{{ $siteconfigs->codchat ?? old('codchat')}}</textarea>
                    @error('codchat')
                      <span class="text-xs text-error mt-1 block">{{ $message }}</span>
                    @enderror
                  </div>
                  
                  <div class="mb-3">
                    <label class="form-label">Logo Branca <span class="obrigatorio">&lowast;</span></label>
                    <div class="mb-4">
                      @if($siteconfigs->logobranca ?? '')
                      <img src='{{ url("storage/{$siteconfigs->logobranca}") }}' class="rounded-xl bg-escuro p-2" width="200px">
                      @endif
                    </div>
                    <input type="file" name="logobranca" class="form-control" id="logobranca">
                    <small class="form-text text-muted">jpeg, png, jpg e webp || 512KB || 500x500px</small>
                    @error('logobranca')
                      <span class="text-xs text-error mt-1 block">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Logo Escura<span class="obrigatorio">&lowast;</span></label>
                    <div class="mb-4">
                      @if($siteconfigs->logoescura ?? '')
                      <img src='{{ url("storage/{$siteconfigs->logoescura}") }}' class="rounded-xl bg-light p-2" width="200px">
                      @endif
                    </div>
                    <input type="file" name="logoescura" class="form-control" id="logoescura">
                    <small class="form-text text-muted">jpeg, png, jpg e webp || 512KB || 500x500px</small>
                    @error('logoescura')
                      <span class="text-xs text-error mt-1 block">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Favicon <span class="obrigatorio">&lowast;</span></label>
                    <div class="mb-4">
                      @if($siteconfigs->favicon ?? '')
                      <img src='{{ url("storage/{$siteconfigs->favicon}") }}' class="rounded-xl bg-light p-2" width="50px">
                      @endif
                    </div>
                    <input type="file" name="favicon" class="form-control" id="favicon">
                    <small class="form-text text-muted">jpeg, png, jpg e webp || 256KB || 100x100px</small>
                    @error('favicon')
                      <span class="text-xs text-error mt-1 block">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="flex items-center gap-3 mt-6 pt-6 border-t border-ld dark:border-darkborder">
                  <button type="submit" class="btn btn-primary"><i class="ti ti-device-floppy"></i> Enviar</button>
                  <a class="btn btn-outline-secondary" href="{{ URL::previous() }}"><i class="ti ti-x"></i> Cancelar</a>
                </div>
                <div class="mt-3">
                  <small><span class="obrigatorio">&lowast;</span> Campo obrigatório</small>
                </div></div>

<script>
  function limite_textarea(valor) {
    quant = 250;
    total = valor.length;
    if(total <= quant) {
      resto = quant - total;
      document.getElementById('cont').innerHTML = resto;
    } else {
      document.getElementById('palavraschave').value = valor.substr(0,quant);
    }
  }
</script>