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
        $query = User::query()->select([
            'users.id',
            'users.name',
            'users.email',
            'users.created_at',
            'users.updated_at',
            DB::raw('count(posts.id) posts_count')
        ])
            ->leftJoin('posts','posts.user_id','=', 'users.id');

            if($request->has('startDate')){
                $query->whereDate('created_at' ,'>=',$request->get('startDate'));
            }
            if($request->has('endDate')){
                $query->whereDate('created_at' ,'<=',$request->get('endDate'));
            }
            if($request->has('email')){
                $query->where('email' ,'like',$request->get('email').'%');
            }
            if($request->has('sortBy')){
                if ($request->get('sortBy') == 'top'){
                    $query->orderBy('posts_count', 'DESC');
                }
            }
            if($request->has('authors')){
                if ($request->get('authors') == 'true'){
                    $query->having('posts_count', '>',0);
                }
            }

    $res = $query

            ->groupBy('users.id')
            ->paginate(100);

            return UserResource::collection($res);
    //                ->sortBy('posts_count'));
        }

        public function show(User $user)
        {
            return new UserResource($user);
        }

    }
