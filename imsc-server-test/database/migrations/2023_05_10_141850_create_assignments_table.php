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
        Schema::create("assignments", function (Blueprint $table) {
            $table->id();
            $table->enum("type", [
                "Initial Assignment",
                "Reassignment",
                "Admission to Inventory",
                "Re-admission to Inventory",
                "Maintenance",
                "Removal",
            ]);
            $table->date("date");
            $table->text("note");

            $table
                ->foreignId("worker_id")
                ->nullable()
                ->constrained("workers")
                ->onDelete("set null")
                ->onUpdate("cascade");
            $table
                ->foreignId("user_id")
                ->nullable()
                ->constrained("users")
                ->onDelete("set null")
                ->onUpdate("cascade");
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("assignments");
    }
};
