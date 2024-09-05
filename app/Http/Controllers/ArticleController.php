<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        // $articles = [
        //     ['id' => 1, 'title' => 'First Article'],
        //     ['id' => 2, 'title' => 'Second Article'],
        //     ['id' => 3, 'title' => 'Third Article'],
        // ];

        $articles = Article::latest()->paginate(2);

        $foo = 'bar';

        // return view('articles.index', [
        //     'articles' => $articles,
        //     'foo' => $foo,
        // ]);

        // return view('articles.index')
        //     ->with('articles', $articles)
        //     ->with('foo', $foo);

        return view('articles.index', compact('articles', 'foo'));
    }

    public function show($id)
    {
        $article = Article::find($id);

        // dd($article->comments);

        return view('articles.show', compact('article'));
    }

    public function create()
    {
        // $categories = [
        //     ['id' => 1, 'name' => 'cat1'],
        //     ['id' => 2, 'name' => 'cat2'],
        // ];
        $categories = Category::all();

        return view('articles.create', compact('categories'));
    }

    public function store()
    {
        $validator = validator(
            request()->all(),
            [
                'title' => 'required',
                'body' => 'required',
                'category_id' => 'required',
            ],
        );

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput()
            ;
        }

        // store into db
        $article = new Article();
        $article->title = request()->title;
        $article->body = request()->body;
        $article->category_id = request()->category_id;
        $article->save();

        return redirect('articles');
    }

    public function delete($id)
    {
        $article = Article::find($id);
        $article->delete();

        return redirect('articles')
            ->with('info', 'An article has been deleted!')
        ;
    }
}
