<?php

namespace App\Http\Controllers\Api;

use App\Events\UserRegistered;
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
            $query->whereStartDate($request->get('startDate', ''));
            $query->whereEndDate($request->get('endDate', ''));
            $query->whereEmail($request->get('email', ''));
            $query->whereSortBy($request->get('sortBy', ''));
            $query->whereAuthors($request->get('authors', ''));

            return UserResource::collection($query
                ->groupBy('users.id')
                ->paginate(100));
        }

        public function show(User $user)
        {
            return new UserResource($user);
        }

        public function store(Request $request)
        {
            $user= new User();
            $user->name=$request->name;
            $user->first_name=$request->first_name;
            $user->last_name=$request->last_name;
            $user->email=$request->email;
            $user->password=$request->password;
            $user->total_posts=0;
            $user->save();
            if ($user){
                return response()->json('User created', 200);
            }
            else{
                return response()->json('Created user has been failed');
            }
        }

    }
