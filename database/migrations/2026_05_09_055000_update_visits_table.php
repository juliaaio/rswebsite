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
        Schema::table('visits', function (Blueprint $table) {

            // TAMBAH doctor_id
            $table->foreignId('doctor_id')
                ->after('patient_id')
                ->constrained()
                ->onDelete('cascade');

            // HAPUS kolom lama
            $table->dropColumn(['poli', 'dokter']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::table('visits', function (Blueprint $table) {

            $table->string('poli')->nullable();
            $table->string('dokter')->nullable();

            $table->dropForeign(['doctor_id']);
            $table->dropColumn('doctor_id');
        });
    }
};
