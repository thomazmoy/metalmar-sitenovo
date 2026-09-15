<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quemsomos extends Model
{
    use HasFactory;

    protected $table = 'quemsomos';

    public function getTituloumAttribute($value) {
        if (request()->is('admin*')) return $value;
        $locale = app()->getLocale();
        if ($locale === 'en' && !empty($this->tituloum_en)) return $this->tituloum_en;
        if ($locale === 'es' && !empty($this->tituloum_es)) return $this->tituloum_es;
        return tr($value);
    }

    public function getTextoumAttribute($value) {
        if (request()->is('admin*')) return $value;
        $locale = app()->getLocale();
        if ($locale === 'en' && !empty($this->textoum_en)) return $this->textoum_en;
        if ($locale === 'es' && !empty($this->textoum_es)) return $this->textoum_es;
        return tr($value);
    }

    public function getTitulodoisAttribute($value) {
        if (request()->is('admin*')) return $value;
        $locale = app()->getLocale();
        if ($locale === 'en' && !empty($this->titulodois_en)) return $this->titulodois_en;
        if ($locale === 'es' && !empty($this->titulodois_es)) return $this->titulodois_es;
        return tr($value);
    }

    public function getTextodoisAttribute($value) {
        if (request()->is('admin*')) return $value;
        $locale = app()->getLocale();
        if ($locale === 'en' && !empty($this->textodois_en)) return $this->textodois_en;
        if ($locale === 'es' && !empty($this->textodois_es)) return $this->textodois_es;
        return tr($value);
    }

    public function getTitulotresAttribute($value) {
        if (request()->is('admin*')) return $value;
        $locale = app()->getLocale();
        if ($locale === 'en' && !empty($this->titulotres_en)) return $this->titulotres_en;
        if ($locale === 'es' && !empty($this->titulotres_es)) return $this->titulotres_es;
        return $value;
    }

    public function getTextotresAttribute($value) {
        if (request()->is('admin*')) return $value;
        $locale = app()->getLocale();
        if ($locale === 'en' && !empty($this->textotres_en)) return $this->textotres_en;
        if ($locale === 'es' && !empty($this->textotres_es)) return $this->textotres_es;
        return $value;
    }

    protected $fillable = [
        'tituloum', 'tituloum_en', 'tituloum_es',
        'titulodois', 'titulodois_en', 'titulodois_es',
        'titulotres', 'titulotres_en', 'titulotres_es',
        'textoum', 'textoum_en', 'textoum_es',
        'textodois', 'textodois_en', 'textodois_es',
        'textotres', 'textotres_en', 'textotres_es',
        'iframevideo',
        'imgum',
        'imgdois',
        'imgtres',
    ];
}
