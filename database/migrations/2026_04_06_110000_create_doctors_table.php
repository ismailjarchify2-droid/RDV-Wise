<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{public function up()
{
    Schema::create('doctors', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->string('cin')->unique()->nullable();
        $table->string('inpe')->nullable();
        $table->string('specialite')->default('Généraliste');
        $table->string('cabinet')->nullable();
        $table->string('phone')->nullable();
        $table->boolean('verified')->default(false);
        $table->text('bio')->nullable();
        $table->string('avatar')->nullable();
        $table->integer('consultation_duree')->default(30);
        $table->decimal('tarif', 8, 2)->default(0);
        $table->json('jours_travail')->nullable();
        $table->time('heure_debut')->nullable();
        $table->time('heure_fin')->nullable();
        $table->boolean('accepte_nouveaux')->default(true);
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('doctors');
}
};
