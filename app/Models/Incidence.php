<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Incidence extends Model
{
    use HasFactory;

    protected $table = 'incidences';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'description', 'user_id', 'activity_id'];

    //Recogemos los datos en un array y los insertamos en la BBDD recogiendo el id del nuevo registro
    public function createIncidence(array $data)
    {
        $id = DB::table($this->table)->insertGetId(
            ['name' => $data['name'],
            'description' => $data['description'],
            'user_id' => $data['user_id'],
            'activity_id' => $data['activity_id'],
            ],
       );

       //Si la insercion se realiza correctamente nos devolvera un id, sino devolvemos un error
       return isset($id) ?  $id : 'error';
    }
}
