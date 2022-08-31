<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incidence;

class IncidenceController extends Controller
{
    protected $incidenceModel;

    public function __construct(Incidence $incidence)
    {
        $this->incidenceModel = $incidence;
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $id = $this->incidenceModel->createIncidence($data);

        return json_encode($id);
    }
}
