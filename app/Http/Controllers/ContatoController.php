<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContato;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Contato;
use App\Models\Siteconfig;
use App\Exports\ContatoExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ContatoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): View
    {
        $this->data['contatos']     = Contato::latest()->paginate(20);
        $this->data['configuracao'] = Siteconfig::all();

        return view('painel.admin.contato.index', $this->data);
    }

    public function search(Request $request): View
    {
        $search = $request->get('search');
        $this->data['search'] = Contato::where('nome', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->orWhere('telefone', 'like', '%' . $search . '%')
            ->orWhere('assunto', 'like', '%' . $search . '%')
            ->orWhere('mensagem', 'like', '%' . $search . '%')
            ->orWhere('situacao', 'like', '%' . $search . '%')
            ->orWhere('created_at', 'like', '%' . $search . '%')
            ->latest()->paginate(20)->appends(['search' => $search]);
        $this->data['configuracao'] = Siteconfig::all();

        return view('painel.admin.contato.pesquisa', $this->data);
    }

    public function create(): View
    {
        $this->data['configuracao'] = Siteconfig::all();

        return view('painel.admin.contato.create', $this->data);
    }

    public function store(StoreContato $request): RedirectResponse
    {
        Contato::create($request->only('nome', 'email', 'telefone', 'assunto', 'mensagem', 'situacao'));
        Alert::toast('Contato Cadastrado com Sucesso!', 'success');

        return redirect()->route('contato.index');
    }

    public function show(int $id): View|RedirectResponse
    {
        $configuracao = Siteconfig::all();
        if (! $contatos = Contato::find($id)) {
            return redirect()->back();
        }

        return view('painel.admin.contato.show', compact('contatos', 'configuracao'));
    }

    public function edit(int $id): View|RedirectResponse
    {
        $configuracao = Siteconfig::all();
        if (! $contatos = Contato::find($id)) {
            return redirect()->back();
        }

        return view('painel.admin.contato.edit', compact('contatos', 'configuracao'));
    }

    public function update(StoreContato $request, int $id): RedirectResponse
    {
        if (! $contatos = Contato::find($id)) {
            return redirect()->back();
        }
        $contatos->update($request->all());
        Alert::toast('Contato Atualizado!', 'warning');

        return redirect()->route('contato.index');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $contatos = Contato::findOrFail($request->contato_id);
        $contatos->delete();
        Alert::toast('Contato Deletado!', 'error');

        return redirect()->route('contato.index');
    }

    public function exportar(): BinaryFileResponse
    {
        return Excel::download(new ContatoExport, 'contato.xlsx');
    }
}
