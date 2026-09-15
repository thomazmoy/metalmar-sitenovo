@extends('auth.template.app')
<title>MS System | Autenticação do Painel</title>

@section('content')
<div class="auth-card-split">
    
    <!-- Left Side: Brand Panel (Moy Station Highlights) -->
    <div class="auth-brand-panel">
        <!-- Top Info -->
        <div>
            <div class="auth-brand-badge">
                <span style="width: 0.5rem; height: 0.5rem; border-radius: 9999px; background: #34d399; display: inline-block;"></span>
                <span>Moy Station • Websites & CMS</span>
            </div>

            <h2 style="font-size: 1.55rem; font-weight: 800; line-height: 1.25; margin-bottom: 0.5rem; letter-spacing: -0.02em; color: #ffffff !important;">
                O Melhor em Websites & Gestão de Conteúdo.
            </h2>
            <p style="font-size: 0.8125rem; color: #cbd5e1; line-height: 1.5; font-weight: 400;">
                Desenvolvido sob medida pela <strong style="color: #ffffff; font-weight: 600;">Moy Station</strong> com máxima velocidade, SEO e controle total.
            </p>
        </div>

        <!-- Middle Feature Cards -->
        <div style="display: flex; flex-direction: column; gap: 0.65rem; margin: 1.5rem 0;">
            <div class="auth-feature-card">
                <div style="width: 2rem; height: 2rem; border-radius: 0.6rem; background: rgba(230, 70, 30, 0.2); color: #e6461e; display: flex; align-items: center; justify-content: center; font-size: 1.05rem; border: 1px solid rgba(230, 70, 30, 0.3); flex-shrink: 0;">
                    <i class="ti ti-rocket"></i>
                </div>
                <div>
                    <h6 style="font-size: 0.75rem; font-weight: 700; color: #ffffff; margin-bottom: 0.05rem;">Alta Performance & SEO</h6>
                    <p style="font-size: 0.6875rem; color: #94a3b8;">Arquitetura veloz e otimizada para o Google</p>
                </div>
            </div>

            <div class="auth-feature-card">
                <div style="width: 2rem; height: 2rem; border-radius: 0.6rem; background: rgba(16, 185, 129, 0.2); color: #34d399; display: flex; align-items: center; justify-content: center; font-size: 1.05rem; border: 1px solid rgba(16, 185, 129, 0.3); flex-shrink: 0;">
                    <i class="ti ti-sparkles"></i>
                </div>
                <div>
                    <h6 style="font-size: 0.75rem; font-weight: 700; color: #ffffff; margin-bottom: 0.05rem;">CMS Intuitivo & Moderno</h6>
                    <p style="font-size: 0.6875rem; color: #94a3b8;">Gestão dinâmica com total autonomia</p>
                </div>
            </div>

            <div class="auth-feature-card">
                <div style="width: 2rem; height: 2rem; border-radius: 0.6rem; background: rgba(59, 130, 246, 0.2); color: #60a5fa; display: flex; align-items: center; justify-content: center; font-size: 1.05rem; border: 1px solid rgba(59, 130, 246, 0.3); flex-shrink: 0;">
                    <i class="ti ti-shield-check"></i>
                </div>
                <div>
                    <h6 style="font-size: 0.75rem; font-weight: 700; color: #ffffff; margin-bottom: 0.05rem;">Segurança & Suporte</h6>
                    <p style="font-size: 0.6875rem; color: #94a3b8;">Ambiente protegido e suporte especializado</p>
                </div>
            </div>
        </div>

        <!-- Bottom System Status -->
        <div style="padding-top: 0.85rem; border-top: 1px solid rgba(255, 255, 255, 0.1); display: flex; align-items: center; justify-content: space-between; font-size: 0.75rem; color: #94a3b8;">
            <span style="display: flex; align-items: center; gap: 0.35rem;">
                <i class="ti ti-circle-filled" style="color: #34d399; font-size: 0.55rem;"></i> Plataforma Moy Station
            </span>
            <a href="https://moystation.com" target="_blank" rel="noopener noreferrer" style="font-size: 0.75rem; font-weight: 600; color: #e6461e; text-decoration: none; display: flex; align-items: center; gap: 0.2rem;">
                <span>moystation.com</span>
                <i class="ti ti-arrow-up-right text-xs"></i>
            </a>
        </div>
    </div>

    <!-- Right Side: Form Panel -->
    <div class="auth-form-panel">
        <div style="max-width: 400px; width: 100%; margin: 0 auto;">
            
            <!-- Form Header -->
            <div style="margin-bottom: 2rem;">
                <div style="width: 3rem; height: 3rem; border-radius: 50%; background: rgba(230, 70, 30, 0.1); color: #e6461e; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; margin-bottom: 1rem; border: 1px solid rgba(230, 70, 30, 0.2);">
                    <i class="ti ti-lock-access"></i>
                </div>
                <h3 style="font-size: 1.65rem; font-weight: 800; letter-spacing: -0.02em; margin-bottom: 0.35rem;">
                    Seja Bem-vindo!
                </h3>
                <p style="font-size: 0.875rem; color: #64748b;">
                    Informe suas credenciais para acessar o painel.
                </p>
            </div>

            <!-- Session Status Alert -->
            @if (session('status'))
                <div style="margin-bottom: 1.25rem; padding: 0.85rem 1rem; border-radius: 0.75rem; background: #ecfdf5; border: 1px solid #a7f3d0; color: #065f46; font-size: 0.8125rem; display: flex; align-items: center; gap: 0.5rem;">
                    <i class="ti ti-circle-check" style="font-size: 1.15rem; flex-shrink: 0;"></i>
                    <span>{{ session('status') }}</span>
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf

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
                               value="{{ old('email') }}" 
                               placeholder="nome@empresa.com" 
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
                    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.25rem;">
                        <label for="password" style="font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0;">
                            Senha de Acesso
                        </label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" style="font-size: 0.75rem; color: #e6461e; text-decoration: none; font-weight: 600;">
                                Esqueceu a senha?
                            </a>
                        @endif
                    </div>
                    <div class="auth-input-group">
                        <i class="ti ti-lock auth-input-icon"></i>
                        <input id="password" 
                               type="password" 
                               class="auth-input @error('password') border-red-500 @enderror" 
                               name="password" 
                               placeholder="••••••••" 
                               required 
                               autocomplete="current-password"
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

                <!-- Remember Me Checkbox -->
                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.5rem;">
                    <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer; user-select: none; font-size: 0.8125rem; font-weight: 500;">
                        <input type="checkbox" 
                               name="remember" 
                               id="remember" 
                               style="width: 1rem; height: 1rem; accent-color: #e6461e; cursor: pointer;" 
                               {{ old('remember') ? 'checked' : '' }}>
                        <span>Manter-me conectado</span>
                    </label>
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit" class="auth-btn-submit">
                        <span>Entrar no Painel</span>
                        <i class="ti ti-arrow-right" style="font-size: 1.15rem;"></i>
                    </button>
                </div>
            </form>

            <!-- Security Assurance Footer -->
            <div style="margin-top: 2rem; padding-top: 1.25rem; border-top: 1px solid rgba(226, 232, 240, 0.8); text-align: center; display: flex; align-items: center; justify-content: center; gap: 0.4rem; font-size: 0.75rem; color: #94a3b8;">
                <i class="ti ti-shield-check" style="color: #10b981; font-size: 1rem;"></i>
                <span>Conexão criptografada SSL 256-bit ponta a ponta</span>
            </div>

        </div>
    </div>

</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const passwordInput = document.getElementById('password');
        const toggleBtn = document.getElementById('togglePasswordBtn');
        const toggleIcon = document.getElementById('togglePasswordIcon');

        if (toggleBtn && passwordInput && toggleIcon) {
            toggleBtn.addEventListener('click', () => {
                const isPassword = passwordInput.type === 'password';
                passwordInput.type = isPassword ? 'text' : 'password';
                
                if (isPassword) {
                    toggleIcon.classList.remove('ti-eye');
                    toggleIcon.classList.add('ti-eye-off');
                } else {
                    toggleIcon.classList.remove('ti-eye-off');
                    toggleIcon.classList.add('ti-eye');
                }
            });
        }
    });
</script>
@endsection