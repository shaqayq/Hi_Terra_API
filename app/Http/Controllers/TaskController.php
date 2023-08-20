<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaskType;
use App\Models\farm;
use App\Models\field;
use App\Models\field_activity;
use App\Models\field_activityTask;



class TaskController extends Controller
{

    public function getAllTask(){
        $tasks = TaskType::all();
        return response()->json(['task' => $tasks]);
    }

    public function getTask($id){
        $task = Farm::join('field', 'farm.id', '=', 'field.farmID')
        ->join('field_activity', 'field.id', '=', 'field_activity.fieldID')
        ->join('field_activitytask', 'field_activity.id', '=', 'field_activitytask.fieldActivityID')
        ->join('task_type', 'task_type.id', '=', 'field_activitytask.taskTypeID')
        ->whereColumn('task_type.id', 'field_activitytask.taskTypeID')
        ->where('task_type.id', '=', $id) 
        ->select('farm.farmName', 'farm.longitude', 'farm.latitude')
        ->get();
    
        return response()->json(['task' => $task]);
    }
}
