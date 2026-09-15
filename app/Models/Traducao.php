<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Traducao extends Model
{
    protected $table = 'traducoes';
    protected $fillable = ['chave_pt', 'valor_en', 'valor_es', 'hash_pt'];
}
