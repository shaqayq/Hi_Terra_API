<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class contact extends Model
{
  use Uuids;
  
  public $timestamps = false;
  protected $table = 'contact';
  protected $guarded = [];

  protected $primaryKey = 'id';
  public $incrementing = false; 
  protected $keyType = 'string';
  
  protected $casts = [
    'createdAt' => "timestamp",
    'updatedAt' => "timestamp",
  ];

  public function user()
  {
    return $this->belongsTo('App\Models\user', 'userID')->select('id', 'username')->whereIn('status', [1,2]);
  }

  public function userInfo()
    {
        return $this->belongsTo(UserInfo::class, 'userID');
    }
 
}
