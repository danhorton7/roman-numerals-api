<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up() : void
    {
        Schema::create('roman_numerals', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('char_in');
            $table->string('char_out');
            $table->unsignedInteger('total_conversions');
            $table->timestamp('last_conversion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('roman_numerals');
    }
};
