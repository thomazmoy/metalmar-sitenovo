<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\GoogleTranslateController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\DepoimentoController;
use App\Http\Controllers\GaleriaController;
use App\Http\Controllers\PrivacidadeController;
use App\Http\Controllers\QuemsomosController;
use App\Http\Controllers\SiteconfigController;
use App\Http\Controllers\SolucaoController;
use App\Http\Controllers\TraducaoController;
use App\Models\Blog;
use App\Models\Solucao;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url as SitemapUrl;

/*
|--------------------------------------------------------------------------
| Google Translate
|--------------------------------------------------------------------------
*/
Route::get('google/translate', [GoogleTranslateController::class, 'googleTranslate'])->name('google.translate');
Route::get('google/translate/change', [GoogleTranslateController::class, 'googleTranslateChange'])->name('google.translate.change');

/*
|--------------------------------------------------------------------------
| Suporte e Manutenção (protegido por auth)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/limparcache', function () {
        Artisan::call('optimize:clear');
        return redirect()->back();
    })->name('admin.limparcache');

    Route::get('/storagelink', function () {
        Artisan::call('storage:link');
        return redirect()->back();
    })->name('admin.storagelink');

    Route::get('gerar-sitemap', function () {
        $sitemap = Sitemap::create()
            ->add(SitemapUrl::create(URL::to('/'))
                ->setLastModificationDate(now())
                ->setChangeFrequency('weekly')
                ->setPriority(1.0))
            ->add(SitemapUrl::create(URL::to('metalmar-manutencao-industrial-e-naval-em-belem-do-para'))
                ->setChangeFrequency('monthly')
                ->setPriority(0.8))
            ->add(SitemapUrl::create(URL::to('solucoes-em-manutencao-industrial-e-naval-em-belem-do-para'))
                ->setChangeFrequency('monthly')
                ->setPriority(0.8))
            ->add(SitemapUrl::create(URL::to('blog-metalmar'))
                ->setChangeFrequency('weekly')
                ->setPriority(1.0))
            ->add(SitemapUrl::create(URL::to('contato-metalmar-manutencao-industrial-e-naval-em-belem-do-para'))
                ->setChangeFrequency('monthly')
                ->setPriority(0.8))
            ->add(SitemapUrl::create(URL::to('politica-de-privacidade'))
                ->setChangeFrequency('monthly')
                ->setPriority(0.8));

        foreach (Solucao::all() as $solucao) {
            $sitemap->add(
                SitemapUrl::create(URL::to('solucoes/' . $solucao->urltitulo))
                    ->setLastModificationDate($solucao->updated_at)
                    ->setChangeFrequency('weekly')
                    ->setPriority(1.0)
            );
        }

        foreach (Blog::all() as $blog) {
            $sitemap->add(
                SitemapUrl::create(URL::to('blog/' . $blog->urltitulo))
                    ->setLastModificationDate($blog->updated_at)
                    ->setChangeFrequency('weekly')
                    ->setPriority(1.0)
            );
        }

        $sitemap->writeToFile(public_path('sitemap.xml'));

        return redirect(url('sitemap.xml'));
    })->name('admin.sitemap');
});

/*
|--------------------------------------------------------------------------
| Site Público
|--------------------------------------------------------------------------
*/
// Index
Route::get('/', [SiteController::class, 'index'])->name('index');

// Quem Somos
Route::get('metalmar-manutencao-industrial-e-naval-em-belem-do-para', [SiteController::class, 'quemsomos'])->name('quemsomos');

// Soluções
Route::get('solucoes-em-manutencao-industrial-e-naval-em-belem-do-para', [SiteController::class, 'solucao'])->name('solucao');
Route::get('solucoes/{urltitulo}', [SiteController::class, 'ver'])->name('ver');

// Blog
Route::get('blog-metalmar', [SiteController::class, 'blog'])->name('blog');
Route::get('blog/{urltitulo}', [SiteController::class, 'ler'])->name('ler');
Route::get('pesquisar', [SiteController::class, 'pesquisar'])->name('pesquisar');

// Contato
Route::get('contato-metalmar-manutencao-industrial-e-naval-em-belem-do-para', [SiteController::class, 'contato'])->name('contato');
Route::post('store', [SiteController::class, 'store'])->name('store')->middleware('throttle:5,1');

// Política de Privacidade
Route::get('politica-de-privacidade', [SiteController::class, 'privacidade'])->name('privacidade');

/*
|--------------------------------------------------------------------------
| Painel Admin (protegido por auth)
|--------------------------------------------------------------------------
*/
Route::resource('admin/banner',     BannerController::class)->middleware('auth');
Route::resource('admin/quemsomos',  QuemsomosController::class)->middleware('auth');
Route::resource('admin/solucao',    SolucaoController::class)->middleware('auth');
Route::resource('admin/categoria',  CategoriaController::class)->middleware('auth');
Route::resource('admin/blog',       BlogController::class)->middleware('auth');
Route::resource('admin/depoimento', DepoimentoController::class)->middleware('auth');
Route::resource('admin/galeria',    GaleriaController::class)->middleware('auth');
Route::resource('admin/contato',    ContatoController::class)->middleware('auth');
Route::resource('admin/privacidade', PrivacidadeController::class)->middleware('auth');
Route::resource('admin/siteconfig', SiteconfigController::class)->middleware('auth');

/*
|--------------------------------------------------------------------------
| Auth e Dashboard
|--------------------------------------------------------------------------
*/
Route::auth();
Route::get('admin',    [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::post('admin/toggle-situacao', [DashboardController::class, 'toggleSituacao'])->name('admin.toggle-situacao')->middleware('auth');
Route::get('procurar', [BlogController::class, 'procurar'])->name('procurar')->middleware('auth');
Route::get('search',   [ContatoController::class, 'search'])->name('search')->middleware('auth');
Route::get('pesquisa', [SolucaoController::class, 'pesquisa'])->name('pesquisa')->middleware('auth');
Route::get('exportar', [ContatoController::class, 'exportar'])->name('exportar')->middleware('auth');

Route::get('admin/traducoes', [TraducaoController::class, 'index'])->name('admin.traducoes.index')->middleware('auth');
Route::put('admin/traducoes', [TraducaoController::class, 'update'])->name('admin.traducoes.update')->middleware('auth');
