<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreCadastro extends Model
{
    use HasFactory;
    protected $fillable = [
        'empresa',
        'whatsapp',
        'email',
        'nome',
    ];
}

