@extends('template.app')

@section('metatags')
  @if(!empty($siteconfig->taghead))
    {!! $siteconfig->taghead !!}
  @endif
  <meta charset="utf-8">
  <title>{{ $siteconfig->nomesite ?? 'MetalMar' }} — {{ tr('Manutenção Industrial e Naval em Belém do Pará') }}</title>
  <link rel="canonical" href="{{ url('/') }}">
  <meta property="og:url" content="{{ url('/') }}">
  <meta property="og:title" content="{{ $siteconfig->nomesite ?? 'MetalMar' }}">
  <meta property="og:image:alt" content="{{ $siteconfig->nomesite ?? 'MetalMar' }}">
  <meta name="twitter:url" content="{{ url('/') }}">
  <meta name="twitter:title" content="{{ $siteconfig->nomesite ?? 'MetalMar' }}">
@endsection

@section('metatagsog')
  @include('template.metatags')
@endsection

@section('content')

  <!-- 1. Hero Banner Slider (Vanilla JS Carousel) -->
  @if($banner->count() > 0)
    <section class="hero-slider" id="homeHeroSlider">
      <div class="slider-track" id="sliderTrack">
        @foreach($banner as $key => $item)
          <div class="slider-slide" data-index="{{ $key }}">
            <a href="{{ $item->linkbanner ?: 'javascript:void(0)' }}" style="display: block; width: 100%; height: 100%;">
              <picture>
                @if($item->imgbanner)
                  <source media="(min-width: 768px)" srcset="{{ url('storage/' . $item->imgbanner) }}">
                @endif
                <img src="{{ url('storage/' . ($item->imgmobile ?: $item->imgbanner)) }}" alt="{{ $item->titulo }}" style="width: 100%; height: 100%; min-height: 480px; object-fit: cover;">
              </picture>
            </a>
          </div>
        @endforeach
      </div>

      @if($banner->count() > 1)
        <!-- Arrows -->
        <button type="button" class="slider-arrow prev" id="sliderPrev" aria-label="Anterior">
          <i class="ti ti-chevron-left" style="font-size: 1.5rem;"></i>
        </button>
        <button type="button" class="slider-arrow next" id="sliderNext" aria-label="Próximo">
          <i class="ti ti-chevron-right" style="font-size: 1.5rem;"></i>
        </button>

        <!-- Dots -->
        <div class="slider-dots" id="sliderDots">
          @foreach($banner as $key => $item)
            <button type="button" class="slider-dot {{ $key === 0 ? 'active' : '' }}" data-slide="{{ $key }}" aria-label="Slide {{ $key + 1 }}"></button>
          @endforeach
        </div>
      @endif
    </section>
  @endif

  <!-- 2. Quem Somos / Apresentação -->
  @if($quemsomos)
    <section style="padding: 5.5rem 0; background-color: #ffffff;">
      <div class="container-custom">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 3.5rem; align-items: center;">
          
          <!-- Imagem com badge -->
          <div style="position: relative;">
            @if($quemsomos->imgum)
              <div style="border-radius: 1.25rem; overflow: hidden; box-shadow: 0 25px 50px -12px rgba(15, 23, 42, 0.15); border: 1px solid var(--slate-200);">
                <img src="{{ url('storage/' . $quemsomos->imgum) }}" alt="{{ $quemsomos->tituloum }}" style="width: 100%; height: auto; display: block;">
              </div>
            @endif
            <div style="position: absolute; bottom: -1.5rem; right: -1rem; background: var(--navy-950); color: #ffffff; padding: 1.25rem 1.75rem; border-radius: 1rem; box-shadow: 0 15px 30px rgba(0,0,0,0.25); border-left: 4px solid var(--primary); display: flex; align-items: center; gap: 1rem;">
              <i class="ti ti-shield-check" style="font-size: 2.25rem; color: var(--primary);"></i>
              <div>
                <div style="font-size: 1.25rem; font-weight: 800; line-height: 1;">100%</div>
                <div style="font-size: 0.75rem; color: var(--slate-400); text-transform: uppercase; letter-spacing: 0.05em;">{{ tr('Segurança & Qualidade') }}</div>
              </div>
            </div>
          </div>

          <!-- Texto Institucional -->
          <div>
            <div class="section-badge">
              <i class="ti ti-anchor"></i>
              <span>{{ tr('Sobre a MetalMar') }}</span>
            </div>
            <h2 class="section-title" style="margin-bottom: 1.5rem;">
              {{ $quemsomos->tituloum }}
            </h2>
            <div style="color: var(--slate-600); font-size: 1.05rem; line-height: 1.7; margin-bottom: 2rem;">
              {!! $quemsomos->textoum !!}
            </div>
            <div style="display: flex; flex-wrap: wrap; gap: 1rem; align-items: center;">
              <a href="{{ url('metalmar-manutencao-industrial-e-naval-em-belem-do-para') }}" class="btn-primary">
                <span>{{ tr('Conheça Nossa História') }}</span>
                <i class="ti ti-arrow-right"></i>
              </a>
              @if(!empty($siteconfig->celular))
                <a href="tel:{{ preg_replace('/[^0-9]/', '', $siteconfig->celular) }}" class="btn-outline">
                  <i class="ti ti-phone-call"></i>
                  <span>{{ $siteconfig->celular }}</span>
                </a>
              @endif
            </div>
          </div>

        </div>
      </div>
    </section>
  @endif

  <!-- 3. Áreas de Atuação (Destaque Duplo) -->
  <section style="padding: 5.5rem 0; background-color: var(--slate-50); border-top: 1px solid var(--slate-200); border-bottom: 1px solid var(--slate-200);">
    <div class="container-custom">
      
      <div style="text-align: center; margin-bottom: 3.5rem;">
        <div class="section-badge">
          <i class="ti ti-settings-cog"></i>
          <span>{{ tr('Especialidades') }}</span>
        </div>
        <h2 class="section-title">{{ tr('Nossas Áreas de Atuação') }}</h2>
        <p class="section-subtitle">
          {{ tr('Atuamos com soluções integradas de manutenção preventiva e corretiva para os setores fabril, naval e portuário.') }}
        </p>
      </div>

      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 2rem;">
        
        <!-- Card 1: Manutenção Industrial -->
        <div class="feature-card">
          <div class="feature-icon-wrapper">
            <i class="ti ti-building-factory" style="font-size: 2rem;"></i>
          </div>
          <h3 style="font-size: 1.5rem; font-weight: 800; color: var(--navy-950); margin-bottom: 1rem;">
            {{ tr('Manutenção Industrial') }}
          </h3>
          <p style="color: var(--slate-600); line-height: 1.7; margin-bottom: 1.5rem;">
            {{ tr('Atividade fundamental para garantir a eficiência, disponibilidade e segurança de máquinas e equipamentos nos processos produtivos industriais.') }}
          </p>
          <ul style="list-style: none; display: flex; flex-direction: column; gap: 0.65rem; border-top: 1px solid var(--slate-100); padding-top: 1.25rem;">
            <li style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.9375rem; color: var(--slate-700); font-weight: 500;">
              <i class="ti ti-check" style="color: #16a34a;"></i>
              {{ tr('Manutenção mecânica e estrutural pesada') }}
            </li>
            <li style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.9375rem; color: var(--slate-700); font-weight: 500;">
              <i class="ti ti-check" style="color: #16a34a;"></i>
              {{ tr('Sistemas de refrigeração e PMOC') }}
            </li>
            <li style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.9375rem; color: var(--slate-700); font-weight: 500;">
              <i class="ti ti-check" style="color: #16a34a;"></i>
              {{ tr('Soldagem qualificada e caldeiraria') }}
            </li>
          </ul>
        </div>

        <!-- Card 2: Manutenção Naval -->
        <div class="feature-card">
          <div class="feature-icon-wrapper">
            <i class="ti ti-ship" style="font-size: 2rem;"></i>
          </div>
          <h3 style="font-size: 1.5rem; font-weight: 800; color: var(--navy-950); margin-bottom: 1rem;">
            {{ tr('Manutenção Naval') }}
          </h3>
          <p style="color: var(--slate-600); line-height: 1.7; margin-bottom: 1.5rem;">
            {{ tr('Essencial para garantir a navegabilidade, integridade estrutural e segurança de embarcações, rebocadores e frotas fluviais e marítimas.') }}
          </p>
          <ul style="list-style: none; display: flex; flex-direction: column; gap: 0.65rem; border-top: 1px solid var(--slate-100); padding-top: 1.25rem;">
            <li style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.9375rem; color: var(--slate-700); font-weight: 500;">
              <i class="ti ti-check" style="color: #16a34a;"></i>
              {{ tr('Revisão e reparo de motores marítimos') }}
            </li>
            <li style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.9375rem; color: var(--slate-700); font-weight: 500;">
              <i class="ti ti-check" style="color: #16a34a;"></i>
              {{ tr('Trabalhos a quente em casco e conveses') }}
            </li>
            <li style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.9375rem; color: var(--slate-700); font-weight: 500;">
              <i class="ti ti-check" style="color: #16a34a;"></i>
              {{ tr('Equipe técnica embarcada especializada') }}
            </li>
          </ul>
        </div>

      </div>

    </div>
  </section>

  <!-- 4. Soluções e Capacidades Técnicas -->
  <section style="padding: 5.5rem 0; background-color: #ffffff;">
    <div class="container-custom">
      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 3.5rem; align-items: center;">
        
        <!-- Lista de Soluções -->
        <div>
          <div class="section-badge">
            <i class="ti ti-tools"></i>
            <span>{{ tr('Portfólio Técnico') }}</span>
          </div>
          <h2 class="section-title">
            {{ tr('Nossas Soluções Técnicas') }}
          </h2>
          <p style="color: var(--slate-600); font-size: 1.05rem; margin-bottom: 2rem;">
            {{ tr('Oferecemos serviços completos de ponta a ponta com rigorosos padrões de segurança operacional e conformidade técnica.') }}
          </p>

          <div style="display: flex; flex-direction: column; gap: 1rem; margin-bottom: 2.5rem;">
            <div style="display: flex; gap: 1rem; align-items: flex-start; padding: 1rem; background: var(--slate-50); border-radius: 0.75rem; border-left: 3px solid var(--primary);">
              <i class="ti ti-engine" style="font-size: 1.5rem; color: var(--primary); flex-shrink: 0; margin-top: 0.2rem;"></i>
              <div>
                <strong style="color: var(--navy-950); display: block; font-size: 1rem; margin-bottom: 0.25rem;">{{ tr('Preventiva e Corretiva de Motores') }}</strong>
                <span style="color: var(--slate-600); font-size: 0.875rem;">{{ tr('Manutenção especializada para motores das linhas marítima e industrial.') }}</span>
              </div>
            </div>

            <div style="display: flex; gap: 1rem; align-items: flex-start; padding: 1rem; background: var(--slate-50); border-radius: 0.75rem; border-left: 3px solid var(--primary);">
              <i class="ti ti-snowflake" style="font-size: 1.5rem; color: var(--primary); flex-shrink: 0; margin-top: 0.2rem;"></i>
              <div>
                <strong style="color: var(--navy-950); display: block; font-size: 1rem; margin-bottom: 0.25rem;">{{ tr('Refrigeração & PMOC') }}</strong>
                <span style="color: var(--slate-600); font-size: 0.875rem;">{{ tr('Manutenção de sistemas de climatização com emissão e gestão de PMOC.') }}</span>
              </div>
            </div>

            <div style="display: flex; gap: 1rem; align-items: flex-start; padding: 1rem; background: var(--slate-50); border-radius: 0.75rem; border-left: 3px solid var(--primary);">
              <i class="ti ti-flame" style="font-size: 1.5rem; color: var(--primary); flex-shrink: 0; margin-top: 0.2rem;"></i>
              <div>
                <strong style="color: var(--navy-950); display: block; font-size: 1rem; margin-bottom: 0.25rem;">{{ tr('Caldeiraria & Estruturas Metálicas') }}</strong>
                <span style="color: var(--slate-600); font-size: 0.875rem;">{{ tr('Fabricação, reparos estruturais e soldagem especializada.') }}</span>
              </div>
            </div>

            <div style="display: flex; gap: 1rem; align-items: flex-start; padding: 1rem; background: var(--slate-50); border-radius: 0.75rem; border-left: 3px solid var(--primary);">
              <i class="ti ti-users-group" style="font-size: 1.5rem; color: var(--primary); flex-shrink: 0; margin-top: 0.2rem;"></i>
              <div>
                <strong style="color: var(--navy-950); display: block; font-size: 1rem; margin-bottom: 0.25rem;">{{ tr('Mão de Obra Qualificada') }}</strong>
                <span style="color: var(--slate-600); font-size: 0.875rem;">{{ tr('Supervisão, mecânica, caldeiraria, lubrificação e soldagem.') }}</span>
              </div>
            </div>
          </div>

          @if(!empty($siteconfig->whatsapp))
            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $siteconfig->whatsapp) }}" target="_blank" class="btn-primary" style="background-color: #25d366; border-color: #25d366;">
              <i class="ti ti-brand-whatsapp" style="font-size: 1.25rem;"></i>
              <span>{{ tr('Peça Seu Orçamento pelo WhatsApp') }}</span>
            </a>
          @else
            <a href="{{ url('contato-metalmar-manutencao-industrial-e-naval-em-belem-do-para') }}" class="btn-primary">
              <span>{{ tr('Solicite um Orçamento Técnico') }}</span>
              <i class="ti ti-arrow-right"></i>
            </a>
          @endif
        </div>

        <!-- Imagem de Apoio -->
        <div>
          @if(!empty($quemsomos->imgdois))
            <div style="border-radius: 1.25rem; overflow: hidden; box-shadow: 0 25px 50px -12px rgba(15, 23, 42, 0.15); border: 1px solid var(--slate-200);">
              <img src="{{ url('storage/' . $quemsomos->imgdois) }}" alt="{{ $quemsomos->titulodois }}" style="width: 100%; height: auto; display: block;">
            </div>
          @endif
        </div>

      </div>
    </div>
  </section>

  <!-- 5. Blog & Notícias Recentes -->
  @if($blog->count() > 0)
    <section style="padding: 5.5rem 0; background-color: var(--slate-50); border-top: 1px solid var(--slate-200);">
      <div class="container-custom">
        
        <div style="display: flex; align-items: flex-end; justify-content: space-between; flex-wrap: wrap; gap: 1.5rem; margin-bottom: 3.5rem;">
          <div>
            <div class="section-badge">
              <i class="ti ti-news"></i>
              <span>Blog MetalMar</span>
            </div>
            <h2 class="section-title" style="margin-bottom: 0;">{{ tr('Últimas Notícias & Artigos') }}</h2>
          </div>
          <a href="{{ url('blog-metalmar') }}" class="btn-outline">
            <span>{{ tr('Ver Todo o Blog') }}</span>
            <i class="ti ti-arrow-right"></i>
          </a>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 2rem;">
          @foreach($blog as $item)
            <article class="blog-card">
              <a href="{{ url('blog/' . $item->urltitulo) }}" class="img-container">
                @if($item->img)
                  <img src="{{ url('storage/' . $item->img) }}" alt="{{ $item->titulo }}" loading="lazy">
                @endif
              </a>
              <div style="padding: 1.5rem; display: flex; flex-direction: column; flex-grow: 1;">
                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.75rem; font-size: 0.8125rem; color: var(--slate-500);">
                  <span style="display: flex; align-items: center; gap: 0.35rem;">
                    <i class="ti ti-calendar" style="color: var(--primary);"></i>
                    {{ $item->created_at ? $item->created_at->translatedFormat('d M Y') : '' }}
                  </span>
                  @if($item->categoria)
                    <span style="background: var(--slate-100); color: var(--navy-900); padding: 0.2rem 0.6rem; border-radius: 9999px; font-weight: 600; font-size: 0.75rem;">
                      {{ $item->categoria->nome }}
                    </span>
                  @endif
                </div>

                <h3 style="font-size: 1.2rem; font-weight: 700; line-height: 1.4; margin-bottom: 0.75rem;">
                  <a href="{{ url('blog/' . $item->urltitulo) }}" style="color: var(--navy-950); transition: color 0.2s;" onmouseover="this.style.color='var(--primary)'" onmouseout="this.style.color='var(--navy-950)'">
                    {{ $item->titulo }}
                  </a>
                </h3>

                <p style="color: var(--slate-600); font-size: 0.9375rem; line-height: 1.6; margin-bottom: 1.25rem; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                  {{ $item->descricao }}
                </p>

                <div style="margin-top: auto; padding-top: 1rem; border-top: 1px solid var(--slate-100);">
                  <a href="{{ url('blog/' . $item->urltitulo) }}" style="display: inline-flex; align-items: center; gap: 0.35rem; color: var(--primary); font-weight: 700; font-size: 0.875rem;">
                    <span>{{ tr('Ler Artigo Completo') }}</span>
                    <i class="ti ti-arrow-right"></i>
                  </a>
                </div>
              </div>
            </article>
          @endforeach
        </div>

      </div>
    </section>
  @endif

  <!-- 6. Galeria de Projetos / Clientes -->
  @if($galeria->count() > 0)
    <section style="padding: 5.5rem 0; background-color: #ffffff; border-top: 1px solid var(--slate-200);">
      <div class="container-custom">
        <div style="text-align: center; margin-bottom: 3.5rem;">
          <div class="section-badge">
            <i class="ti ti-photo"></i>
            <span>{{ tr('Nosso Trabalho') }}</span>
          </div>
          <h2 class="section-title">{{ tr('Galeria de Projetos & Clientes') }}</h2>
          <p class="section-subtitle">{{ tr('Registros de manutenções executadas com alto rigor e segurança em campo.') }}</p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(240px, 1fr)); gap: 1.5rem;">
          @foreach($galeria as $item)
            <div class="feature-card" style="padding: 0.75rem; overflow: hidden;">
              <div style="position: relative; padding-top: 65%; border-radius: 0.75rem; overflow: hidden; background: var(--slate-100);">
                @if($item->img)
                  <img src="{{ url('storage/' . $item->img) }}" alt="{{ $item->titulo }}" style="position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s;" onmouseover="this.style.transform='scale(1.08)'" onmouseout="this.style.transform='scale(1)'">
                @endif
              </div>
              <div style="padding: 0.75rem 0.25rem 0.25rem;">
                <h4 style="font-size: 1rem; font-weight: 700; color: var(--navy-950); margin-bottom: 0.25rem;">{{ $item->titulo }}</h4>
                @if(!empty($item->descricao))
                  <p style="color: var(--slate-500); font-size: 0.8125rem; line-height: 1.4;">{{ $item->descricao }}</p>
                @endif
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </section>
  @endif

  <!-- 7. Depoimentos -->
  @if($depoimento->count() > 0)
    <section style="padding: 5.5rem 0; background-color: var(--navy-950); color: #ffffff;">
      <div class="container-custom">
        <div style="text-align: center; margin-bottom: 3.5rem;">
          <div class="section-badge" style="background: rgba(230,70,30,0.15); border-color: rgba(230,70,30,0.3);">
            <i class="ti ti-message-2"></i>
            <span>{{ tr('Avaliações') }}</span>
          </div>
          <h2 class="section-title" style="color: #ffffff;">{{ tr('O Que Nossos Clientes Dizem') }}</h2>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
          @foreach($depoimento as $item)
            <div style="background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 1rem; padding: 2rem; display: flex; flex-direction: column;">
              <i class="ti ti-quote" style="font-size: 2.25rem; color: var(--primary); margin-bottom: 1rem;"></i>
              <p style="color: var(--slate-300); font-size: 0.9375rem; line-height: 1.7; margin-bottom: 1.5rem; flex-grow: 1;">
                "{{ $item->texto }}"
              </p>
              <div style="display: flex; align-items: center; gap: 0.85rem; padding-top: 1rem; border-top: 1px solid rgba(255, 255, 255, 0.08);">
                @if($item->img)
                  <img src="{{ url('storage/' . $item->img) }}" alt="{{ $item->nome }}" style="width: 2.75rem; height: 2.75rem; border-radius: 9999px; object-fit: cover; border: 2px solid var(--primary);">
                @else
                  <div style="width: 2.75rem; height: 2.75rem; border-radius: 9999px; background: var(--primary); color: #ffffff; display: flex; align-items: center; justify-content: center; font-weight: 700;">
                    {{ substr($item->nome, 0, 1) }}
                  </div>
                @endif
                <div>
                  <div style="font-weight: 700; color: #ffffff; font-size: 0.9375rem;">{{ $item->nome }}</div>
                  <div style="color: var(--slate-400); font-size: 0.8125rem;">{{ $item->cargo }}</div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </section>
  @endif

  <!-- Slider Vanilla JS Script -->
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const track = document.getElementById('sliderTrack');
      const slides = document.querySelectorAll('.slider-slide');
      const dots = document.querySelectorAll('.slider-dot');
      const prevBtn = document.getElementById('sliderPrev');
      const nextBtn = document.getElementById('sliderNext');
      
      if (!track || slides.length <= 1) return;

      let currentIndex = 0;
      let slideInterval;

      function updateSlide(index) {
        if (index < 0) index = slides.length - 1;
        if (index >= slides.length) index = 0;
        currentIndex = index;

        track.style.transform = `translateX(-${currentIndex * 100}%)`;

        dots.forEach((dot, i) => {
          dot.classList.toggle('active', i === currentIndex);
        });
      }

      function startAutoSlide() {
        clearInterval(slideInterval);
        slideInterval = setInterval(() => {
          updateSlide(currentIndex + 1);
        }, 5500);
      }

      if (prevBtn) prevBtn.addEventListener('click', () => {
        updateSlide(currentIndex - 1);
        startAutoSlide();
      });

      if (nextBtn) nextBtn.addEventListener('click', () => {
        updateSlide(currentIndex + 1);
        startAutoSlide();
      });

      dots.forEach((dot, i) => {
        dot.addEventListener('click', () => {
          updateSlide(i);
          startAutoSlide();
        });
      });

      startAutoSlide();
    });
  </script>

@endsection