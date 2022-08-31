<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    //Segun el tipo que le pasemos asignamos el usuario a una actividad, a un proyecto, o a una incidencia.
    public function asignTo(array $data, $type)
    {
        switch($type){

            case 1://actividades
                $output = DB::table('users-activities')->insertGetId(
                        ['user_id' => $data['user_id'],
                        'activity_id' => $data['activity_id'],
                        ],
                    );break;

            case 2://proyectos
                $output = DB::table('users-projects')->insertGetId(
                        ['user_id' => $data['user_id'],
                        'project_id' => $data['project_id'],
                        ],
                    );break;

            case 3://incidencias
                $output = DB::table('users-incidences')->insertGetId(
                        ['user_id' => $data['user_id'],
                        'incidence_id' => $data['incidence_id'],
                        ],
                    );break;

            default: $output = 'error';break;
        }
        
        return $output;
    }

    public function listActivities($id)
    {
        return DB::table('activities')->select('activities.id', 'users.name', 'activities.name', 'activities.created_at')
        ->leftjoin('users-activities', 'users-activities.activity_id', '=', 'activities.id')
        ->leftjoin('users', 'users.id', '=', 'users-activities.user_id')
        ->where('users-activities.user_id', $id)->get();
    }

    public function listIncidences($id)
    {
        return DB::table('incidences')->select('incidences.id', 'users.name', 'incidences.name', 'incidences.created_at')
        ->leftjoin('users-incidences', 'users-incidences.incidence_id', '=', 'incidences.id')
        ->leftjoin('users', 'users.id', '=', 'users-incidences.user_id')
        ->where('users-incidences.user_id', $id)->get();
    }

    public function listParticipants($id)
    {
        return DB::table('users')->select('users.id', 'users.name', 'users.email')
        ->leftjoin('users-projects', 'users-projects.user_id', '=', 'users.id')
        ->where('users-projects.project_id', $id)->get();
    }

}
