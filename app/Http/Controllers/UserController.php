<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateFormRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function profile(){
        echo 'Profile method';
    }

    public function update(UpdateFormRequest $request)
    {
        $validated = $request->validated();
        if (!empty($validated['errors'])){
            return response($validated['errors'],422);
        }
        // The blog post is valid...
    }



}
