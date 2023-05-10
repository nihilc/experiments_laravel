<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("workers", function (Blueprint $table) {
            $table->id();

            $table->string("icard", 20); // Identification Card
            $table->string("fname", 100); // First name
            $table->string("mname", 100)->nullable(); // Middle name
            $table->string("lname", 100); // Last name
            $table->string("mlname", 100)->nullable(); // Second last name
            $table->string("photo", 255)->nullable();
            $table->string("phone", 20)->nullable();
            $table->string("email", 100)->nullable();
            $table->string("title")->nullable(); // Job title

            $table
                ->foreignId("company_id")
                ->nullable()
                ->constrained("companies")
                ->onUpdate("cascade")
                ->onDelete("set null");

            $table
                ->foreignId("city_id")
                ->nullable()
                ->constrained("cities")
                ->onUpdate("cascade")
                ->onDelete("set null");

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("workers");
    }
};
