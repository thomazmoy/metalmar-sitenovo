<?php

namespace App\Http\Controllers;

use App\Models\Traducao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use RealRashid\SweetAlert\Facades\Alert;

class TraducaoController extends Controller
{
    public function index(Request $request)
    {
        $query = Traducao::query();

        if ($request->filled('pesquisar')) {
            $query->where('chave_pt', 'LIKE', '%' . $request->pesquisar . '%');
        }

        $traducoes = $query->orderBy('id', 'desc')->paginate(30);

        return view('painel.traducoes.index', compact('traducoes'));
    }

    public function update(Request $request)
    {
        $dados = $request->input('traducoes');

        if ($dados && is_array($dados)) {
            foreach ($dados as $id => $tr) {
                $traducao = Traducao::find($id);
                if ($traducao) {
                    $traducao->valor_en = $tr['en'];
                    $traducao->valor_es = $tr['es'];
                    $traducao->save();

                    // Limpa o cache dessa tradução
                    Cache::forget('traducao_' . $traducao->hash_pt);
                }
            }
        }

        Alert::success('Sucesso!', 'Traduções salvas com sucesso!');
        return redirect()->route('admin.traducoes.index');
    }
}
