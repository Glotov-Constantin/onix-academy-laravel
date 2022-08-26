<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SavePostRequest;
use App\Http\Requests\UpdateFormRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
//        return response()->json(Post::all(), 200);

        if($request->has('title') || $request->has('text')){
            $query = Post::query();
            if($request->has('title')){
                $query->where('title' ,'like','%'.$request->get ('title').'%');
            }
            if($request->has('text')){
                $query->where('text' ,'like','%'.$request->get ('text').'%');
            }
            return PostResource::collection( $query->paginate(6));
        }else{
            return PostResource::collection( Post::paginate(6));
        }
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
//        $post->id=$request->id;

        $post->save();
        if ($request->has('tag')){
//            $tag=new Tag();
//            $tag->name=$request->get('tag');
//            $post->tags()->save($tag);
            $post->applyTagByName($request->get('tag'));
        }
//        $post->save();
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
//        $post->id=$request->id;
        if ($request->has('tag')){
            $post->applyTagByName($request->get('tag'));
//            if($post->tags()->count()==0){
//                $tag=new Tag();
////                var_dump($post->tags); die ();
//                $tag->name=$request->get('tag');
//                $post->tags()->save($tag);
//            } else{
//                foreach ($post->tags as $tag){
//                    $tag->name=$request->get('tag');
//                    $tag->save();
//                    break;
//                }
////                $post->tags->name=$request->get('tag');
////                $post->tags()->save();
//            }
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
}
