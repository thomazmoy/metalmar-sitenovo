<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoria;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Categoria;
use App\Models\Siteconfig;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class CategoriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): View
    {
        $this->data['categorias']   = Categoria::latest()->paginate(20);
        $this->data['configuracao'] = Siteconfig::all();

        return view('painel.admin.categoria.index', $this->data);
    }

    public function create(): View
    {
        $this->data['configuracao'] = Siteconfig::all();

        return view('painel.admin.categoria.create', $this->data);
    }

    public function store(StoreCategoria $request): RedirectResponse
    {
        Categoria::create($request->all());
        Alert::toast('Categoria Cadastrada com Sucesso!', 'success');

        return redirect()->route('categoria.index');
    }

    public function show(int $id): View|RedirectResponse
    {
        $configuracao = Siteconfig::all();
        if (! $categorias = Categoria::find($id)) {
            return redirect()->back();
        }

        return view('painel.admin.categoria.show', compact('categorias', 'configuracao'));
    }

    public function edit(int $id): View|RedirectResponse
    {
        $configuracao = Siteconfig::all();
        if (! $categorias = Categoria::find($id)) {
            return redirect()->back();
        }

        return view('painel.admin.categoria.edit', compact('categorias', 'configuracao'));
    }

    public function update(StoreCategoria $request, int $id): RedirectResponse
    {
        if (! $categorias = Categoria::find($id)) {
            return redirect()->back();
        }
        $categorias->update($request->all());
        Alert::toast('Categoria Atualizada!', 'warning');

        return redirect()->route('categoria.index');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $categorias = Categoria::findOrFail($request->categoria_id);
        $categorias->delete();
        Alert::toast('Categoria Deletada com Sucesso!', 'success');

        return redirect()->route('categoria.index');
    }
}
