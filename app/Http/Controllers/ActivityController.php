<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;

class ActivityController extends Controller
{
    protected $activityModel;

    public function __construct(Activity $activity)
    {
        $this->activityModel = $activity;
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $id = $this->activityModel->createActivity($data);

        return json_encode($id); 
    }
}
