<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuemsomos;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Quemsomos;
use App\Models\Siteconfig;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class QuemsomosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): RedirectResponse
    {
        return redirect()->route('quemsomos.edit', 1);
    }

    public function create(): View
    {
        $this->data['configuracao'] = Siteconfig::all();

        return view('painel.admin.quemsomos.create', $this->data);
    }

    public function store(StoreQuemsomos $request): RedirectResponse
    {
        $data = $request->all();
        foreach (['imgum', 'imgdois', 'imgtres'] as $field) {
            if ($request->hasFile($field) && $request->$field->isValid()) {
                $data[$field] = $request->$field->store('uploads/quemsomos');
            }
        }
        Quemsomos::create($data);
        Alert::toast('Quem Somos Cadastrado com Sucesso!', 'success');

        return redirect()->back();
    }

    public function show(int $id): View|RedirectResponse
    {
        $configuracao = Siteconfig::all();
        if (! $quemsomos = Quemsomos::find($id)) {
            return redirect()->back();
        }

        return view('painel.admin.quemsomos.show', compact('quemsomos', 'configuracao'));
    }

    public function edit(int $id): View|RedirectResponse
    {
        $configuracao = Siteconfig::all();
        if (! $quemsomos = Quemsomos::find($id)) {
            return redirect()->back();
        }

        return view('painel.admin.quemsomos.edit', compact('quemsomos', 'configuracao'));
    }

    public function update(StoreQuemsomos $request, int $id): RedirectResponse
    {
        if (! $quemsomos = Quemsomos::find($id)) {
            return redirect()->back();
        }
        $data = $request->all();
        foreach (['imgum', 'imgdois', 'imgtres'] as $field) {
            if ($request->hasFile($field) && $request->$field->isValid()) {
                if ($quemsomos->$field && Storage::exists($quemsomos->$field)) {
                    Storage::delete($quemsomos->$field);
                }
                $data[$field] = $request->$field->store('uploads/quemsomos');
            }
        }
        $quemsomos->update($data);
        Alert::toast('Quem Somos Atualizado!', 'warning');

        return redirect()->back();
    }

    public function destroy(Request $request): RedirectResponse
    {
        $quemsomos = Quemsomos::findOrFail($request->sobre_id);
        foreach (['imgum', 'imgdois', 'imgtres'] as $field) {
            if ($quemsomos->$field && Storage::exists($quemsomos->$field)) {
                Storage::delete($quemsomos->$field);
            }
        }
        $quemsomos->delete();
        Alert::toast('Quem Somos Deletado!', 'error');

        return redirect()->route('quemsomos.index');
    }
}
