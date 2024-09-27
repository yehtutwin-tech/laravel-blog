<?php

namespace App\Http\Controllers;

use App\Events\NotificationEvent;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(10);
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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

        broadcast(new NotificationEvent('New category created!'));

        return response()->json($category, 201);
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
        return view('categories.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
