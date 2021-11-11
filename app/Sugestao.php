<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Sugestao extends Model
{
    use Notifiable;
    protected $table = 'sugestoes';

    protected $dates = [
        'data_aprovacao'
    ];

    protected $fillable = [
        'titulo', 'descricao', 'user',
    ];

    public function userSugestao(){
        // caminho de volta para consulta
        return $this->belongsTo(User::class, 'user', 'id');
    }
}
