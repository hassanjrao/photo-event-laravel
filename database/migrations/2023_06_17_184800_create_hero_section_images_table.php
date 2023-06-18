<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hero_section_images', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("hero_section_id");
            $table->foreign("hero_section_id")->references("id")->on("hero_sections")->onDelete("cascade");

            $table->string("image");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hero_section_images');
    }
};
