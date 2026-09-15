<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr" data-color-theme="Blue_Theme" class="light" data-layout="vertical">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>MS System | Autenticação</title>

    <link rel="shortcut icon" type="image/png" href="{{ asset('painel/assets/img/favicon.png') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.44.0/tabler-icons.min.css">
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    
    <!-- Core Css from Tailwind Admin -->
    <link rel="stylesheet" href="{{ asset('painel/tailwindadmin/assets/css/theme.css') }}" />
    
    <!-- Immediate theme setter to prevent flickering -->
    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>

    <style>
        :root {
            --primary: #e6461e;
            --primary-hover: #cf3d17;
            --font-family: 'Inter', system-ui, -apple-system, sans-serif;
        }
        
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: var(--font-family);
            background-color: #f8fafc;
            color: #1e293b;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: background-color 0.25s ease, color 0.25s ease;
        }
        .dark body {
            background-color: #0b1329;
            color: #f1f5f9;
        }

        /* ─── Header & Footer ─── */
        .auth-header {
            width: 100%;
            padding: 1rem 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid rgba(226, 232, 240, 0.8);
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            z-index: 50;
        }
        .dark .auth-header {
            border-bottom-color: rgba(30, 41, 59, 0.8);
            background: rgba(11, 19, 41, 0.7);
        }

        .auth-footer {
            width: 100%;
            padding: 1rem 1.5rem;
            font-size: 0.75rem;
            color: #64748b;
            border-top: 1px solid rgba(226, 232, 240, 0.8);
            background: rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(8px);
        }
        .dark .auth-footer {
            color: #94a3b8;
            border-top-color: rgba(30, 41, 59, 0.8);
            background: rgba(11, 19, 41, 0.5);
        }

        /* ─── Main Content ─── */
        .auth-main {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
        }

        /* ─── Split Container ─── */
        .auth-card-split {
            width: 100%;
            max-width: 1000px;
            background: #ffffff;
            border-radius: 1.5rem;
            overflow: hidden;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.08), 0 0 0 1px rgba(226, 232, 240, 0.8);
            display: flex;
            flex-direction: column;
        }
        @media (min-width: 1024px) {
            .auth-card-split {
                flex-direction: row;
                min-height: 580px;
            }
        }
        .dark .auth-card-split {
            background: #111c2d;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.4), 0 0 0 1px rgba(255, 255, 255, 0.06);
        }

        /* ─── Single Centered Card ─── */
        .auth-card-single {
            width: 100%;
            max-width: 460px;
            margin: auto;
            background: #ffffff;
            border-radius: 1.5rem;
            padding: 2.5rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.08), 0 0 0 1px rgba(226, 232, 240, 0.8);
            overflow: hidden;
        }
        .dark .auth-card-single {
            background: #162235;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.4), 0 0 0 1px rgba(255, 255, 255, 0.06);
        }

        /* Left Side: Brand Panel */
        .auth-brand-panel {
            background: linear-gradient(135deg, #0b1329 0%, #111c2d 50%, #1e293b 100%) !important;
            color: #ffffff !important;
            padding: 2.5rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            overflow: hidden;
        }
        .auth-brand-panel h2,
        .auth-brand-panel h6 {
            color: #ffffff !important;
        }
        .auth-brand-panel p {
            color: #cbd5e1 !important;
        }
        @media (min-width: 1024px) {
            .auth-brand-panel {
                width: 44%;
            }
        }

        /* Right Side: Form Panel */
        .auth-form-panel {
            padding: 2.5rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: #ffffff;
            flex: 1;
        }
        @media (min-width: 640px) {
            .auth-form-panel {
                padding: 3rem;
            }
        }
        .dark .auth-form-panel {
            background: #162235;
        }

        /* ─── Inputs & Form Controls ─── */
        .auth-input-group {
            position: relative;
            display: flex;
            align-items: center;
            width: 100%;
            margin-top: 0.4rem;
        }
        .auth-input-icon {
            position: absolute;
            left: 1rem;
            color: #94a3b8;
            font-size: 1.15rem;
            pointer-events: none;
            display: flex;
            align-items: center;
        }
        .dark .auth-input-icon {
            color: #64748b;
        }
        .auth-input {
            width: 100%;
            height: 3rem;
            padding-left: 2.75rem;
            padding-right: 1rem;
            border-radius: 0.75rem;
            border: 1px solid #e2e8f0;
            background-color: #f8fafc;
            color: #0f172a;
            font-size: 0.875rem;
            font-weight: 500;
            outline: none;
            transition: all 0.2s ease;
        }
        .auth-input:focus {
            border-color: #e6461e !important;
            background-color: #ffffff !important;
            box-shadow: 0 0 0 3px rgba(230, 70, 30, 0.15) !important;
        }
        .dark .auth-input {
            border-color: #334155;
            background-color: #0f172a;
            color: #f8fafc;
        }
        .dark .auth-input:focus {
            border-color: #ea580c !important;
            background-color: #111c2d !important;
            box-shadow: 0 0 0 3px rgba(234, 88, 12, 0.25) !important;
        }

        .auth-toggle-pass {
            position: absolute;
            right: 0.85rem;
            background: transparent;
            border: none;
            color: #94a3b8;
            cursor: pointer;
            font-size: 1.15rem;
            padding: 0.35rem;
            display: flex;
            align-items: center;
            border-radius: 0.5rem;
            transition: color 0.2s, background-color 0.2s;
        }
        .auth-toggle-pass:hover {
            color: #e6461e;
            background-color: rgba(230, 70, 30, 0.08);
        }

        /* ─── Submit Button ─── */
        .auth-btn-submit {
            width: 100%;
            height: 3rem;
            border-radius: 0.75rem;
            background: linear-gradient(135deg, #e6461e 0%, #ea580c 100%);
            color: #ffffff;
            font-size: 0.95rem;
            font-weight: 700;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            box-shadow: 0 4px 14px rgba(230, 70, 30, 0.35);
            transition: all 0.25s ease;
            text-decoration: none;
        }
        .auth-btn-submit:hover {
            box-shadow: 0 6px 20px rgba(230, 70, 30, 0.5);
            transform: translateY(-2px);
        }
        .auth-btn-submit:active {
            transform: translateY(0);
        }

        /* ─── Brand Feature Items ─── */
        .auth-feature-card {
            display: flex;
            align-items: center;
            gap: 0.875rem;
            padding: 0.75rem 1rem;
            border-radius: 1rem;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.08);
            transition: background 0.2s ease, transform 0.2s ease;
        }
        .auth-feature-card:hover {
            background: rgba(255, 255, 255, 0.08);
            transform: translateX(4px);
        }

        /* ─── Theme Toggle Button ─── */
        .theme-toggle-btn {
            width: 2.25rem;
            height: 2.25rem;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 0.75rem;
            background: #f1f5f9;
            color: #475569;
            border: 1px solid #e2e8f0;
            cursor: pointer;
            transition: all 0.2s;
        }
        .theme-toggle-btn:hover {
            background: #e2e8f0;
            color: #0f172a;
        }
        .dark .theme-toggle-btn {
            background: #1e293b;
            color: #cbd5e1;
            border-color: #334155;
        }
        /* Logo Adaptativo Claro / Escuro */
        .auth-logo-dark { display: none !important; }
        .auth-logo-light { display: block !important; }
        .dark .auth-logo-dark { display: block !important; }
        .dark .auth-logo-light { display: none !important; }

        .hidden {
            display: none !important;
        }
    </style>
</head>
<body>
    
    <!-- Top Navigation Bar -->
    <header class="auth-header">
        <a href="{{ url('/') }}" style="display: flex; align-items: center; gap: 0.5rem; text-decoration: none;">
            <img src="{{ asset('painel/assets/img/mssystem.webp') }}" alt="MS System" class="auth-logo-light" style="height: 2rem; object-fit: contain;">
            <img src="{{ asset('painel/assets/img/mssystem.png') }}" alt="MS System" class="auth-logo-dark" style="height: 2rem; object-fit: contain;">
        </a>

        <div style="display: flex; align-items: center; gap: 0.75rem;">
            <!-- Site Link -->
            <a href="{{ url('/') }}" style="display: inline-flex; align-items: center; gap: 0.35rem; padding: 0.4rem 0.85rem; border-radius: 0.75rem; font-size: 0.75rem; font-weight: 600; color: #475569; background: #f1f5f9; text-decoration: none; border: 1px solid #e2e8f0; transition: all 0.2s;">
                <i class="ti ti-world" style="font-size: 0.875rem;"></i>
                <span>Ver Site</span>
            </a>

            <!-- WhatsApp Support -->
            <a href="https://wa.me/559181500579" target="_blank" rel="noopener noreferrer" style="display: inline-flex; align-items: center; gap: 0.35rem; padding: 0.4rem 0.85rem; border-radius: 0.75rem; font-size: 0.75rem; font-weight: 600; color: #059669; background: #ecfdf5; text-decoration: none; border: 1px solid #a7f3d0; transition: all 0.2s;">
                <i class="ti ti-brand-whatsapp" style="font-size: 0.875rem;"></i>
                <span>Suporte</span>
            </a>

            <!-- Theme Toggle Button -->
            <button type="button" id="theme-toggle" class="theme-toggle-btn" title="Alternar tema">
                <iconify-icon id="theme-toggle-dark-icon" icon="solar:moon-linear" style="font-size: 1.15rem;" class="hidden"></iconify-icon>
                <iconify-icon id="theme-toggle-light-icon" icon="solar:sun-2-linear" style="font-size: 1.15rem; color: #fbbf24;" class="hidden"></iconify-icon>
            </button>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="auth-main">
        @yield('content')
    </main>

    <!-- Bottom Footer -->
    <footer class="auth-footer">
        <div style="max-width: 1000px; margin: 0 auto; display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 0.5rem;">
            <span>MS System &copy; {{ date('Y') }} Todos os direitos reservados.</span>
            <span>
                Desenvolvido por <a href="https://moystation.com" target="_blank" rel="noopener noreferrer" style="color: #e6461e; font-weight: 600; text-decoration: none;">Moy Station</a>
            </span>
        </div>
    </footer>

    <!-- Theme Toggle & Interactions Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
            const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');
            const themeToggleBtn = document.getElementById('theme-toggle');

            if (document.documentElement.classList.contains('dark')) {
                themeToggleLightIcon.classList.remove('hidden');
            } else {
                themeToggleDarkIcon.classList.remove('hidden');
            }

            if (themeToggleBtn) {
                themeToggleBtn.addEventListener('click', function() {
                    themeToggleDarkIcon.classList.toggle('hidden');
                    themeToggleLightIcon.classList.toggle('hidden');

                    if (localStorage.getItem('color-theme')) {
                        if (localStorage.getItem('color-theme') === 'light') {
                            document.documentElement.classList.add('dark');
                            localStorage.setItem('color-theme', 'dark');
                        } else {
                            document.documentElement.classList.remove('dark');
                            localStorage.setItem('color-theme', 'light');
                        }
                    } else {
                        if (document.documentElement.classList.contains('dark')) {
                            document.documentElement.classList.remove('dark');
                            localStorage.setItem('color-theme', 'light');
                        } else {
                            document.documentElement.classList.add('dark');
                            localStorage.setItem('color-theme', 'dark');
                        }
                    }
                });
            }
        });
    </script>
    @yield('scripts')
</body>
</html>
