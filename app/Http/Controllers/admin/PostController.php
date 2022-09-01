<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DestroyPostRequest;
use App\Http\Requests\SavePostRequest;
use App\Http\Requests\UpdateFormRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Contracts\View\View;
//use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(10);
        return view('admin.posts.index', [
            'posts'=>$posts,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\SavePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SavePostRequest $request)
    {
        $data = $request->validated();

        $post = new Post();
        $post->title = $data['title'];
        $post->text = $data['text'];
        $post->save();

        return redirect('/admin/posts/'.$post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post): View
    {
        return view('admin.posts.update', ['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\SavePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(SavePostRequest $request, Post $post)
    {
//        return $post->id;
        $data = $request->validated();
        $post->title = $data['title'];
        $post->text = $data['text'];
        $post->save();
        return redirect('/admin/posts/'.$post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/admin/posts/');
    }

    /**
     * @return View
     */
    public function create(){
        return view('admin.posts.create');
    }


}
