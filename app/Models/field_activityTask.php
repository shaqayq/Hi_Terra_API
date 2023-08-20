<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class field_activityTask extends Model
{
    use HasFactory;
    
  public $timestamps = false;
  protected $table = 'field_activityTask';
  protected $guarded = [];

  protected $casts = [
    'createdAt' => "timestamp",
    'updatedAt' => "timestamp",
  ];

  public function fieldActivity()
  {
    return $this->belongsTo('App\Models\field_activity', 'fieldActivityID')->select('id', 'fieldID', 'cropVarietyID')->whereIn('status', [1,2]);
  }

  public function taskType()
  {
    return $this->belongsTo('App\Models\task_type', 'taskTypeID')->select('id', 'taskType')->whereIn('status', [1,2]);
  }

  public function yieldUnit()
  {
    return $this->belongsTo('App\Models\unit_type', 'yieldUnitID')->select('id', 'unitType', 'unit', 'description')->whereIn('status', [1,2]);
  }

  public function productionUnit()
  {
    return $this->belongsTo('App\Models\unit_type', 'productionUnitID')->select('id', 'unitType', 'unit', 'description')->whereIn('status', [1,2]);
  }

  public function priceUnit()
  {
    return $this->belongsTo('App\Models\unit_type', 'priceUnitID')->select('id', 'unitType', 'unit', 'description')->whereIn('status', [1,2]);
  }

  public function dosageUnit()
  {
    return $this->belongsTo('App\Models\unit_type', 'dosageUnitID')->select('id', 'unitType', 'unit', 'description')->whereIn('status', [1,2]);
  }

  public function costUnit()
  {
    return $this->belongsTo('App\Models\unit_type', 'costUnitID')->select('id', 'unitType', 'unit', 'description')->whereIn('status', [1,2]);
  }

  public function product()
  {
    return $this->belongsTo('App\Models\crop_product', 'productID')->select('id', 'productType', 'brand', 'product', 'description')->whereIn('status', [1,2]);
  }
}
