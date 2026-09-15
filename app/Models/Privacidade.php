<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Privacidade extends Model
{
    use HasFactory;

    protected $table = 'privacidade';

    public function getTituloAttribute($value) {
        if (request()->is('admin*')) return $value;
        $locale = app()->getLocale();
        if ($locale === 'en' && !empty($this->titulo_en)) return $this->titulo_en;
        if ($locale === 'es' && !empty($this->titulo_es)) return $this->titulo_es;
        return tr($value);
    }

    public function getTextoAttribute($value) {
        if (request()->is('admin*')) return $value;
        $locale = app()->getLocale();
        if ($locale === 'en' && !empty($this->texto_en)) return $this->texto_en;
        if ($locale === 'es' && !empty($this->texto_es)) return $this->texto_es;
        return $value;
    }

    protected $fillable = [
        'titulo', 'titulo_en', 'titulo_es',
        'texto', 'texto_en', 'texto_es',
    ];
}
