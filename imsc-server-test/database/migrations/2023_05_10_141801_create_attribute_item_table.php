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
        Schema::create("attribute_item", function (Blueprint $table) {
            $table->id();
            $table->text("value");
            $table
                ->foreignId("attribute_id")
                ->nullable()
                ->constrained("attributes")
                ->onUpdate("cascade")
                ->onDelete("cascade");
            $table
                ->foreignId("item_id")
                ->constrained("items")
                ->onUpdate("cascade")
                ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("attribute_item");
    }
};
