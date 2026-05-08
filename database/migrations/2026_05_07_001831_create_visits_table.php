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
        Schema::create('visits', function (Blueprint $table) {

    $table->id();

    $table->foreignId('patient_id')->constrained()->cascadeOnDelete();

    $table->date('tanggal');

    $table->string('poli');

    $table->string('dokter')->nullable();

    $table->integer('queue_number')->nullable();

    $table->enum('status', [
        'booked',
        'rescheduled',
        'cancelled',
        'done'
    ])->default('booked');

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visits');
    }
};
