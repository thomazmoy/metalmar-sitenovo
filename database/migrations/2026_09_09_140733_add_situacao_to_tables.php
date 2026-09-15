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
            $table->tinyInteger('situacao')->default(1);
        });

        Schema::table('galeria', function (Blueprint $table) {
            $table->tinyInteger('situacao')->default(1);
        });

        Schema::table('depoimento', function (Blueprint $table) {
            $table->tinyInteger('situacao')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blog', function (Blueprint $table) {
            $table->dropColumn('situacao');
        });

        Schema::table('galeria', function (Blueprint $table) {
            $table->dropColumn('situacao');
        });

        Schema::table('depoimento', function (Blueprint $table) {
            $table->dropColumn('situacao');
        });
    }
};
