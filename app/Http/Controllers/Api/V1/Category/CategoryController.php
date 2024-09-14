<?php

namespace App\Http\Controllers\Api\V1\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreUpdateCategoryRequest;
use App\Http\Resources\V1\CategoryResource;
use App\Models\Category;
use App\Responses\ApiResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return ApiResponse::success(CategoryResource::collection(Category::all()), true, 200);
    }

    public function show($id)
    {
        try {
            $categorie = Category::findOrFail($id);
            return ApiResponse::success(new CategoryResource($categorie), true, 200);
        } catch (ModelNotFoundException $e) {
            return ApiResponse::error("Failed to find category", 404);
        }
    }
    public function store(StoreUpdateCategoryRequest $request)
    {
        try {
            Category::create($request->all());
            return ApiResponse::Message("add categoire successful", true, 200);
        } catch (\Exception $e) {
            return ApiResponse::error($e->getMessage(), 500);
        }
    }

    public function update($id, StoreUpdateCategoryRequest $request)
    {
        try {
            $categorie = Category::findOrFail($id);
            $categorie->fill($request->all());
            $updated = $categorie->save();
            if ($updated) {
                ApiResponse::Message("The categoire has been updated successfully.", true, 200);
            } else {
                ApiResponse::error("Failed to update categoire. Please try again.'", 500);
            }
        } catch (ModelNotFoundException $e) {
            return ApiResponse::error("Failed to find category", 404);
        }
    }
}
