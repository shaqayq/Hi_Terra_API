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

    public function farm()
    {
      return $this->belongsTo('App\Models\farm', 'farmID')->select('id', 'userID', 'habitatID', 'farmName', 'latitude', 'longitude', 'address', 'contactID', 'landSize', 'landSizeUnitID', 'totalAreaHarvested', 'totalAreaHarvestedUnitID', 'image')->whereIn('status', [1,2]);
    }
  
    public function contact()
    {
      return $this->belongsTo('App\Models\contact', 'contactID')->select('id', 'userID', 'contactNo', 'contactName')->whereIn('status', [1,2]);
    }
  
    public function fieldSizeUnit()
    {
      return $this->belongsTo('App\Models\unit_type', 'fieldSizeUnitID')->select('id', 'unitType', 'unit', 'description')->whereIn('status', [1,2]);
    }
  
    public function totalAreaHarvestedUnit()
    {
      return $this->belongsTo('App\Models\unit_type', 'totalAreaHarvestedUnitID')->select('id', 'unitType', 'unit', 'description')->whereIn('status', [1,2]);
    }
  
    public function fieldActivity()
    {
      return $this->hasMany('App\Models\field_activity', 'fieldID')->select('id', 'fieldID', 'cropVarietyID')->whereIn('status', [1,2]);
    }

}
