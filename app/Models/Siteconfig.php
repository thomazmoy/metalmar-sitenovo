<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siteconfig extends Model
{
    use HasFactory;

    protected $table = 'siteconfig';

    public function getNomesiteAttribute($value) { return tr($value); }
    public function getDescricaoAttribute($value) { return tr($value); }
    public function getPalavraschaveAttribute($value) { return tr($value); }
    public function getEnderecoAttribute($value) { return tr($value); }

    protected $fillable = [
        'nomesite',
        'descricao',
        'palavraschave',
        'endereco',
        'email',
        'celular',
        'telefone',
        'linkendereco',
        'iframemapa',
        'facebook',
        'instagram',
        'whatsapp',
        'twitter',
        'linkedin',
        'youtube',
        'facebookid',
        'taghead',
        'codchat',
        'logobranca',
        'logoescura',
        'favicon',
    ];
}
