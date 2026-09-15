@extends('painel.admin.template.app')
<title>MS System | Painel Principal</title>

@section('content')

@php
    $hour = date('H');
    $greeting = ($hour < 12) ? 'Bom dia' : (($hour < 18) ? 'Boa tarde' : 'Boa noite');
    $firstName = explode(' ', Auth::user()->name)[0];
@endphp

<!-- Welcome Banner -->
<div class="dash-welcome card overflow-hidden text-white" style="border-radius: 1rem; padding: 2rem; margin-bottom: 2rem;">
    <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 1.5rem;">
        <div style="display: flex; align-items: center; gap: 1.25rem;">
            <div style="width: 4rem; height: 4rem; border-radius: 50%; background: rgba(255,255,255,0.2); backdrop-filter: blur(4px); border: 1px solid rgba(255,255,255,0.3); display: flex; align-items: center; justify-content: center; font-size: 1.5rem; font-weight: bold; box-shadow: inset 0 2px 4px rgba(0,0,0,0.1);">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>
            <div>
                <h2 style="font-size: 1.5rem; font-weight: 700; margin-bottom: 0.25rem; letter-spacing: -0.025em;">{{ $greeting }}, {{ $firstName }}! 👋</h2>
                <p class="dash-welcome-text" style="font-weight: 500;">Aqui está o resumo do seu painel administrativo hoje.</p>
            </div>
        </div>
        <div style="display: flex; gap: 0.75rem;">
            <a href="{{ route('blog.create') }}" class="dash-welcome-btn-outline" style="padding: 0.5rem 1rem; border-radius: 0.75rem; font-size: 0.875rem; font-weight: 600; display: flex; align-items: center; gap: 0.5rem; text-decoration: none; transition: all 0.2s;">
                <iconify-icon icon="solar:pen-new-square-linear" style="font-size: 1.125rem;"></iconify-icon> Novo Post
            </a>
            <a href="{{ route('contato.index') }}" class="dash-welcome-btn-solid" style="padding: 0.5rem 1rem; border-radius: 0.75rem; font-size: 0.875rem; font-weight: 600; display: flex; align-items: center; gap: 0.5rem; text-decoration: none; box-shadow: 0 1px 2px rgba(0,0,0,0.05); transition: all 0.2s;">
                <iconify-icon icon="solar:letter-linear" style="font-size: 1.125rem;"></iconify-icon> Ver Mensagens
            </a>
        </div>
    </div>
</div>

