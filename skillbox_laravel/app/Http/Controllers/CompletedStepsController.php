<?php

namespace App\Http\Controllers;

use App\Step;
use Illuminate\Http\Request;

class CompletedStepsController extends Controller
{
    public function store(Step $step)
    {
        $step->complete();
        return back();
    }

    public function destroy(Step $step)
    {
        $step->incomplete();
        return back();
    }
}
