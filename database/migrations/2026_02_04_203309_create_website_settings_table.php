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
        Schema::create('website_settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('logo_dark')->nullable();
            $table->string('tagline')->nullable();
            $table->text('tagline_h')->nullable();
            $table->longText('tagline_p')->nullable();
            $table->text('about_us_img1')->nullable();
            $table->text('about_us_img2')->nullable();
            $table->text('what_we_build')->nullable();
            $table->text('why_dev_home')->nullable();
            $table->text('how_we_work')->nullable();
            $table->text('footer_des')->nullable();
            $table->longText('hero_svg1')->nullable();
            $table->longText('hero_svg2')->nullable();
            $table->longText('hero_svg3')->nullable();
            $table->longText('hero_svg4')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('website_settings');
    }
};
