<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    protected $userModel;

    public function __construct(User $user)
    {
        $this->userModel = $user;
    }

    public function asignTo(Request $request, $type)
    {
        $data = $request->all();
        $id = $this->userModel->asignTo($data, $type);

        return json_encode($id);
    }

    public function listActivities($id)
    {
        $data = $this->userModel->listActivities($id);
        return json_encode($data);
    }

    public function listIncidences($id)
    {
        $data = $this->userModel->listIncidences($id);

        return json_encode($data);
    }

    public function listParticipants($id)
    {
        $data = $this->userModel->listParticipants($id);

        return json_encode($data);
    }
}
