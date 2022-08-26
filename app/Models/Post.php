<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use phpDocumentor\Reflection\Types\String_;

/**
 * @property User $user
 */

class Post extends Model
{
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

}
