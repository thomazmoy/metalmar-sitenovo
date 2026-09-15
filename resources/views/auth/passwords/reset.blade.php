@extends('auth.template.app')
<title>MS System | Redefinir Senha</title>

@section('content')
<div class="auth-card-single">
    <div style="margin-bottom: 2rem; text-align: center;">
        <div style="width: 3.5rem; height: 3.5rem; border-radius: 50%; background: rgba(230, 70, 30, 0.1); color: #e6461e; display: flex; align-items: center; justify-content: center; font-size: 1.75rem; margin: 0 auto 1rem; border: 1px solid rgba(230, 70, 30, 0.2);">
            <i class="ti ti-shield-lock"></i>
        </div>
        <h3 style="font-size: 1.6rem; font-weight: 800; letter-spacing: -0.02em; margin-bottom: 0.35rem;">
            Redefinir Senha
        </h3>
        <p style="font-size: 0.8125rem; color: #64748b;">
            Crie sua nova senha segura para acessar o painel
        </p>
    </div>

    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">

        <!-- Email Input -->
        <div style="margin-bottom: 1.25rem;">
            <label for="email" style="display: block; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.25rem;">
                Endereço de E-mail
            </label>
            <div class="auth-input-group">
                <i class="ti ti-mail auth-input-icon"></i>
                <input id="email" 
                       type="email" 
                       class="auth-input @error('email') border-red-500 @enderror" 
                       name="email" 
                       value="{{ $email ?? old('email') }}" 
                       placeholder="seu@email.com" 
                       required 
                       autocomplete="email" 
                       autofocus>
            </div>
            @error('email')
                <p style="font-size: 0.75rem; color: #e11d48; margin-top: 0.35rem; display: flex; align-items: center; gap: 0.25rem; font-weight: 600;">
                    <i class="ti ti-alert-circle"></i> {{ $message }}
                </p>
            @enderror
        </div>

        <!-- Password Input -->
        <div style="margin-bottom: 1.25rem;">
            <label for="password" style="display: block; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.25rem;">
                Nova Senha
            </label>
            <div class="auth-input-group">
                <i class="ti ti-lock auth-input-icon"></i>
                <input id="password" 
                       type="password" 
                       class="auth-input @error('password') border-red-500 @enderror" 
                       name="password" 
                       placeholder="••••••••" 
                       required 
                       autocomplete="new-password"
                       style="padding-right: 2.75rem;">
                <button type="button" id="togglePasswordBtn" class="auth-toggle-pass" title="Mostrar/Ocultar Senha">
                    <i id="togglePasswordIcon" class="ti ti-eye"></i>
                </button>
            </div>
            @error('password')
                <p style="font-size: 0.75rem; color: #e11d48; margin-top: 0.35rem; display: flex; align-items: center; gap: 0.25rem; font-weight: 600;">
                    <i class="ti ti-alert-circle"></i> {{ $message }}
                </p>
            @enderror
        </div>

        <!-- Confirm Password Input -->
        <div style="margin-bottom: 1.5rem;">
            <label for="password-confirm" style="display: block; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.25rem;">
                Confirmar Nova Senha
            </label>
            <div class="auth-input-group">
                <i class="ti ti-lock-check auth-input-icon"></i>
                <input id="password-confirm" 
                       type="password" 
                       class="auth-input" 
                       name="password_confirmation" 
                       placeholder="••••••••" 
                       required 
                       autocomplete="new-password"
                       style="padding-right: 2.75rem;">
                <button type="button" id="togglePasswordConfirmBtn" class="auth-toggle-pass" title="Mostrar/Ocultar Senha">
                    <i id="togglePasswordConfirmIcon" class="ti ti-eye"></i>
                </button>
            </div>
        </div>

        <!-- Submit -->
        <div style="display: flex; flex-direction: column; gap: 0.75rem;">
            <button type="submit" class="auth-btn-submit">
                <i class="ti ti-check" style="font-size: 1.15rem;"></i>
                <span>Salvar Nova Senha</span>
            </button>
            <a href="{{ route('login') }}" style="display: flex; align-items: center; justify-content: center; gap: 0.4rem; padding: 0.75rem; border-radius: 0.75rem; font-size: 0.8125rem; font-weight: 600; color: #64748b; background: #f1f5f9; text-decoration: none; border: 1px solid #e2e8f0; transition: all 0.2s;">
                <i class="ti ti-arrow-left"></i>
                <span>Voltar ao Login</span>
            </a>
        </div>
    </form>
    
    <div style="margin-top: 1.5rem; padding-top: 1rem; border-top: 1px solid rgba(226, 232, 240, 0.8); text-align: center; display: flex; align-items: center; justify-content: center; gap: 0.4rem; font-size: 0.75rem; color: #94a3b8;">
        <i class="ti ti-shield-check" style="color: #10b981; font-size: 1rem;"></i>
        <span>Ambiente Seguro SSL 256-bit</span>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        function setupToggle(inputId, btnId, iconId) {
            const input = document.getElementById(inputId);
            const btn = document.getElementById(btnId);
            const icon = document.getElementById(iconId);

            if (btn && input && icon) {
                btn.addEventListener('click', () => {
                    const isPassword = input.type === 'password';
                    input.type = isPassword ? 'text' : 'password';
                    if (isPassword) {
                        icon.classList.remove('ti-eye');
                        icon.classList.add('ti-eye-off');
                    } else {
                        icon.classList.remove('ti-eye-off');
                        icon.classList.add('ti-eye');
                    }
                });
            }
        }

        setupToggle('password', 'togglePasswordBtn', 'togglePasswordIcon');
        setupToggle('password-confirm', 'togglePasswordConfirmBtn', 'togglePasswordConfirmIcon');
    });
</script>
@endsection
