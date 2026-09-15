<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGaleria;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Galeria;
use App\Models\Siteconfig;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class GaleriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): View
    {
        $this->data['galerias']     = Galeria::latest()->paginate(10);
        $this->data['configuracao'] = Siteconfig::all();

        return view('painel.admin.galeria.index', $this->data);
    }

    public function create(): View
    {
        $this->data['configuracao'] = Siteconfig::all();

        return view('painel.admin.galeria.create', $this->data);
    }

    public function store(StoreGaleria $request): RedirectResponse
    {
        $data = $request->all();
        if ($request->hasFile('img') && $request->img->isValid()) {
            $data['img'] = $request->img->store('uploads/galeria');
        }
        Galeria::create($data);
        Alert::toast('Imagem Cadastrada com Sucesso!', 'success');

        return redirect()->route('galeria.index');
    }

    public function show(int $id): View|RedirectResponse
    {
        $configuracao = Siteconfig::all();
        if (! $galerias = Galeria::find($id)) {
            return redirect()->back();
        }

        return view('painel.admin.galeria.show', compact('galerias', 'configuracao'));
    }

    public function edit(int $id): View|RedirectResponse
    {
        $configuracao = Siteconfig::all();
        if (! $galerias = Galeria::find($id)) {
            return redirect()->back();
        }

        return view('painel.admin.galeria.edit', compact('galerias', 'configuracao'));
    }

    public function update(StoreGaleria $request, int $id): RedirectResponse
    {
        if (! $galerias = Galeria::find($id)) {
            return redirect()->back();
        }
        $data = $request->all();
        if ($request->hasFile('img') && $request->img->isValid()) {
            if ($galerias->img && Storage::exists($galerias->img)) {
                Storage::delete($galerias->img);
            }
            $data['img'] = $request->img->store('uploads/galeria');
        }
        $galerias->update($data);
        Alert::toast('Imagem Atualizada!', 'warning');

        return redirect()->route('galeria.index');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $galerias = Galeria::findOrFail($request->galeria_id);
        if ($galerias->img && Storage::exists($galerias->img)) {
            Storage::delete($galerias->img);
        }
        $galerias->delete();
        Alert::toast('Imagem Deletada!', 'warning');

        return redirect()->route('galeria.index');
    }
}
