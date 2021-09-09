<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    protected $primaryKey = 'url';
    protected $fillable = ['url', 'name'];

    public function subscriptions() {
        return $this->hasMany(Subscription::class, 'website_url', 'url');
    }
}
