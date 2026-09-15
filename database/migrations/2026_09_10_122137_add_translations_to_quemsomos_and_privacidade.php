<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('quemsomos', function (Blueprint $table) {
            $table->string('tituloum_en')->nullable();
            $table->string('tituloum_es')->nullable();
            $table->string('titulodois_en')->nullable();
            $table->string('titulodois_es')->nullable();
            $table->string('titulotres_en')->nullable();
            $table->string('titulotres_es')->nullable();
            $table->longText('textoum_en')->nullable();
            $table->longText('textoum_es')->nullable();
            $table->longText('textodois_en')->nullable();
            $table->longText('textodois_es')->nullable();
            $table->longText('textotres_en')->nullable();
            $table->longText('textotres_es')->nullable();
        });

        Schema::table('privacidade', function (Blueprint $table) {
            $table->string('titulo_en')->nullable();
            $table->string('titulo_es')->nullable();
            $table->longText('texto_en')->nullable();
            $table->longText('texto_es')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('quemsomos', function (Blueprint $table) {
            $table->dropColumn([
                'tituloum_en', 'tituloum_es', 'titulodois_en', 'titulodois_es', 'titulotres_en', 'titulotres_es',
                'textoum_en', 'textoum_es', 'textodois_en', 'textodois_es', 'textotres_en', 'textotres_es'
            ]);
        });

        Schema::table('privacidade', function (Blueprint $table) {
            $table->dropColumn(['titulo_en', 'titulo_es', 'texto_en', 'texto_es']);
        });
    }
};
