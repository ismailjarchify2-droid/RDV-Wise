<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('patients')->cascadeOnDelete();
           $table->foreignId('medecin_id')->constrained('doctors')->cascadeOnDelete();
            $table->foreignId('appointment_id')->nullable()->constrained('appointments')->nullOnDelete();
            $table->date('date');
            $table->text('diagnostic')->nullable();
            $table->text('traitement')->nullable();
            $table->text('notes')->nullable();
            // Dialysis session data
            $table->decimal('poids_avant', 5, 2)->nullable();   // weight before session
            $table->decimal('poids_apres', 5, 2)->nullable();   // weight after session
            $table->integer('duree_minutes')->nullable();        // session duration
            $table->decimal('debit_sang', 5, 2)->nullable();    // blood flow rate
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('consultations');
    }
};