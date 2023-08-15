<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class field extends Model
{
    public $timestamps = false;
  protected $table = 'field';
  protected $guarded = [];

  protected $casts = [
    'createdAt' => "timestamp",
    'updatedAt' => "timestamp",
  ];


  public static function countAllField()
    {
        return self::count();
    }

}
