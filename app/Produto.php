<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produtos';
    protected $primaryKey ='id';

    function vendas(){
        return $this->belongsToMany('App\Produto', 'produtos_venda','id_venda', 'id_produto')
        ->withPivot(['quantidade','subtotal'])
        ->withTimestamps();
    }
}
