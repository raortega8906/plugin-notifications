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
        return$this->belongsTo(User::class);
    }

    public function plugins()
    {
        return $this->hasMany(Plugin::class);
    }
}
