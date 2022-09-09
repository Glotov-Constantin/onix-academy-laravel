<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
/**
 * @property Post[]|Collection $posts
*/
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

//    protected static function boot(){
//        User::observe(UserObserver);
//    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts(){
        return $this->hasMany(Post::class);
    }

    /**
     * @param Builder $query
     * @param $startDate
     */

    public function scopeWhereStartDate($query, $startDate){
        if(!empty($startDate) && is_string($startDate)){
            $query->whereDate('users.created_at' ,'>=', $startDate);
        }
    }

    /**
     * @param Builder $query
     * @param $endDate
     */

    public function scopeWhereEndDate($query, $endDate){
        if(!empty($endDate) && is_string($endDate)){
            $query->whereDate('users.updated_at' ,'<=', $endDate);
        }
    }

    /**
     * @param Builder $query
     * @param $email
     */

    public function scopeWhereEmail($query, $email){
        if(!empty($email) && is_string($email)){
            $query->where('users.email' ,'like',$email.'%');
        }
    }

    /**
     * @param Builder $query
     * @param $sortBy
     */

    public function scopeWhereSortBy($query, $sortBy){
            if ($sortBy == 'top'){
                $query->orderBy('posts_count', 'DESC');
        }

    }

    /**
     * @param Builder $query
     * @param $authors
     */

    public function scopeWhereAuthors($query, $authors){
        if ($authors == 'true'){
            $query->having('posts_count', '>',0);
        }

    }

    public function getFullNameAttribute(){
        return $this->name;
    }

    public function setFullNameAttribute($value){
        $this->name = $value;
    }

}


