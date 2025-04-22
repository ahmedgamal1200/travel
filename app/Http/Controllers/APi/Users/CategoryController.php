<?php

namespace App\Http\Controllers\APi\Users;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $categories =  CategoryResource::collection(Category::query()->paginate(10));

        return response()->json([
            'message' => 'All Categories Get Successfully',
            'categories' => $categories,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $category = Category::query()->find($id);
        return response()->json([
            'message' => 'Category Get Successfully',
            'category' => new CategoryResource($category),
        ]);

    }
}
