<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class field_activity extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'field_activity';
    protected $guarded = [];
  
    protected $casts = [
      'createdAt' => "timestamp",
      'updatedAt' => "timestamp",
    ];

    
  public function field()
  {
    return $this->belongsTo('App\Models\field', 'fieldID')->select('id', 'farmID', 'fieldName', 'address', 'contactID', 'fieldSize', 'fieldSizeUnitID', 'totalAreaHarvested', 'totalAreaHarvestedUnitID', 'remark')->whereIn('status', [1,2]);
  }

  public function cropVariety()
  {
    return $this->belongsTo('App\Models\crop_variety', 'cropVarietyID')->select('id', 'cropTypeID', 'cropVariety', 'task')->whereIn('status', [1,2]);
  }

  public function firstFieldActivityTask()
  {
    return $this->hasOne('App\Models\field_activityTask', 'fieldActivityID')->select('id', 'fieldActivityID', 'taskTypeID', 'taskName', 'taskDay', 'taskDate', 'supplier', 'yield', 'production', 'productionUnitID', 'price', 'priceUnitID', 'productID', 'dosage', 'dosageUnitID', 'cost', 'costUnitID', 'method', 'remark', 'isChecked')->whereIn('status', [1,2])->orderByRaw('-taskDate DESC');
  }

  public function fieldActivityTask()
  {
    return $this->hasMany('App\Models\field_activityTask', 'fieldActivityID')->select('id', 'fieldActivityID', 'taskTypeID', 'taskName', 'taskDay', 'taskDate', 'supplier', 'yield', 'production', 'productionUnitID', 'price', 'priceUnitID', 'productID', 'dosage', 'dosageUnitID', 'cost', 'costUnitID', 'method', 'remark', 'isChecked')->whereIn('status', [1,2])->orderByRaw('-taskDate DESC');
  }
}
