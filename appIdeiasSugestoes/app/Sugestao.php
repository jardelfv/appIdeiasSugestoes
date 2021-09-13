<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sugestao extends Model
{
    protected $table = 'sugestoes';

    public function userSugestao(){
        // caminho de volta para consulta
        return $this->belongsTo(User::class, 'user', 'id');
    }
}
