<?php

namespace App\Http\Controllers\DashboardAPI\V1;

use App\Http\Resources\V1\CategoryResource;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreCategoryRequest;
use App\Http\Requests\V1\UpdateCategoryRequest;


class CategoryController extends Controller
{

    public function index()
    {
        return Category::all();
    }


    public function create()
    {
        //
    }


    public function store(StoreCategoryRequest $request)
    {
        return new CategoryResource(Category::create($request->all()));
    }


    public function show(Category $category)
    {
        return new CategoryResource($category);
    }


    public function edit(Category $category)
    {
        //
    }


    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->all());
    }


    public function destroy(Category $category)
    {
        return $category->delete();
    }
}