<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SavePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show(Post $post)
    {
        return response()->json($post, 200);
    }

    public function store(SavePostRequest $request)
    {
        $data = $request->validated();

        $post = new Post();
        $post->title = $data['title'];
        $post->text = $data['text'];
        $post->save();

        return response()->json($post, 200);
    }

    public function update(SavePostRequest $request, Post $post)
    {
        $data = $request->validated();
        $post->title = $data['title'];
        $post->text = $data['text'];
        $post->save();
        return response()->json($post, 200);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json('The post was deleted', 200);
    }
}
