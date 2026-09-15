<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{
    use HasFactory;

    protected $table = 'galeria';

    public function getTituloAttribute($value) {
        if (request()->is('admin*')) return $value;
        $locale = app()->getLocale();
        if ($locale === 'en' && !empty($this->titulo_en)) return $this->titulo_en;
        if ($locale === 'es' && !empty($this->titulo_es)) return $this->titulo_es;
        return tr($value);
    }

    public function getDescricaoAttribute($value) {
        if (request()->is('admin*')) return $value;
        $locale = app()->getLocale();
        if ($locale === 'en' && !empty($this->descricao_en)) return $this->descricao_en;
        if ($locale === 'es' && !empty($this->descricao_es)) return $this->descricao_es;
        return tr($value);
    }

    protected $fillable = [
        'titulo_en', 'titulo_es',
        'descricao_en', 'descricao_es',
        'situacao',
        'titulo',
        'descricao',
        'img',
    ];
}
