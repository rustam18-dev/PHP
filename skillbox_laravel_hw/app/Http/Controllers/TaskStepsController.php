<?php

namespace App\Http\Controllers;

use App\Step;
use App\Tag;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class TaskStepsController extends Controller
{
    public function store(Task $task)
    {
        $step = $task->addStep(\request()->validate([
            'description' => 'required|min:5',

        ]));

        $tagsToAttach = collect(explode(', ', \request('tags')))->keyBy(function ($item) { return $item; });

        $syncIds = [];
        foreach ($tagsToAttach as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);

            $syncIds[] = $tag->id;
        }

        $step->tags()->sync($syncIds);

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
