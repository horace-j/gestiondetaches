<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration {
    public function up()
    {
        Schema::create('taches', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('titre');
            $table->text('description')->nullable();
            $table->enum('statut', ['en cours', 'terminée', 'annulée'])->default('en cours'); // Ici on utilise enum
            $table->uuid('projet_id');
            $table->foreign('projet_id')->references('id')->on('projets')->onDelete('cascade');
            $table->uuid('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('taches');
    }
};
