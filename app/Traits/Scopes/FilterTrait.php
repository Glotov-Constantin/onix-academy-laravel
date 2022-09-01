<?php


namespace App\Traits\Scopes;


use App\Models\User;
use Illuminate\Database\Query\Builder;

trait FilterTrait
{

    /**
     * @param Builder $query
     * @param null|integer $id
     */

    public function scopeWhereUserAuth($query, $userId){
        if (empty($userId) && !is_numeric($userId)){
            $user=\Auth::user();
            $userId=$user->id;
        }
        if(!empty($userId)){
            $query->where('user_id' ,(int)$userId);
        }

    }

}
