<?php

namespace App\Http\Controllers;

use App\Step;
use App\Task;
use Illuminate\Http\Request;

class TaskStepsController extends Controller
{
    public function store(Task $task)
    {
        $task->addStep(\request()->validate([
            'description' => 'required|min:5',

        ]));

//        Step::create([
//           'description' => \request('description'),
//            'task_id' => $task->id,
//        ]);

        return back();
    }


//    public function update(Step $step)
//    {
//// TODO: Способ 1-ый  $step->update(['completed' => \request()->has('completed')]);
//
//// TODO: Способ 2-ой      if (\request()->has('completed')){
////                           $step->complete();
////                        } else {
////                           $step->incomplete();
////                        }
//
//// TODO: Способ 3-ий      $method = \request()->has('completed') ? 'complete' : 'incomplete';
////                        $step->{$method}();
//
//
//        return back();
//    }
}
