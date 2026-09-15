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
        App::setLocale($request->lang);
        Session::put('locale', $request->lang);

        return redirect()->back();
    }
}
