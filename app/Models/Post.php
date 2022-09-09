<?php

namespace App\Models;

use App\Traits\Scopes\FilterTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Query\Builder;
use phpDocumentor\Reflection\Types\String_;

/**
 * @property User $user
 * @property integer $user_id
 */

class Post extends Model
{
    use FilterTrait;
    use HasFactory;
    function user(){
        return $this->belongsTo(User::class);
    }

    public function tags():BelongsToMany{
        return $this->belongsToMany(Tag::class, PostTag::class);
    }

    public function applyTag(Tag $tag){
        $this->tags()->save($tag);
        $this->save();
    }

    public function applyTagByName($tagName=''){
        $tag=Tag::query()->where('name', $tagName)->get()->first();
        if (empty($tag)){
            $tag=new Tag();
            $tag->name=$tagName;
            $tag->save();
        }
        $this->tags()->save($tag);
        $this->save();
    }

    /**
     * @param Builder $query
     * @param $title
     */
    public function scopeWhereTitle($query, $title){
        if(!empty($title) && is_string($title)){
            $query->where('title' ,'like','%'.$title.'%');
        }
    }

    /**
     * @param Builder $query
     * @param $text
     */

    public function scopeWhereText($query, $text){
        if(!empty($text) && is_string($text)){
            $query->where('text' ,'like','%'.$text.'%');
        }

    }

}
