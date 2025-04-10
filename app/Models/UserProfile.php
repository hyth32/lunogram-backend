<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $fillable = [
        'name',
        'description',
        'activity_category',
        'is_public',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
