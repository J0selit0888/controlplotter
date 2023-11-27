<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'usuarios';

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
    protected $fillable = ['nombre', 'ci', 'unisolicitante_id'];

    public function unisolicitante(){
        return $this->belongsTo(Unisolicitante::class);
    }   

    public function regimpresiones(){
        return $this->hasMany(Regimpresion::class);
    }
}
