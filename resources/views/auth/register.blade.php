@extends('auth.template.app')
<title>MS System | Novo Acesso</title>

@section('content')
<div class="auth-card-split">
    
    <!-- Left Side: Brand Panel (Moy Station Highlights) -->
    <div class="auth-brand-panel">
        <!-- Top Info -->
        <div>
            <div class="auth-brand-badge">
                <span style="width: 0.5rem; height: 0.5rem; border-radius: 9999px; background: #34d399; display: inline-block;"></span>
                <span>Moy Station • Controle de Acesso</span>
            </div>

            <h2 style="font-size: 1.55rem; font-weight: 800; line-height: 1.25; margin-bottom: 0.5rem; letter-spacing: -0.02em; color: #ffffff !important;">
                Crie um Novo Acesso ao Painel.
            </h2>
            <p style="font-size: 0.8125rem; color: #cbd5e1; line-height: 1.5; font-weight: 400;">
                Cadastre novos administradores para gerenciar conteúdos, publicações, contatos e configurações do site.
            </p>
        </div>

        <!-- Middle Feature Cards -->
        <div style="display: flex; flex-direction: column; gap: 0.65rem; margin: 1.5rem 0;">
            <div class="auth-feature-card">
                <div style="width: 2rem; height: 2rem; border-radius: 0.6rem; background: rgba(230, 70, 30, 0.2); color: #e6461e; display: flex; align-items: center; justify-content: center; font-size: 1.05rem; border: 1px solid rgba(230, 70, 30, 0.3); flex-shrink: 0;">
                    <i class="ti ti-shield-check"></i>
                </div>
                <div>
                    <h6 style="font-size: 0.75rem; font-weight: 700; color: #ffffff; margin-bottom: 0.05rem;">Segurança Rigorosa</h6>
                    <p style="font-size: 0.6875rem; color: #94a3b8;">Criptografia avançada e proteção de credenciais</p>
                </div>
            </div>

            <div class="auth-feature-card">
                <div style="width: 2rem; height: 2rem; border-radius: 0.6rem; background: rgba(16, 185, 129, 0.2); color: #34d399; display: flex; align-items: center; justify-content: center; font-size: 1.05rem; border: 1px solid rgba(16, 185, 129, 0.3); flex-shrink: 0;">
                    <i class="ti ti-layout-dashboard"></i>
                </div>
                <div>
                    <h6 style="font-size: 0.75rem; font-weight: 700; color: #ffffff; margin-bottom: 0.05rem;">Autonomia & Controle</h6>
                    <p style="font-size: 0.6875rem; color: #94a3b8;">Painel intuitivo com tecnologia Tailwind CSS</p>
                </div>
            </div>

            <div class="auth-feature-card">
                <div style="width: 2rem; height: 2rem; border-radius: 0.6rem; background: rgba(59, 130, 246, 0.2); color: #60a5fa; display: flex; align-items: center; justify-content: center; font-size: 1.05rem; border: 1px solid rgba(59, 130, 246, 0.3); flex-shrink: 0;">
                    <i class="ti ti-users"></i>
                </div>
                <div>
                    <h6 style="font-size: 0.75rem; font-weight: 700; color: #ffffff; margin-bottom: 0.05rem;">Gestão de Equipe</h6>
                    <p style="font-size: 0.6875rem; color: #94a3b8;">Acessos individuais para sua equipe</p>
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
        <div style="max-width: 440px; width: 100%; margin: 0 auto;">
            
            <!-- Form Header -->
            <div style="margin-bottom: 1.5rem;">
                <div style="width: 3rem; height: 3rem; border-radius: 50%; background: rgba(230, 70, 30, 0.1); color: #e6461e; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; margin-bottom: 0.75rem; border: 1px solid rgba(230, 70, 30, 0.2);">
                    <i class="ti ti-user-plus"></i>
                </div>
                <h3 style="font-size: 1.6rem; font-weight: 800; letter-spacing: -0.02em; margin-bottom: 0.25rem;">
                    Criar Novo Acesso
                </h3>
                <p style="font-size: 0.8125rem; color: #64748b;">
                    Preencha os dados abaixo para registrar uma nova conta.
                </p>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name Input -->
                <div style="margin-bottom: 1rem;">
                    <label for="name" style="display: block; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.25rem;">
                        Nome Completo
                    </label>
                    <div class="auth-input-group">
                        <i class="ti ti-user auth-input-icon"></i>
                        <input id="name" 
                               type="text" 
                               class="auth-input @error('name') border-red-500 @enderror" 
                               name="name" 
                               value="{{ old('name') }}" 
                               placeholder="Seu nome completo" 
                               required 
                               autocomplete="name" 
                               autofocus>
                    </div>
                    @error('name')
                        <p style="font-size: 0.75rem; color: #e11d48; margin-top: 0.35rem; display: flex; align-items: center; gap: 0.25rem; font-weight: 600;">
                            <i class="ti ti-alert-circle"></i> {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Email Input -->
                <div style="margin-bottom: 1rem;">
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
                               placeholder="seu@email.com" 
                               required 
                               autocomplete="email">
                    </div>
                    @error('email')
                        <p style="font-size: 0.75rem; color: #e11d48; margin-top: 0.35rem; display: flex; align-items: center; gap: 0.25rem; font-weight: 600;">
                            <i class="ti ti-alert-circle"></i> {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Passwords Row -->
                <div style="display: grid; grid-template-columns: 1fr; gap: 1rem; margin-bottom: 1.25rem;">
                    <!-- Password -->
                    <div>
                        <label for="password" style="display: block; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.25rem;">
                            Senha
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

                    <!-- Confirm Password -->
                    <div>
                        <label for="password-confirm" style="display: block; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.25rem;">
                            Confirmar Senha
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
                </div>

                <!-- Submit Button -->
                <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                    <button type="submit" class="auth-btn-submit">
                        <i class="ti ti-user-plus" style="font-size: 1.15rem;"></i>
                        <span>Cadastrar Usuário</span>
                    </button>
                    <a href="{{ route('login') }}" style="display: flex; align-items: center; justify-content: center; gap: 0.4rem; padding: 0.75rem; border-radius: 0.75rem; font-size: 0.8125rem; font-weight: 600; color: #64748b; background: #f1f5f9; text-decoration: none; border: 1px solid #e2e8f0; transition: all 0.2s;">
                        <i class="ti ti-arrow-left"></i>
                        <span>Já possui conta? Fazer Login</span>
                    </a>
                </div>
            </form>

            <!-- Security Assurance Footer -->
            <div style="margin-top: 1.5rem; padding-top: 1rem; border-top: 1px solid rgba(226, 232, 240, 0.8); text-align: center; display: flex; align-items: center; justify-content: center; gap: 0.4rem; font-size: 0.75rem; color: #94a3b8;">
                <i class="ti ti-shield-check" style="color: #10b981; font-size: 1rem;"></i>
                <span>Ambiente Seguro SSL 256-bit</span>
            </div>

        </div>
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
