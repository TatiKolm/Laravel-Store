<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;

class ArticleController extends Controller
{
    public function index()
    {
        return view('articles.articles-list', [
            'articles' => Article::all()
        ]);
    }

    public function create()
    {
        return view("articles.article-create", [
            'categories' => Category::all()->sortBy('name')
        ]); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'category' => ['required']
        ]);
        
        $article=Article::add($request->all());
        $article->uploadImage($request->file('image'));

        return redirect()->route('articles.index');
    }

    public function edit($articleId)
    {
        return view('articles.article-edit', [
            'categories' => Category::all()->sortBy("name"),
            'article' => Article::find($articleId)
        ]);
    }

    public function update(Request $request, $articleId)
    {
        $request->validate([
            'title' => 'required|min:3|max:255',
            'category' => 'required'
        ]);

        $article = Article::find($articleId);
        $article->update([
            'title' => $request->input("title"),
            'content' => $request->input("text"),
            'category_id' => $request->input("category"),
            'is_published' => $request->input("is_published"),
        ]);

        $article->uploadImage($request->file("image"));

        return redirect()->route("articles.index")->with('success', 'Новость успешно обновлена');
    }

    public function delete($articleId)
    {
        Article::find($articleId)->delete();
        return back();
    }

    public function show($articleSlug)
    {
        return view("articles.article-show", [
            'article' => Article::where("slug", $articleSlug)->first()
        ]);
    }

    public function removeImage($articleId)
    {
        Article::find($articleId)->removeImage();
        return back();
        
    }

    public function main()
    {
        return view('main', [
            'articles' => Article::all()
        ]);
    }
}
