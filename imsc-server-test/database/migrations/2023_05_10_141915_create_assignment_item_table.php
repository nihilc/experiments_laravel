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
        Schema::create("assignment_item", function (Blueprint $table) {
            $table->id();
            $table->text("assign_note");
            $table->text("return_note");
            $table->date("return_date");
            $table
                ->foreignId("assignment_id")
                ->constrained("assignments")
                ->onUpdate("cascade")
                ->onDelete("restrict");
            $table
                ->foreignId("item_id")
                ->constrained("items")
                ->onUpdate("cascade")
                ->onDelete("restrict");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("assignment_item");
    }
};
