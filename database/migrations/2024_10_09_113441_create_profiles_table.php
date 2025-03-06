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
        Schema::create('profiles', function (Blueprint $table) {
        $table->id();
        $table->string("phone")->nullable()->unique();
        $table->enum("locale",["ar","en"])->default("ar");
        $table->enum("theme",["dark","light"])->default("dark");
        $table->string("logo")->nullable();
        $table->foreignId("user_id")->constrained()->cascadeOnDelete();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};