<?php

namespace App\Models;

use App\Traits\HasMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class BlogPost extends Model
{
    use HasFactory;
    use HasMedia;

    protected $fillable = ['description'];

    public function images(): MorphMany
    {
        return $this->morphManyImages();
    }
}
