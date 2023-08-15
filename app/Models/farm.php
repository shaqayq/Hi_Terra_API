<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class farm extends Model
{
    // use Uuids;
  
    public $timestamps = false;
    protected $table = 'farm';
    protected $guarded = [];
  
    protected $casts = [
      'createdAt' => "timestamp",
      'updatedAt' => "timestamp",
    ];

    public static function countAllFarms()
    {
        return self::count();
    }
  
    //  public function user()
    // {
    //   return $this->belongsTo('App\Models\user', 'userID')->select('id', 'username')->whereIn('status', [1,2]);
    // }
  
    // public function habitat()
    // {
    //   return $this->belongsTo('App\Models\habitat', 'habitatID')->select('id', 'habitat')->whereIn('status', [1,2]);
    // }
  
    // public function contact()
    // {
    //   return $this->belongsTo('App\Models\contact', 'contactID')->select('id', 'userID', 'contactNo', 'contactName')->whereIn('status', [1,2]);
    // }
  
    // public function field()
    // {
    //   return $this->hasMany('App\Models\field', 'farmID')->select('id', 'farmID', 'fieldName', 'address', 'contactID', 'fieldSize', 'fieldSizeUnitID', 'totalAreaHarvested', 'totalAreaHarvestedUnitID', 'remark')->whereIn('status', [1,2])->orderBy('createdAt', 'asc');
    // }
  
    // public function landSizeUnit()
    // {
    //   return $this->belongsTo('App\Models\unit_type', 'landSizeUnitID')->select('id', 'unitType', 'unit', 'description')->whereIn('status', [1,2]);
    // }
  
    // public function totalAreaHarvestedUnit()
    // {
    //   return $this->belongsTo('App\Models\unit_type', 'totalAreaHarvestedUnitID')->select('id', 'unitType', 'unit', 'description')->whereIn('status', [1,2]);
    // }
  }
