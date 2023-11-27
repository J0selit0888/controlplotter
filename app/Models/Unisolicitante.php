<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unisolicitante extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'unisolicitantes';

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
    protected $fillable = ['nombre'];

    public function usuarios(){
        return $this->hasMany(Usuario::class);
    }   
}
