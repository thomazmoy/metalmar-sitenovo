<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSolucao;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Solucao;
use App\Models\Siteconfig;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class SolucaoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): View
    {
        $this->data['solucoes']     = Solucao::paginate(20);
        $this->data['configuracao'] = Siteconfig::all();

        return view('painel.admin.solucao.index', $this->data);
    }

    public function pesquisa(Request $request): View
    {
        $pesquisa = $request->get('pesquisa');
        $this->data['pesquisa'] = Solucao::where('titulo', 'like', '%' . $pesquisa . '%')
            ->orWhere('texto', 'like', '%' . $pesquisa . '%')
            ->orWhere('descricao', 'like', '%' . $pesquisa . '%')
            ->latest()->paginate(20)->appends(['pesquisa' => $pesquisa]);
        $this->data['configuracao'] = Siteconfig::all();

        return view('painel.admin.solucao.pesquisa', $this->data);
    }

    public function create(): View
    {
        $this->data['configuracao'] = Siteconfig::all();

        return view('painel.admin.solucao.create', $this->data);
    }

    public function store(StoreSolucao $request): RedirectResponse
    {
        $data = $request->all();
        foreach (['img', 'img2', 'img3'] as $field) {
            if ($request->hasFile($field) && $request->$field->isValid()) {
                $data[$field] = $request->$field->store('uploads/solucao');
            }
        }
        Solucao::create($data);
        Alert::toast('Solução Cadastrada com Sucesso!', 'success');

        return redirect()->route('solucao.index');
    }

    public function show(int $id): View|RedirectResponse
    {
        $configuracao = Siteconfig::all();
        if (! $solucoes = Solucao::find($id)) {
            return redirect()->back();
        }

        return view('painel.admin.solucao.show', compact('solucoes', 'configuracao'));
    }

    public function edit(int $id): View|RedirectResponse
    {
        $configuracao = Siteconfig::all();
        if (! $solucoes = Solucao::find($id)) {
            return redirect()->back();
        }

        return view('painel.admin.solucao.edit', compact('solucoes', 'configuracao'));
    }

    public function update(StoreSolucao $request, int $id): RedirectResponse
    {
        if (! $solucoes = Solucao::find($id)) {
            return redirect()->back();
        }
        $data = $request->all();
        foreach (['img', 'img2', 'img3'] as $field) {
            if ($request->hasFile($field) && $request->$field->isValid()) {
                if ($solucoes->$field && Storage::exists($solucoes->$field)) {
                    Storage::delete($solucoes->$field);
                }
                $data[$field] = $request->$field->store('uploads/solucao');
            }
        }
        $solucoes->update($data);
        Alert::toast('Solução Atualizada!', 'warning');

        return redirect()->route('solucao.index');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $solucoes = Solucao::findOrFail($request->solucao_id);
        foreach (['img', 'img2', 'img3'] as $field) {
            if ($solucoes->$field && Storage::exists($solucoes->$field)) {
                Storage::delete($solucoes->$field);
            }
        }
        $solucoes->delete();
        Alert::toast('Solução Deletada!', 'error');

        return redirect()->route('solucao.index');
    }
}
