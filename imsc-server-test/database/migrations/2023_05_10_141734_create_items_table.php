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
        Schema::create("items", function (Blueprint $table) {
            $table->id();
            $table->integer("cod")->unique();
            $table->enum("state", ["Active", "Inactive", "Deprecated"]);
            $table->string("image")->nullable();

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
            $table
                ->foreignId("category_id")
                ->nullable()
                ->constrained("categories")
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
        Schema::dropIfExists("items");
    }
};
