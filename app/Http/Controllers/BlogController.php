<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlog;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Blog;
use App\Models\Categoria;
use App\Models\Siteconfig;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except([]);
    }

    public function index(): View
    {
        $this->data['blogs']        = Blog::latest()->paginate(20);
        $this->data['cat']          = Categoria::all();
        $this->data['configuracao'] = Siteconfig::all();

        return view('painel.admin.blog.index', $this->data);
    }

    public function procurar(Request $request): View
    {
        $procurar = $request->get('procurar');
        $this->data['procurar']     = Blog::where('titulo', 'like', '%' . $procurar . '%')
            ->orWhere('texto', 'like', '%' . $procurar . '%')
            ->orWhere('descricao', 'like', '%' . $procurar . '%')
            ->latest()->paginate(20)->appends(['procurar' => $procurar]);
        $this->data['cat']          = Categoria::all();
        $this->data['configuracao'] = Siteconfig::all();

        return view('painel.admin.blog.pesquisa', $this->data);
    }

    public function create(): View
    {
        $configuracao = Siteconfig::all();
        $categorias   = Categoria::all();

        return view('painel.admin.blog.create', compact('categorias', 'configuracao'));
    }

    public function store(StoreBlog $request): RedirectResponse
    {
        $data = $request->all();
        if ($request->hasFile('img') && $request->img->isValid()) {
            $data['img'] = $request->img->store('uploads/blog');
        }
        if ($request->hasFile('img2') && $request->img2->isValid()) {
            $data['img2'] = $request->img2->store('uploads/blog');
        }
        if ($request->hasFile('img3') && $request->img3->isValid()) {
            $data['img3'] = $request->img3->store('uploads/blog');
        }
        Blog::create($data);
        Alert::toast('Post Cadastrado com Sucesso!', 'success');

        return redirect()->route('blog.index');
    }

    public function show(int $id): View|RedirectResponse
    {
        $configuracao = Siteconfig::all();
        if (! $blogs = Blog::find($id)) {
            return redirect()->back();
        }

        return view('painel.admin.blog.show', compact('blogs', 'configuracao'));
    }

    public function edit(int $id): View|RedirectResponse
    {
        $configuracao = Siteconfig::all();
        if (! $blogs = Blog::find($id)) {
            return redirect()->back();
        }

        return view('painel.admin.blog.edit')
            ->with('blogs', $blogs)
            ->with('configuracao', $configuracao)
            ->with('categorias', Categoria::all());
    }

    public function update(StoreBlog $request, int $id): RedirectResponse
    {
        if (! $blogs = Blog::find($id)) {
            return redirect()->back();
        }
        $data = $request->all();
        foreach (['img', 'img2', 'img3'] as $field) {
            if ($request->hasFile($field) && $request->$field->isValid()) {
                if ($blogs->$field && Storage::exists($blogs->$field)) {
                    Storage::delete($blogs->$field);
                }
                $data[$field] = $request->$field->store('uploads/blog');
            }
        }
        $blogs->update($data);
        Alert::toast('Post Atualizado!', 'warning');

        return redirect()->route('blog.index');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $blogs = Blog::findOrFail($request->blog_id);
        foreach (['img', 'img2', 'img3'] as $field) {
            if ($blogs->$field && Storage::exists($blogs->$field)) {
                Storage::delete($blogs->$field);
            }
        }
        $blogs->delete();
        Alert::toast('Post Deletado!', 'warning');

        return redirect()->route('blog.index');
    }
}
