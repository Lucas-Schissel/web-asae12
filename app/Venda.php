<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $table = 'vendas';
    protected $primaryKey = 'id';

    function usuario(){
    	return $this->belongsTo('App\Cliente', 'id_usuario', 'id');
    }

    function produto(){
    	return $this->belongsTo('App\Produto', 'id_produto', 'id');
    }
}