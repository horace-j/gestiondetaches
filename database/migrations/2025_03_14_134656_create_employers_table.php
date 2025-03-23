<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;


return new class extends Migration {
    public function up()
    {
        Schema::create('employers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id')->unique(); // UUID de users
            $table->string('nom');
            $table->string('prenom');
            $table->string('tel');
            $table->string('mail')->unique();
            $table->string('lien_linkedin')->nullable();
            $table->string('adresse');
            $table->string('profession');
            $table->string('image')->nullable();
            $table->text('a_propos')->nullable();
            $table->string('ifu')->nullable(); // Facultatif
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('employers');
    }
};
