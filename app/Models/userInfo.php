<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userInfo extends Model
{
    protected $table = 'user_info';

    public function user()
    {
        return $this->belongsTo(User::class, 'userID');
    }
}
