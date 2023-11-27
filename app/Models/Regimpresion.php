<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Regimpresion extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'regimpresions';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['descripcion', 'cantidad', 'fecha', 'usuario_id', 'tamhoja_id'];

    public function usuario(){
        return $this->belongsTo(Usuario::class);
    }

    public function tamhoja(){
        return $this->belongsTo(Tamhoja::class);
    }
    
}