<!-- Main Grid -->
<div class="dashboard-layout">
    
    <!-- Left Column (Stats) -->
    <div class="stats-column">
        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.5rem;">
            <h3 class="dash-title" style="font-size: 1.125rem; font-weight: 700;">Visão Geral</h3>
        </div>
        
        <div class="stats-grid">
            <!-- Blog -->
            <div class="card stat-card hover:-translate-y-1 transition-transform duration-300">
                <div class="card-body" style="padding: 1.25rem; display: flex; align-items: center; justify-content: space-between;">
                    <div>
                        <p class="stat-subtitle" style="font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.25rem;">Posts do Blog</p>
                        <h4 class="stat-value" style="font-size: 1.875rem; font-weight: 800; margin: 0;">{{ DB::table('blog')->count() }}</h4>
                    </div>
                    <div class="stat-icon-blue" style="width: 3rem; height: 3rem; border-radius: 1rem; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; transition: transform 0.2s;">
                        <iconify-icon icon="solar:document-text-bold"></iconify-icon>
                    </div>
                </div>
                <div class="stat-footer stat-footer-blue" style="padding: 0.75rem 1.25rem;">
                    <a href="{{ route('blog.index') }}" style="font-size: 0.875rem; font-weight: 600; text-decoration: none; display: flex; align-items: center; gap: 0.25rem;">
                        Gerenciar publicações <iconify-icon icon="solar:arrow-right-linear"></iconify-icon>
                    </a>
                </div>
            </div>

            <!-- Categorias -->
            <div class="card stat-card hover:-translate-y-1 transition-transform duration-300">
                <div class="card-body" style="padding: 1.25rem; display: flex; align-items: center; justify-content: space-between;">
                    <div>
                        <p class="stat-subtitle" style="font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.25rem;">Categorias</p>
                        <h4 class="stat-value" style="font-size: 1.875rem; font-weight: 800; margin: 0;">{{ DB::table('categoria')->count() }}</h4>
                    </div>
                    <div class="stat-icon-purple" style="width: 3rem; height: 3rem; border-radius: 1rem; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; transition: transform 0.2s;">
                        <iconify-icon icon="solar:tag-bold"></iconify-icon>
                    </div>
                </div>
                <div class="stat-footer stat-footer-purple" style="padding: 0.75rem 1.25rem;">
                    <a href="{{ route('categoria.index') }}" style="font-size: 0.875rem; font-weight: 600; text-decoration: none; display: flex; align-items: center; gap: 0.25rem;">
                        Ver categorias <iconify-icon icon="solar:arrow-right-linear"></iconify-icon>
                    </a>
                </div>
            </div>

            <!-- Soluções -->
            <div class="card stat-card hover:-translate-y-1 transition-transform duration-300">
                <div class="card-body" style="padding: 1.25rem; display: flex; align-items: center; justify-content: space-between;">
                    <div>
                        <p class="stat-subtitle" style="font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.25rem;">Soluções</p>
                        <h4 class="stat-value" style="font-size: 1.875rem; font-weight: 800; margin: 0;">{{ DB::table('solucao')->count() }}</h4>
                    </div>
                    <div class="stat-icon-teal" style="width: 3rem; height: 3rem; border-radius: 1rem; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; transition: transform 0.2s;">
                        <iconify-icon icon="solar:bolt-circle-bold"></iconify-icon>
                    </div>
                </div>
                <div class="stat-footer stat-footer-teal" style="padding: 0.75rem 1.25rem;">
                    <a href="{{ route('solucao.index') }}" style="font-size: 0.875rem; font-weight: 600; text-decoration: none; display: flex; align-items: center; gap: 0.25rem;">
                        Ver soluções <iconify-icon icon="solar:arrow-right-linear"></iconify-icon>
                    </a>
                </div>
            </div>

            <!-- Galeria -->
            <div class="card stat-card hover:-translate-y-1 transition-transform duration-300">
                <div class="card-body" style="padding: 1.25rem; display: flex; align-items: center; justify-content: space-between;">
                    <div>
                        <p class="stat-subtitle" style="font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.25rem;">Galeria</p>
                        <h4 class="stat-value" style="font-size: 1.875rem; font-weight: 800; margin: 0;">{{ DB::table('galeria')->count() }}</h4>
                    </div>
                    <div class="stat-icon-amber" style="width: 3rem; height: 3rem; border-radius: 1rem; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; transition: transform 0.2s;">
                        <iconify-icon icon="solar:camera-bold"></iconify-icon>
                    </div>
                </div>
                <div class="stat-footer stat-footer-amber" style="padding: 0.75rem 1.25rem;">
                    <a href="{{ route('galeria.index') }}" style="font-size: 0.875rem; font-weight: 600; text-decoration: none; display: flex; align-items: center; gap: 0.25rem;">
                        Ver imagens <iconify-icon icon="solar:arrow-right-linear"></iconify-icon>
                    </a>
                </div>
            </div>

            <!-- Depoimentos -->
            <div class="card stat-card hover:-translate-y-1 transition-transform duration-300">
                <div class="card-body" style="padding: 1.25rem; display: flex; align-items: center; justify-content: space-between;">
                    <div>
                        <p class="stat-subtitle" style="font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.25rem;">Depoimentos</p>
                        <h4 class="stat-value" style="font-size: 1.875rem; font-weight: 800; margin: 0;">{{ DB::table('depoimento')->count() }}</h4>
                    </div>
                    <div class="stat-icon-pink" style="width: 3rem; height: 3rem; border-radius: 1rem; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; transition: transform 0.2s;">
                        <iconify-icon icon="solar:chat-round-dots-bold"></iconify-icon>
                    </div>
                </div>
                <div class="stat-footer stat-footer-pink" style="padding: 0.75rem 1.25rem;">
                    <a href="{{ route('depoimento.index') }}" style="font-size: 0.875rem; font-weight: 600; text-decoration: none; display: flex; align-items: center; gap: 0.25rem;">
                        Ver depoimentos <iconify-icon icon="solar:arrow-right-linear"></iconify-icon>
                    </a>
                </div>
            </div>

            <!-- Banners -->
            <div class="card stat-card hover:-translate-y-1 transition-transform duration-300">
                <div class="card-body" style="padding: 1.25rem; display: flex; align-items: center; justify-content: space-between;">
                    <div>
                        <p class="stat-subtitle" style="font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.25rem;">Banners</p>
                        <h4 class="stat-value" style="font-size: 1.875rem; font-weight: 800; margin: 0;">{{ DB::table('banner')->count() }}</h4>
                    </div>
                    <div class="stat-icon-cyan" style="width: 3rem; height: 3rem; border-radius: 1rem; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; transition: transform 0.2s;">
                        <iconify-icon icon="solar:gallery-bold"></iconify-icon>
                    </div>
                </div>
                <div class="stat-footer stat-footer-cyan" style="padding: 0.75rem 1.25rem;">
                    <a href="{{ route('banner.index') }}" style="font-size: 0.875rem; font-weight: 600; text-decoration: none; display: flex; align-items: center; gap: 0.25rem;">
                        Gerenciar banners <iconify-icon icon="solar:arrow-right-linear"></iconify-icon>
                    </a>
                </div>
            </div>

        </div>
    </div>

    <!-- Right Column (Recent Contacts / Activity) -->
    <div class="activity-column">
        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.5rem;">
            <h3 class="dash-title" style="font-size: 1.125rem; font-weight: 700;">Mensagens Recentes</h3>
            <a href="{{ route('contato.index') }}" class="dash-link" style="font-size: 0.875rem; font-weight: 500; text-decoration: none;">Ver todas</a>
        </div>
        
        <div class="card" style="padding: 0; overflow: hidden; margin-bottom: 0;">
            @php
                $recentes = DB::table('contato')->orderBy('created_at', 'desc')->take(5)->get();
                $totalContatos = DB::table('contato')->count();
            @endphp
            
            <div class="dash-header-bg" style="padding: 1.25rem; display: flex; align-items: center; gap: 0.75rem;">
                <div style="width: 2.5rem; height: 2.5rem; border-radius: 50%; background: #fee2e2; color: #ef4444; display: flex; align-items: center; justify-content: center; font-size: 1.25rem;">
                    <iconify-icon icon="solar:letter-bold"></iconify-icon>
                </div>
                <div>
                    <h4 class="dash-item-title" style="font-weight: 700; margin: 0; font-size: 0.9375rem;">Caixa de Entrada</h4>
                    <p class="dash-item-text" style="font-size: 0.75rem; margin: 0;">{{ $totalContatos }} contatos totais</p>
                </div>
            </div>

            <div>
                @forelse($recentes as $msg)
                <div class="dash-list-item" style="padding: 1rem; transition: background 0.2s;">
                    <a href="{{ route('contato.show', $msg->id) }}" style="display: block; text-decoration: none;">
                        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.25rem;">
                            <h5 class="dash-item-title" style="font-size: 0.875rem; font-weight: 700; margin: 0; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; padding-right: 1rem;">{{ $msg->nome }}</h5>
                            <span class="dash-item-text" style="font-size: 0.75rem; white-space: nowrap;">{{ date('d/m', strtotime($msg->created_at)) }}</span>
                        </div>
                        <p class="dash-item-text" style="font-size: 0.75rem; margin: 0; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $msg->email }}</p>
                    </a>
                </div>
                @empty
                <div class="dash-item-text" style="padding: 2rem; text-align: center;">
                    <iconify-icon icon="solar:inbox-line-linear" style="font-size: 2.5rem; margin-bottom: 0.5rem; opacity: 0.5;"></iconify-icon>
                    <p style="font-size: 0.875rem; margin: 0;">Nenhuma mensagem recente.</p>
                </div>
                @endforelse
            </div>
            
            @if(count($recentes) > 0)
            <div class="dash-footer-bg" style="padding: 0.75rem; text-align: center;">
                <a href="{{ route('contato.index') }}" class="dash-footer-link" style="font-size: 0.75rem; font-weight: 600; text-decoration: none; display: block; transition: color 0.2s;">
                    ACESSAR CENTRAL DE MENSAGENS
                </a>
            </div>
            @endif
        </div>
    </div>

