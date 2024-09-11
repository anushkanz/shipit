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
        Schema::create('transporters', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('legalname');
            $table->string('nzbn');
            $table->string('gst');
            $table->integer('inbusiness');
            $table->string('adderss');
            $table->string('dlnumber');
            $table->string('proof_identification');
            $table->string('proof_address');
            $table->string('public_profile');
            $table->string('notification');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transporter');
    }
};
