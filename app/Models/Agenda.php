<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $table = 'agenda';

    protected $fillable = [
        'descricao',
        'data_planejada',
        'observacao',
        'usuario'
    ];

    public function usuario() {
        return $this->belongsTo('App\Models\User', 'usuario');
    }
}