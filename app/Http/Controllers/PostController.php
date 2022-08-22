<?php

namespace App\Http\Controllers;

use App\Http\Requests\SavePostRequest;
use App\Http\Requests\UpdateFormRequest;
use App\Models\Post;
use Illuminate\Contracts\View\View;
//use Illuminate\Http\Request;
use DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(6);
        return view('posts.index', [
            'posts'=>$posts,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post): View
    {
        return view('posts.show', ['post' => $post]);
    }

}
