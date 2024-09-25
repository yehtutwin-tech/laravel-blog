<?php
// app/Http/Controllers/API/ArticleController.php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleCollection;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::paginate(2);
        // $articles = Article::withTrashed()->paginate(2);

        return response()->json(
            // $articles,
            new ArticleCollection($articles),
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = validator(
            request()->all(),
            [
                'title' => 'required|max:255',
                'body' => 'required',
                'category_id' => 'required',
            ],
        );

        if ($validator->fails()) {
            return response()->json(
                ['errors' => $validator->errors()],
                200,
            );
        }

        // create new article
        $article = new Article();
        $article->title = request()->title;
        $article->body = request()->body;
        $article->category_id = request()->category_id;
        $article->save();

        return response()->json($article, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = Article::find($id);

        if (!$article) {
            return response()->json(
                ['message' => 'Not found!'],
                404
            );
        }

        return response()->json(
            // $article,
            new ArticleResource($article),
            200
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $article = Article::find($id);

        if (!$article) {
            return response()->json(
                ['message' => 'Not found!'],
                404
            );
        }

        $validator = validator(
            request()->all(),
            [
                'title' => 'required|max:255',
                'body' => 'required',
                'category_id' => 'required',
            ],
        );

        if ($validator->fails()) {
            return response()->json(
                ['errors' => $validator->errors()],
                200,
            );
        }

        // create new article
        $article->title = request()->title;
        $article->body = request()->body;
        $article->category_id = request()->category_id;
        $article->save();

        return response()->json($article, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::find($id);

        if (!$article) {
            return response()->json(
                ['message' => 'Not found!'],
                404
            );
        }

        $article->delete();

        return response()->json(
            ['message' => 'Successfully Deleted!'],
            200
        );
    }
}
