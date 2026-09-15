<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePrivacidade;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Privacidade;
use App\Models\Siteconfig;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PrivacidadeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): RedirectResponse
    {
        return redirect()->route('privacidade.edit', 1);
    }

    public function create(): View
    {
        $this->data['configuracao'] = Siteconfig::all();

        return view('painel.admin.privacidade.create', $this->data);
    }

    public function store(StorePrivacidade $request): RedirectResponse
    {
        Privacidade::create($request->all());
        Alert::toast('Privacidade Cadastrada com Sucesso!', 'success');

        return redirect()->back();
    }

    public function show(int $id): View|RedirectResponse
    {
        $configuracao = Siteconfig::all();
        if (! $privacidades = Privacidade::find($id)) {
            return redirect()->back();
        }

        return view('painel.admin.privacidade.show', compact('privacidades', 'configuracao'));
    }

    public function edit(int $id): View|RedirectResponse
    {
        $configuracao = Siteconfig::all();
        if (! $privacidades = Privacidade::find($id)) {
            return redirect()->back();
        }

        return view('painel.admin.privacidade.edit', compact('privacidades', 'configuracao'));
    }

    public function update(StorePrivacidade $request, int $id): RedirectResponse
    {
        if (! $privacidades = Privacidade::find($id)) {
            return redirect()->back();
        }
        $privacidades->update($request->all());
        Alert::toast('Privacidade Atualizada!', 'warning');

        return redirect()->back();
    }

    public function destroy(Request $request): RedirectResponse
    {
        $privacidades = Privacidade::findOrFail($request->privacidade_id);
        $privacidades->delete();
        Alert::toast('Privacidade Deletada!', 'error');

        return redirect()->route('privacidade.index');
    }
}
