<?php
// app/Http/Controllers/API/CategoryController.php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $categories = Category::all();

        // $categories = Category::select('id', 'name')
        //     ->get();

        // $categories = Category::with('articles:id,category_id,title')
        //     ->select('id', 'name')
        //     ->get();

        $categories = Category::with('latestArticle')
            ->select('id', 'name')
            ->get();

        return response()->json($categories, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = validator(
            request()->all(),
            [
                'name' => 'required|max:255',
            ],
        );

        if ($validator->fails()) {
            return response()->json(
                ['errors' => $validator->errors()],
                200,
            );
        }

        // create new category
        $category = new Category();
        $category->name = request()->name;
        $category->save();

        return response()->json($category, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(
                ['message' => 'Not found!'],
                404
            );
        }

        return response()->json($category, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(
                ['message' => 'Not found!'],
                404
            );
        }

        $validator = validator(
            request()->all(),
            [
                'name' => 'required|max:255',
            ],
        );

        if ($validator->fails()) {
            return response()->json(
                ['errors' => $validator->errors()],
                200,
            );
        }

        // create new category
        $category->name = request()->name;
        $category->save();

        return response()->json($category, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(
                ['message' => 'Not found!'],
                404
            );
        }

        $category->delete();

        return response()->json(
            ['message' => 'Successfully Deleted!'],
            200
        );
    }
}
