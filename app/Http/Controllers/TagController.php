<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveTagRequest;
use App\Http\Requests\UpdateFormRequest;
use App\Models\Tag;
use Illuminate\Contracts\View\View;
//use Illuminate\Http\Request;
use DB;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::paginate(6);
        return view('tags.index', [
            'tags'=>$tags,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag): View
    {
        return view('tags.show', ['tag' => $tag]);
    }

}
