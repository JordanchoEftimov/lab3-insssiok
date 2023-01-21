<?php

namespace App\Models;

use App\Traits\HasMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class BlogPost extends Model
{
    use HasFactory;
    use HasMedia;

    protected $fillable = ['description', 'title'];

    public function images(): MorphMany
    {
        return $this->morphManyImages();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