</div>

<style>
.dashboard-layout { display: grid; grid-template-columns: 1fr; gap: 2rem; }
.stats-grid { display: grid; grid-template-columns: 1fr; gap: 1.25rem; }
.stat-card { margin-bottom: 0 !important; }
.stat-card:hover .card-body div:last-child { transform: scale(1.1); }

@media (min-width: 640px) { .stats-grid { grid-template-columns: repeat(2, 1fr); } }
@media (min-width: 1024px) { .dashboard-layout { grid-template-columns: 2fr 1fr; } .stats-grid { grid-template-columns: repeat(3, 1fr); } }

/* Light Mode Colors */
.dash-welcome { background: linear-gradient(135deg, #e6461e, #c23310); box-shadow: 0 10px 15px -3px rgba(230,70,30,0.35); }
.dash-welcome-text { color: #ffedd5; }
.dash-welcome-btn-outline { background: rgba(255,255,255,0.15); border: 1px solid rgba(255,255,255,0.25); color: #fff; }
.dash-welcome-btn-outline:hover { background: rgba(255,255,255,0.25); }
.dash-welcome-btn-solid { background: #fff; color: #e6461e; }
.dash-welcome-btn-solid:hover { background: #fff7ed; }
.dash-title { color: #1f2937; }
.dash-link { color: #e6461e; }
.stat-subtitle { color: #6b7280; }
.stat-value { color: #111827; }
.dash-item-title { color: #111827; }
.dash-item-text { color: #6b7280; }
.dash-header-bg { background: #f8fafc; border-bottom: 1px solid #f1f5f9; }
.dash-list-item { border-bottom: 1px solid #f1f5f9; }
.dash-list-item:hover { background: #f8fafc; }
.dash-footer-bg { background: #f8fafc; border-top: 1px solid #f1f5f9; }
.dash-footer-link { color: #6b7280; }
.dash-footer-link:hover { color: #e6461e; }

/* Light Stat Icons */
.stat-icon-blue { background: #fff7ed; color: #e6461e; } .stat-footer-blue { background: #f8fafc; border-top: 1px solid #f1f5f9; } .stat-footer-blue a { color: #e6461e; }
.stat-icon-purple { background: #faf5ff; color: #9333ea; } .stat-footer-purple { background: #f8fafc; border-top: 1px solid #f1f5f9; } .stat-footer-purple a { color: #9333ea; }
.stat-icon-teal { background: #f0fdfa; color: #0d9488; } .stat-footer-teal { background: #f8fafc; border-top: 1px solid #f1f5f9; } .stat-footer-teal a { color: #0d9488; }
.stat-icon-amber { background: #fffbeb; color: #d97706; } .stat-footer-amber { background: #f8fafc; border-top: 1px solid #f1f5f9; } .stat-footer-amber a { color: #d97706; }
.stat-icon-pink { background: #fdf2f8; color: #db2777; } .stat-footer-pink { background: #f8fafc; border-top: 1px solid #f1f5f9; } .stat-footer-pink a { color: #db2777; }
.stat-icon-cyan { background: #ecfeff; color: #0891b2; } .stat-footer-cyan { background: #f8fafc; border-top: 1px solid #f1f5f9; } .stat-footer-cyan a { color: #0891b2; }

/* Dark Mode Overrides */
.dark .dash-welcome { background: linear-gradient(135deg, #882208, #521203); box-shadow: 0 10px 15px -3px rgba(0,0,0,0.5); }
.dark .dash-welcome-text { color: #fed7aa; }
.dark .dash-title { color: #f1f5f9; }
.dark .stat-subtitle { color: #94a3b8; }
.dark .stat-value { color: #f8fafc; }
.dark .dash-item-title { color: #f1f5f9; }
.dark .dash-item-text { color: #94a3b8; }
.dark .dash-header-bg { background: #0f172a; border-bottom: 1px solid #1e293b; }
.dark .dash-list-item { border-bottom: 1px solid #1e293b; }
.dark .dash-list-item:hover { background: rgba(30,41,59,0.5); }
.dark .dash-footer-bg { background: #0f172a; border-top: 1px solid #1e293b; }
.dark .dash-footer-link:hover { color: #fb923c; }
.dark .dash-link { color: #fb923c; }

.dark .stat-icon-blue { background: rgba(230,70,30,0.2); color: #fb923c; } .dark .stat-footer-blue { background: #0f172a; border-top: 1px solid #1e293b; } .dark .stat-footer-blue a { color: #fb923c; }
.dark .stat-icon-purple { background: rgba(147,51,234,0.2); color: #c084fc; } .dark .stat-footer-purple { background: #0f172a; border-top: 1px solid #1e293b; } .dark .stat-footer-purple a { color: #c084fc; }
.dark .stat-icon-teal { background: rgba(13,148,136,0.2); color: #2dd4bf; } .dark .stat-footer-teal { background: #0f172a; border-top: 1px solid #1e293b; } .dark .stat-footer-teal a { color: #2dd4bf; }
.dark .stat-icon-amber { background: rgba(217,119,6,0.2); color: #fbbf24; } .dark .stat-footer-amber { background: #0f172a; border-top: 1px solid #1e293b; } .dark .stat-footer-amber a { color: #fbbf24; }
.dark .stat-icon-pink { background: rgba(219,39,119,0.2); color: #f472b6; } .dark .stat-footer-pink { background: #0f172a; border-top: 1px solid #1e293b; } .dark .stat-footer-pink a { color: #f472b6; }
.dark .stat-icon-cyan { background: rgba(8,145,178,0.2); color: #22d3ee; } .dark .stat-footer-cyan { background: #0f172a; border-top: 1px solid #1e293b; } .dark .stat-footer-cyan a { color: #22d3ee; }
</style>

@endsection