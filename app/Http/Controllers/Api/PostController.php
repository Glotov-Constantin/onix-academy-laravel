<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SavePostRequest;
use App\Http\Requests\UpdateFormRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return response()->json(Post::all(), 200);
    }

    public function show(Post $post)
    {
        return response()->json($post, 200);
    }

    public function store(Request $request)
    {
        $post= new Post ();
        $post->title=$request->title;
        $post->text=$request->text;
        $post->id=$request->id;
        $post->save();
        if ($post){
            return response()->json('Post created', 200);
        }
        else{
            return response()->json('Created post has been failed');
        }
    }

    public function update(Request $request)
    {
        $post=Post::find($request->id);
        $post->title=$request->title;
        $post->text=$request->text;
        $post->id=$request->id;
        $post->save();
        if ($post){
            return response()->json('Post updated', 200);
        }
        else{
            return response()->json('Update has been failed');
        }
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json('The post was deleted', 200);
    }
}
