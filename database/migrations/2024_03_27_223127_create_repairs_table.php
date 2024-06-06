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
        Schema::create('repairs', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->text('status');
            $table->date('startDate')->default(now());
            $table->date('endDate');
            $table->text('mechanicNotes')->nullable();
            $table->text('clientNotes')->nullable();
            $table->double('repaireCosts');
            $table->unsignedBigInteger('mechanicId');
            $table->foreign('mechanicId')->references('id')->on('users');
            $table->unsignedBigInteger('ClientId');
            $table->foreign('ClientId')->references('id')->on('users');
            $table->unsignedBigInteger('vehicleId');
            $table->foreign('vehicleId')->references('id')->on('vehicles');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repairs');
    }
};
