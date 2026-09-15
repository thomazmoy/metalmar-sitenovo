<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siteconfig;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): View
    {
        $this->data['configuracao'] = Siteconfig::all();

        return view('painel.admin.dashboard', $this->data);
    }
    public function toggleSituacao(Request $request)
    {
        $model = $request->input('model');
        $id = $request->input('id');
        $situacao = (string) $request->input('situacao');

        $modelClass = '\\App\\Models\\' . $model;

        if (class_exists($modelClass)) {
            $item = $modelClass::find($id);
            if ($item) {
                $item->situacao = $situacao;
                $item->save();
                return response()->json(['success' => true]);
            }
        }

        return response()->json(['success' => false], 400);
    }
}
