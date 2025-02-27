<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'user_id'
    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function plugins()
    {
        $this->hasMany(Plugin::class);
    }
}
