<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateFormRequest;
//use http\Client\Curl\User;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class UserController extends Controller
{

    public function index(Request $request)
    {
        if($request->has('startDate') || $request->has('endDate') || $request->has('email')) {
            $query = User::query();
            if($request->has('startDate')){
                $query->whereDate('created_at' ,'>=',$request->get('startDate'));
            }
            if($request->has('endDate')){
                $query->whereDate('created_at' ,'<=',$request->get('endDate'));
            }
            if($request->has('email')){
                $query->where('email' ,'like',$request->get('email').'%');
            }
            return UserResource::collection( $query->paginate(6));
        }else{

            return UserResource::collection(User::query()
                ->select([
                    'users.id',
                    'users.name',
                    'users.email',
                    'users.created_at',
                    'users.updated_at',
                    DB::raw('count(posts.id) as posts_count')
                ])
                ->join('posts','posts.user_id','=', 'users.id')
                ->groupBy('posts.user_id')
                ->paginate(6));
        }
    }

    public function show(User $user)
    {
        return new UserResource($user);
    }

}
