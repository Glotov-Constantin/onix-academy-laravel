<?php

namespace App\Http\Controllers;

use App\Http\Requests\SavePostRequest;
use App\Http\Requests\UpdateFormRequest;
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
        return view('posts.index', [
            'posts'=>Post::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\PostStoreUpdateFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SavePostRequest $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\PostStoreUpdateFormRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(SavePostRequest $request, Post $post)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
    }

    /**
     * @return View
     */
    public function create(): View{
        return view('post.create');
    }
}
