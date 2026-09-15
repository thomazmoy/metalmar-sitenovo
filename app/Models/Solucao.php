<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solucao extends Model
{
    use HasFactory;

    protected $table = 'solucao';

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

    public function getDescricaodoisAttribute($value) {
        if (request()->is('admin*')) return $value;
        $locale = app()->getLocale();
        if ($locale === 'en' && !empty($this->descricaodois_en)) return $this->descricaodois_en;
        if ($locale === 'es' && !empty($this->descricaodois_es)) return $this->descricaodois_es;
        return tr($value);
    }

    public function getTextoAttribute($value) {
        if (request()->is('admin*')) return $value;
        $locale = app()->getLocale();
        if ($locale === 'en' && !empty($this->texto_en)) return $this->texto_en;
        if ($locale === 'es' && !empty($this->texto_es)) return $this->texto_es;
        return tr($value);
    }

    protected $fillable = [
        'titulo_en', 'titulo_es',
        'descricao_en', 'descricao_es',
        'descricaodois_en', 'descricaodois_es',
        'texto_en', 'texto_es',
        'titulo',
        'urltitulo',
        'texto',
        'descricao',
        'descricaodois',
        'img',
        'img2',
        'img3',
        'situacao',
    ];

    public function getRouteKeyName(): string
    {
        return 'urltitulo';
    }
}
