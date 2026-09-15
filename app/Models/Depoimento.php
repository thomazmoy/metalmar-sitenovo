<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depoimento extends Model
{
    use HasFactory;

    protected $table = 'depoimento';

    public function getCargoAttribute($value) {
        if (request()->is('admin*')) return $value;
        $locale = app()->getLocale();
        if ($locale === 'en' && !empty($this->cargo_en)) return $this->cargo_en;
        if ($locale === 'es' && !empty($this->cargo_es)) return $this->cargo_es;
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
        'cargo_en', 'cargo_es',
        'texto_en', 'texto_es',
        'situacao',
        'nome',
        'cargo',
        'texto',
        'img',
    ];
}
