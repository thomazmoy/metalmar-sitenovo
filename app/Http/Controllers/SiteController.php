<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreContato;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Contato;
use App\Models\Depoimento;
use App\Models\Galeria;
use App\Models\Privacidade;
use App\Models\Quemsomos;
use App\Models\Siteconfig;
use App\Models\Solucao;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class SiteController extends Controller
{
    public function index(): View
    {
        $this->data['banner']     = Banner::where('situacao', '1')->paginate(10);
        $this->data['blog']       = Blog::where('situacao', '1')->latest()->paginate(6);
        $this->data['galeria']    = Galeria::where('situacao', '1')->paginate(100);
        $this->data['depoimento'] = Depoimento::where('situacao', '1')->paginate(100);
        $this->data['quemsomos']  = Quemsomos::first();
        $this->data['siteconfig'] = Siteconfig::first();

        return view('index', $this->data);
    }

    public function quemsomos(): View
    {
        $this->data['quemsomos']  = Quemsomos::first();
        $this->data['depoimento'] = Depoimento::where('situacao', '1')->paginate(100);
        $this->data['siteconfig'] = Siteconfig::first();

        return view('quemsomos', $this->data);
    }

    public function solucao(): View
    {
        $this->data['solucao']    = Solucao::where('situacao', '1')->paginate(100);
        $this->data['siteconfig'] = Siteconfig::first();

        return view('solucao', $this->data);
    }

    public function ver(string $urltitulo): View
    {
        $this->data['post']       = Solucao::where('urltitulo', $urltitulo)->where('situacao', '1')->firstOrFail();
        $this->data['siteconfig'] = Siteconfig::first();

        return view('post', $this->data);
    }

    public function blog(): View
    {
        $this->data['blog']       = Blog::where('situacao', '1')->latest()->paginate(18);
        $this->data['siteconfig'] = Siteconfig::first();

        return view('blog', $this->data);
    }

    public function ler(string $urltitulo): View
    {
        $this->data['post']       = Blog::where('urltitulo', $urltitulo)->where('situacao', '1')->firstOrFail();
        $this->data['blog']       = Blog::where('situacao', '1')->latest()->paginate(10);
        $this->data['siteconfig'] = Siteconfig::first();

        return view('blog-post', $this->data);
    }

    public function pesquisar(Request $request): View
    {
        $pesquisar = $request->get('pesquisar');
        $this->data['pesquisar'] = Blog::where('situacao', '1')
            ->where(function(\Illuminate\Database\Eloquent\Builder $query) use ($pesquisar) {
                $query->where('titulo', 'like', '%' . $pesquisar . '%')
                      ->orWhere('titulo_en', 'like', '%' . $pesquisar . '%')
                      ->orWhere('titulo_es', 'like', '%' . $pesquisar . '%')
                      ->orWhere('texto', 'like', '%' . $pesquisar . '%')
                      ->orWhere('texto_en', 'like', '%' . $pesquisar . '%')
                      ->orWhere('texto_es', 'like', '%' . $pesquisar . '%')
                      ->orWhere('descricao', 'like', '%' . $pesquisar . '%')
                      ->orWhere('descricao_en', 'like', '%' . $pesquisar . '%')
                      ->orWhere('descricao_es', 'like', '%' . $pesquisar . '%');
            })
            ->latest()->paginate(20)->appends(['pesquisar' => $pesquisar]);
        $this->data['siteconfig'] = Siteconfig::first();

        return view('pesquisa', $this->data);
    }

    public function contato(): View
    {
        $this->data['siteconfig'] = Siteconfig::first();

        return view('contato', $this->data);
    }

    public function store(StoreContato $request): RedirectResponse
    {
        $data = $request->only('nome', 'email', 'telefone', 'assunto', 'mensagem', 'situacao');
        Contato::create($data);
        Alert::success('Mensagem Enviada com Sucesso!', 'Em breve entraremos em contato.');

        return back();
    }

    public function privacidade(): View
    {
        $this->data['privacidade'] = Privacidade::paginate();
        $this->data['siteconfig']  = Siteconfig::first();

        return view('privacidade', $this->data);
    }
}
