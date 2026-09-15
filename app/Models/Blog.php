<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blog';

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

    public function getTextoAttribute($value) {
        if (request()->is('admin*')) return $value;
        $locale = app()->getLocale();
        if ($locale === 'en' && !empty($this->texto_en)) return $this->texto_en;
        if ($locale === 'es' && !empty($this->texto_es)) return $this->texto_es;
        return tr($value);
    }

    protected $fillable = [
        'criado_por',
        'titulo_en', 'titulo_es',
        'descricao_en', 'descricao_es',
        'texto_en', 'texto_es',
        'situacao',
        'titulo',
        'urltitulo',
        'texto',
        'descricao',
        'iframe',
        'img',
        'img2',
        'img3',
        'imgwhats',
        'id_categoria',
    ];

    public function categoria(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    public function getRouteKeyName(): string
    {
        return 'urltitulo';
    }
}
