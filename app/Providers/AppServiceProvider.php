<?php

namespace App\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Stichoza\GoogleTranslate\GoogleTranslate as GT;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use App\Models\Siteconfig;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Registra GoogleTranslate como singleton acessível via alias nas views
        $this->app->singleton('GoogleTranslate', function () {
            return new class {
                /** Traduz um texto para o locale informado. Retorna o original em caso de erro. */
                public static function trans(?string $text, ?string $locale = null): string
                {
                    if (empty($text) || $locale === null || $locale === 'pt' || $locale === 'pt_BR') {
                        return $text ?? '';
                    }
                    try {
                        return (new GT())->setTarget($locale)->translate($text) ?? $text;
                    } catch (\Throwable) {
                        return $text;
                    }
                }
            };
        });

        // Registra alias global para uso como GoogleTranslate::trans() nas views Blade
        AliasLoader::getInstance()->alias('GoogleTranslate', \App\Facades\GoogleTranslate::class);
    }

    public function boot(): void
    {
        // Locale pt_BR para formatos de data e ordenação
        setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.UTF-8', 'portuguese');

        // Injeção automática das configurações nas views (Site público e Painel Admin)
        View::composer([
            'index', 'quemsomos', 'solucao', 'post', 'blog', 'blog-post',
            'pesquisa', 'contato', 'privacidade', 'template.*', 'painel.*',
        ], function ($view) {
            if (Schema::hasTable('siteconfig')) {
                $siteconfig = Siteconfig::first();
                $configuracao = Siteconfig::all();
                $view->with(compact('siteconfig', 'configuracao'));
            }
        });
    }
}
