<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    
  public $timestamps = false;
  protected $table = 'contact';
  protected $guarded = [];

  protected $casts = [
    'createdAt' => "timestamp",
    'updatedAt' => "timestamp",
  ];

  public function user()
  {
    return $this->belongsTo('App\Models\user', 'userID')->select('id', 'username')->whereIn('status', [1,2]);
  }
}
