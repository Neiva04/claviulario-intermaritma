<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Funcionario extends Authenticatable
{
    protected $fillable = [
        'intermaritima_id', 'nome', 'cargo', 'is_admin', 'departamento_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}

