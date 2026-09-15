<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBanner;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Banner;
use App\Models\Siteconfig;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class BannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): View
    {
        $this->data['banners']      = Banner::latest()->paginate(20);
        $this->data['configuracao'] = Siteconfig::all();

        return view('painel.admin.banner.index', $this->data);
    }

    public function create(): View
    {
        $this->data['configuracao'] = Siteconfig::all();

        return view('painel.admin.banner.create', $this->data);
    }

    public function store(StoreBanner $request): RedirectResponse
    {
        $data = $request->only('titulo', 'linkbanner');
        if ($request->hasFile('imgbanner') && $request->imgbanner->isValid()) {
            $data['imgbanner'] = $request->imgbanner->store('uploads/banner');
        }
        if ($request->hasFile('imgmobile') && $request->imgmobile->isValid()) {
            $data['imgmobile'] = $request->imgmobile->store('uploads/banner');
        }
        Banner::create($data);
        Alert::toast('Banner Cadastrado com Sucesso!', 'success');

        return redirect()->route('banner.index');
    }

    public function show(int $id): View|RedirectResponse
    {
        $configuracao = Siteconfig::all();
        if (! $banners = Banner::find($id)) {
            return redirect()->back();
        }

        return view('painel.admin.banner.show', compact('banners', 'configuracao'));
    }

    public function edit(int $id): View|RedirectResponse
    {
        $configuracao = Siteconfig::all();
        if (! $banners = Banner::find($id)) {
            return redirect()->back();
        }

        return view('painel.admin.banner.edit', compact('banners', 'configuracao'));
    }

    public function update(StoreBanner $request, int $id): RedirectResponse
    {
        if (! $banners = Banner::find($id)) {
            return redirect()->back();
        }
        $data = $request->all();
        if ($request->hasFile('imgbanner') && $request->imgbanner->isValid()) {
            if ($banners->imgbanner && Storage::exists($banners->imgbanner)) {
                Storage::delete($banners->imgbanner);
            }
            $data['imgbanner'] = $request->imgbanner->store('uploads/banner');
        }
        if ($request->hasFile('imgmobile') && $request->imgmobile->isValid()) {
            if ($banners->imgmobile && Storage::exists($banners->imgmobile)) {
                Storage::delete($banners->imgmobile);
            }
            $data['imgmobile'] = $request->imgmobile->store('uploads/banner');
        }
        $banners->update($data);
        Alert::toast('Banner Atualizado!', 'warning');

        return redirect()->route('banner.index');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $banners = Banner::findOrFail($request->banner_id);
        if ($banners->imgbanner && Storage::exists($banners->imgbanner)) {
            Storage::delete($banners->imgbanner);
        }
        if ($banners->imgmobile && Storage::exists($banners->imgmobile)) {
            Storage::delete($banners->imgmobile);
        }
        $banners->delete();
        Alert::toast('Banner Deletado!', 'error');

        return redirect()->route('banner.index');
    }
}
