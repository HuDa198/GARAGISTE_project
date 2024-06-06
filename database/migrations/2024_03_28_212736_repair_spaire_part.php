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
        Schema::create('repair_sparepart', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('repairId');
            $table->foreign('repairId')->references('id')->on('repairs')->onDelete('cascade');
            $table->unsignedBigInteger('sparePartId');
            $table->foreign('sparePartId')->references('id')->on('spare_parts')->onDelete('cascade');
            $table->timestamps();

            // Ensure the combination of repairId and sparePartId is unique
            $table->unique(['repairId', 'sparePartId'], 'repair_sparepart_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repair_sparepart');
    }
};

// use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Support\Facades\Schema;

// return new class extends Migration
// {
//     /**
//      * Run the migrations.
//      */
//     public function up(): void
//     {
//         Schema::create('repair_sparepart', function (Blueprint $table) {
//             $table->unsignedBigInteger('repairId');
//             $table->foreign('repairId')->references('id')->on('repairs')->onDelete('cascade');
//             $table->unsignedBigInteger('sparePartId');
//             $table->foreign('sparePartId')->references('id')->on('spare_parts')->onDelete('cascade');
//             $table->timestamps();
//             $table->primary(['sparePartId', 'repairId']);
//         });
//     }

//     /**
//      * Reverse the migrations.
//      */
//     public function down(): void
//     {
//         Schema::dropIfExists('repair_sparepart');
//     }
// };
