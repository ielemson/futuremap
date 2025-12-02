<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id')->constrained()->onDelete('cascade');
        $table->string('referral_code')->unique()->nullable();
         $table->boolean('accepted_terms')->default(false);
        $table->timestamps();
        });
    }

// php artisan migrate --path=database/migrations/2025_06_12_094452_create_vendors_table.php
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendors');
    }
}
