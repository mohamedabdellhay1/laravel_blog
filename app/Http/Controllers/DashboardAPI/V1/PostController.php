<?php

namespace App\Http\Controllers\DashboardAPI\V1;

use App\Http\Resources\V1\PostResource;
use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StorePostRequest;
use App\Http\Requests\V1\UpdatePostRequest;

class PostController extends Controller
{

    public function index()
    {
        return Post::all();
    }


    public function create()
    {
        //
    }



    public function store(StorePostRequest $request)
    {
        return new PostResource(Post::create($request->all()));
    }


    public function show(Post $post)
    {
        return new PostResource($post);
    }

    public function edit(Post $post)
    {
        //
    }


    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->all());
    }


    public function destroy(Post $post)
    {
        return $post->delete();
    }
}