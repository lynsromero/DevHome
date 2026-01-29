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
        Schema::table('users', function (Blueprint $table) {
            $table->string('image')->nullable()->after('email');
            $table->string('designation')->nullable()->after('image');
            $table->string('facebook_url')->nullable()->after('designation');
            $table->string('linkedin_url')->nullable()->after('facebook_url');
            $table->string('github_url')->nullable()->after('linkedin_url');
            $table->string('experience')->nullable()->after('github_url');
            $table->string('languages')->nullable()->after('experience');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
