<?php

use App\Models\Traducao;
use Illuminate\Support\Facades\Cache;

if (!function_exists('tr')) {
    /**
     * Traduz um texto do banco de dados (Dicionário Customizado).
     *
     * @param string $texto
     * @return string
     */
    function tr($texto)
    {
        if (empty($texto)) {
            return $texto;
        }

        // Se estiver no painel administrativo, ignora as traduções
        if (request()->is('admin*')) {
            return $texto;
        }

        // Remover espaços extras e obter hash
        $textoTrim = trim($texto);
        $hash = md5($textoTrim);
        $locale = app()->getLocale();

        if ($locale === 'pt-BR') {
            return $texto;
        }

        // Tentar obter a tradução do cache
        $traducao = Cache::rememberForever('traducao_' . $hash, function () use ($textoTrim, $hash) {
            $reg = Traducao::where('hash_pt', $hash)->first();

            // Se não encontrar, cadastra silenciosamente para ser traduzido depois no painel
            if (!$reg) {
                try {
                    $reg = Traducao::create([
                        'chave_pt' => $textoTrim,
                        'hash_pt' => $hash,
                        'valor_en' => null,
                        'valor_es' => null,
                    ]);
                } catch (\Exception $e) {
                    // Ignora erros de concorrência/duplicação
                    $reg = Traducao::where('hash_pt', $hash)->first();
                }
            }
            
            return $reg ? [
                'valor_en' => $reg->valor_en,
                'valor_es' => $reg->valor_es
            ] : null;
        });

        if ($traducao) {
            if ($locale === 'en' && !empty($traducao['valor_en'])) {
                return $traducao['valor_en'];
            }
            if ($locale === 'es' && !empty($traducao['valor_es'])) {
                return $traducao['valor_es'];
            }
        }

        // Se não houver tradução cadastrada, retorna o original
        return $texto;
    }
}
