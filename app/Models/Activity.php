<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Activity extends Model
{
    use HasFactory;

    protected $table = 'activities';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'description', 'project_id'];

    //Recogemos los datos en un array y los insertamos en la BBDD recogiendo el id del nuevo registro
    public function createActivity(array $data)
    {
        $id = DB::table($this->table)->insertGetId(
            ['name' => $data['name'],
            'description' => $data['description'],
            'project_id' => $data['project_id'],
            ],
       );

       //Si la insercion se realiza correctamente nos devolvera un id, sino devolvemos un error
       return isset($id) ?  $id : 'error';
    }
}
