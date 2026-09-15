<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSiteconfig;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Siteconfig;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class SiteconfigController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): View
    {
        $this->data['siteconfigs']  = Siteconfig::latest()->paginate();
        $this->data['configuracao'] = Siteconfig::all();

        return view('painel.admin.siteconfig.index', $this->data);
    }

    public function create(): View
    {
        $this->data['configuracao'] = Siteconfig::all();

        return view('painel.admin.siteconfig.create', $this->data);
    }

    public function store(StoreSiteconfig $request): RedirectResponse
    {
        $data = $request->only('nomesite', 'descricao', 'palavraschave', 'endereco', 'email', 'celular', 'telefone',
            'linkendereco', 'iframemapa', 'facebook', 'instagram', 'whatsapp', 'twitter', 'linkedin',
            'youtube', 'facebookid', 'taghead', 'codchat');
        foreach (['logobranca', 'logoescura', 'favicon'] as $field) {
            if ($request->hasFile($field) && $request->$field->isValid()) {
                $data[$field] = $request->$field->store('uploads/siteconfig');
            }
        }
        Siteconfig::create($data);
        Alert::toast('Configurações Cadastradas com Sucesso!', 'success');

        return redirect()->route('siteconfig.index');
    }

    public function show(int $id): View|RedirectResponse
    {
        $configuracao = Siteconfig::all();
        if (! $siteconfigs = Siteconfig::find($id)) {
            return redirect()->back();
        }

        return view('painel.admin.siteconfig.show', compact('siteconfigs', 'configuracao'));
    }

    public function edit(int $id): View|RedirectResponse
    {
        $configuracao = Siteconfig::all();
        if (! $siteconfigs = Siteconfig::find($id)) {
            return redirect()->back();
        }

        return view('painel.admin.siteconfig.edit', compact('siteconfigs', 'configuracao'));
    }

    public function update(StoreSiteconfig $request, int $id): RedirectResponse
    {
        if (! $siteconfigs = Siteconfig::find($id)) {
            return redirect()->back();
        }
        $data = $request->all();
        foreach (['logobranca', 'logoescura', 'favicon'] as $field) {
            if ($request->hasFile($field) && $request->$field->isValid()) {
                if ($siteconfigs->$field && Storage::exists($siteconfigs->$field)) {
                    Storage::delete($siteconfigs->$field);
                }
                $data[$field] = $request->$field->store('uploads/siteconfig');
            }
        }
        $siteconfigs->update($data);
        Alert::toast('Configurações Atualizadas!', 'warning');

        return redirect()->route('siteconfig.index');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $siteconfigs = Siteconfig::findOrFail($request->siteconfig_id);
        foreach (['logobranca', 'logoescura', 'favicon'] as $field) {
            if ($siteconfigs->$field && Storage::exists($siteconfigs->$field)) {
                Storage::delete($siteconfigs->$field);
            }
        }
        $siteconfigs->delete();
        Alert::toast('Configurações Deletadas!', 'error');

        return redirect()->route('siteconfig.index');
    }
}
