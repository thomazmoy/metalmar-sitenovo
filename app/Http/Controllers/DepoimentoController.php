<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDepoimento;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Depoimento;
use App\Models\Siteconfig;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class DepoimentoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): View
    {
        $this->data['depoimentos']  = Depoimento::latest()->paginate(20);
        $this->data['configuracao'] = Siteconfig::all();

        return view('painel.admin.depoimento.index', $this->data);
    }

    public function create(): View
    {
        $this->data['configuracao'] = Siteconfig::all();

        return view('painel.admin.depoimento.create', $this->data);
    }

    public function store(StoreDepoimento $request): RedirectResponse
    {
        $data = $request->all();
        if ($request->hasFile('img') && $request->img->isValid()) {
            $data['img'] = $request->img->store('uploads/depoimento');
        }
        Depoimento::create($data);
        Alert::toast('Depoimento Cadastrado com Sucesso!', 'success');

        return redirect()->route('depoimento.index');
    }

    public function show(int $id): View|RedirectResponse
    {
        $configuracao = Siteconfig::all();
        if (! $depoimentos = Depoimento::find($id)) {
            return redirect()->back();
        }

        return view('painel.admin.depoimento.show', compact('depoimentos', 'configuracao'));
    }

    public function edit(int $id): View|RedirectResponse
    {
        $configuracao = Siteconfig::all();
        if (! $depoimentos = Depoimento::find($id)) {
            return redirect()->back();
        }

        return view('painel.admin.depoimento.edit', compact('depoimentos', 'configuracao'));
    }

    public function update(StoreDepoimento $request, int $id): RedirectResponse
    {
        if (! $depoimentos = Depoimento::find($id)) {
            return redirect()->back();
        }
        $data = $request->all();
        if ($request->hasFile('img') && $request->img->isValid()) {
            if ($depoimentos->img && Storage::exists($depoimentos->img)) {
                Storage::delete($depoimentos->img);
            }
            $data['img'] = $request->img->store('uploads/depoimento');
        }
        $depoimentos->update($data);
        Alert::toast('Depoimento Atualizado!', 'warning');

        return redirect()->route('depoimento.index');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $depoimentos = Depoimento::findOrFail($request->depoimento_id);
        if ($depoimentos->img && Storage::exists($depoimentos->img)) {
            Storage::delete($depoimentos->img);
        }
        $depoimentos->delete();
        Alert::toast('Depoimento Deletado!', 'warning');

        return redirect()->route('depoimento.index');
    }
}
