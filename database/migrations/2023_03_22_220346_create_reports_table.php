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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();

            //APARECE
            $table->string('title');
            $table->foreignId('user_id')->constrained();
            $table->string('description');
            $table->string('slug');
            $table->string('image');

            $table->longText('report'); //MUDAR POR CAUSA DO UPLOAD PDF (VAI SER STRING (LINK))

            $table->string('tags');

            //NAO APARECE
            $table->string('game');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
