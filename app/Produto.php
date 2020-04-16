<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produtos';
    protected $primaryKey ='id';

    function vendas(){
    	return $this->hasMany('App\Venda', 'id_produto', 'id');
    }
}
