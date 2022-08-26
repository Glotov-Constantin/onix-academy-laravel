<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Tag
 * @package App\Models
 */
class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    public function posts(): BelongsToMany{
        return $this->belongsToMany(Post::class, PostTag::class);
    }
}
