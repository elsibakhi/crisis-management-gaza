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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string("title")->unique();
            $table->foreignId("location_id")->constrained()->cascadeOnDelete();
            $table->time(column: "start_time");
            $table->time(column: "end_time");
            $table->date(column: "start_date");
            $table->integer(column: "period");
            $table->integer(column: "access")->default(0);
          
            $table->enum(column: "status",allowed: ["contribution","institution"]);
            $table->string("description")->default(" ");
            $table->enum("type",["food","education","health"]);
            $table->foreignId("user_id")->nullable()->constrained()->cascadeOnDelete();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};