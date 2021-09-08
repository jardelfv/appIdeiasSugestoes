<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sugestao extends Model
{
    protected $table = 'sugestoes';

    public function user(){
        // caminho de volta para consulta
        return $this->belongsTo(User::class, 'user', 'id');
    }
}
