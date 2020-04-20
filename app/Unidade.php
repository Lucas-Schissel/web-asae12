<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
{
    protected $table = 'unidades';
    protected $primaryKey ='id';

    function produtos(){
    	return $this->hasMany('App\Produto', 'id_unidade', 'id');
    }
}
