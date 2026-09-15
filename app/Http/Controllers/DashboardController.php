<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siteconfig;
use Illuminate\View\View;

use Illuminate\Http\JsonResponse;

class DashboardController extends Controller
{
    /**
     * Models autorizadas para alternância de situação.
     */
    protected const ALLOWED_MODELS = [
        'Banner',
        'Blog',
        'Categoria',
        'Depoimento',
        'Galeria',
        'Privacidade',
        'Quemsomos',
        'Solucao',
    ];

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): View
    {
        $configuracao = Siteconfig::all();

        return view('painel.admin.dashboard', compact('configuracao'));
    }

    public function toggleSituacao(Request $request): JsonResponse
    {
        $model = (string) $request->input('model');
        $id = $request->input('id');
        $situacao = (string) $request->input('situacao');

        if (!in_array($model, self::ALLOWED_MODELS, true)) {
            return response()->json(['success' => false, 'error' => 'Model não autorizada.'], 403);
        }

        $modelClass = '\\App\\Models\\' . $model;

        if (class_exists($modelClass)) {
            $item = $modelClass::find($id);
            if ($item) {
                $item->situacao = $situacao;
                $item->save();
                return response()->json(['success' => true]);
            }
        }

        return response()->json(['success' => false, 'error' => 'Registro não encontrado.'], 404);
    }
}
