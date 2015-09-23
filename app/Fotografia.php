<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fotografia extends Model
{
    public $timestamps = false;

    public function Cidade(){
        return $this->belongsTo('App\Cidade');
    }

    public function Bairro(){
        return $this->belongsTo('App\Bairro');
    }

    public function Logradouro(){
        return $this->belongsTo('App\Logradouro');
    }

    public function Pessoa(){
        return $this->belongsToMany('App\Pessoa')->withPivot('tipo_pessoa');
    }

    public function Categoria(){
        return $this->belongsToMany('App\Categoria');
    }
}
