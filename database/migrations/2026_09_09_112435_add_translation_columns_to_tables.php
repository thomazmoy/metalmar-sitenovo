<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('blog', function (Blueprint $table) {
            $table->longText('titulo_en')->nullable();
            $table->longText('titulo_es')->nullable();
            $table->longText('descricao_en')->nullable();
            $table->longText('descricao_es')->nullable();
            $table->longText('texto_en')->nullable();
            $table->longText('texto_es')->nullable();
        });

        Schema::table('solucao', function (Blueprint $table) {
            $table->longText('titulo_en')->nullable();
            $table->longText('titulo_es')->nullable();
            $table->longText('descricao_en')->nullable();
            $table->longText('descricao_es')->nullable();
            $table->longText('descricaodois_en')->nullable();
            $table->longText('descricaodois_es')->nullable();
            $table->longText('texto_en')->nullable();
            $table->longText('texto_es')->nullable();
        });

        Schema::table('galeria', function (Blueprint $table) {
            $table->longText('titulo_en')->nullable();
            $table->longText('titulo_es')->nullable();
            $table->longText('descricao_en')->nullable();
            $table->longText('descricao_es')->nullable();
        });

        Schema::table('depoimento', function (Blueprint $table) {
            $table->longText('cargo_en')->nullable();
            $table->longText('cargo_es')->nullable();
            $table->longText('texto_en')->nullable();
            $table->longText('texto_es')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blog', function (Blueprint $table) {
            $table->dropColumn(['titulo_en', 'titulo_es', 'descricao_en', 'descricao_es', 'texto_en', 'texto_es']);
        });

        Schema::table('solucao', function (Blueprint $table) {
            $table->dropColumn(['titulo_en', 'titulo_es', 'descricao_en', 'descricao_es', 'descricaodois_en', 'descricaodois_es', 'texto_en', 'texto_es']);
        });

        Schema::table('galeria', function (Blueprint $table) {
            $table->dropColumn(['titulo_en', 'titulo_es', 'descricao_en', 'descricao_es']);
        });

        Schema::table('depoimento', function (Blueprint $table) {
            $table->dropColumn(['cargo_en', 'cargo_es', 'texto_en', 'texto_es']);
        });
    }
};
