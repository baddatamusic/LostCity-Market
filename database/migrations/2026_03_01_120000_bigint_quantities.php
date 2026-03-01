<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('listing_offer_items', function (Blueprint $table) {
            $table->bigInteger('quantity')->change();
        });

        Schema::table('listings', function (Blueprint $table) {
            $table->bigInteger('quantity')->nullable()->change();
            $table->bigInteger('price')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('listing_offer_items', function (Blueprint $table) {
            $table->integer('quantity')->change();
        });

        Schema::table('listings', function (Blueprint $table) {
            $table->integer('quantity')->nullable()->change();
            $table->integer('price')->nullable()->change();
        });
    }
};
