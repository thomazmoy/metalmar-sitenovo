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
        Schema::create('traducoes', function (Blueprint $table) {
            $table->id();
            $table->longText('chave_pt');
            $table->longText('valor_en')->nullable();
            $table->longText('valor_es')->nullable();
            // We use MD5 hash for unique indexing since chave_pt can be too long for unique index
            $table->string('hash_pt', 32)->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('traducoes');
    }
};
