<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->get();
        return view('admin.article.index',[
            'articles' => $articles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.article.create',[
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $article = new Article();
        $article->title = $request->title;
        $article->slug = Str::slug($request->title);
        $article->content = $request->content;
        $article->meta_keywords = $request->meta_keywords;
        $article->meta_description = $request->meta_description;
        $file = $request->image;
        if ($file) {
            $file_name = time() . '.' . $file->getClientOriginalExtension();
            $file->move('article', $file_name);
            $article->image = $file_name;
        }
        $article->save();
        $article->categories()->attach($request->categories);
        return redirect()->route( 'article.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = Article::findOrFail($id);
        $categories = Category::all();
        return view('admin.article.edit', [
            'article' => $article,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $article = Article::find($id);
        $article->title = $request->title;
        $article->slug = Str::slug($request->title);
        $article->content = $request->content;
        $article->meta_keywords = $request->meta_keywords;
        $article->meta_description = $request->meta_description;
        $file = $request->image;
        if ($file) {
            $file_name = time() . '.' . $file->getClientOriginalExtension();
            $file->move('article', $file_name);
            $article->image = $file_name;
        }
        $article->status = $request->status;
        $article->save();
        $article->categories()->sync($request->categories);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        $article->categories()->detach();
        if (file_exists(public_path('article/' . $article->image))) {
            unlink(public_path('article/' . $article->image));
        }
        return redirect()->back();
    }
}
