<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class GoogleTranslateController extends Controller
{
    public function googleTranslate(): View
    {
        return view('translate');
    }

    public function googleTranslateChange(Request $request): RedirectResponse
    {
        $allowedLocales = ['pt-BR', 'en', 'es'];
        $lang = $request->input('lang', $request->query('lang', 'pt-BR'));

        if (!in_array($lang, $allowedLocales, true)) {
            $lang = 'pt-BR';
        }

        App::setLocale($lang);
        Session::put('locale', $lang);

        return redirect()->back();
    }
}
