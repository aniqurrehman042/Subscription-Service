<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'description', 'website_url'];

    public function website() {
        return $this->belongsTo(Website::class, 'website_url', 'url');
    }
}
