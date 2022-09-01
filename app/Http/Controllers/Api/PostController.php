<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SavePostRequest;
use App\Http\Requests\UpdateFormRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {

//        if($request->has('title') || $request->has('text')){
            $query = Post::query();
            $query->whereTitle($request->get('title', ''));
            $query->whereText($request->get('text', ''));
            $query->whereId($request->get('id', ''));
            return PostResource::collection( $query->paginate(6));
//        }else{
//            return PostResource::collection( Post::paginate(6));
//        }
    }

    public function show(Post $post)
    {
        return new PostResource($post);
    }

    public function store(Request $request)
    {
        $post= new Post ();
        $post->title=$request->title;
        $post->text=$request->text;
        $post->user_id=$request->user_id;
        $post->save();
        if ($request->has('tag')){
            $post->applyTagByName($request->get('tag'));
        }
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
        if ($request->has('tag')){
            $post->applyTagByName($request->get('tag'));
        }

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

    public function my(Request $request)
    {
        $query = Post::query();
        $query->whereUserAuth();
        return PostResource::collection( $query->paginate(6));
    }

    public function search(Request $request)
    {
        $query = Post::query();
        $query->whereUserAuth($request->get('userId'));
        return PostResource::collection( $query->paginate(6));
    }
}
