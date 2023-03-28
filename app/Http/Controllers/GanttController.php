<?php

namespace App\Http\Controllers;
use App\Models\ganttpilot;
use App\Models\Link;

use Illuminate\Http\Request;

class GanttController extends Controller
{
    public function get(){







        $tasks = new ganttpilot();
        $links = new Link();

        return response()->json([
            "data" => $tasks->all(),
            "links" => $links->all()
        ]);


    }

}
