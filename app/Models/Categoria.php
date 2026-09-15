<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categoria';

    public function getNomeAttribute($value) {
        if (request()->is('admin*')) return $value;
        $locale = app()->getLocale();
        if ($locale === 'en' && !empty($this->nome_en)) return $this->nome_en;
        if ($locale === 'es' && !empty($this->nome_es)) return $this->nome_es;
        return tr($value);
    }

    protected $fillable = [
        'nome', 'nome_en', 'nome_es',
    ];

    public function blog(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Blog::class, 'id_categoria', 'id');
    }
}
