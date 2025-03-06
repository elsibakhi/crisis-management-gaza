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
        Schema::create('food_services', function (Blueprint $table) {
            $table->id();
            $table->enum('type',["food_parcel","cooking","flour",'gas']); //{طرد غذائي و تكية و طحين}
            $table->foreignId("service_id")->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_services');
    }
};