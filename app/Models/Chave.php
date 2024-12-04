<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chave extends Model
{
    use HasFactory;

    protected $fillable = [
        'intermaritima_id',
        'sala_id',
        'is_locado',
        'funcionario_id',
    ];

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }

    public function sala()
    {
        return $this->belongsTo(Sala::class);
    }
}
