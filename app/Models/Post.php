<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function itens(): HasMany
    {
        return $this->hasMany(ItemLayout::class)->orderBy('order');
    }

    public function likes(): HasMany
    {
        return $this->hasMany(PostUserLike::class);
    }
}
