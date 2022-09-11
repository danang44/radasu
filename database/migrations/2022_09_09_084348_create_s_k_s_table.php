<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSKSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_k_s', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('sk1');
            $table->string('sk2');
            $table->string('sk3')->nullable();
            $table->string('sk4')->nullable();
            $table->string('sk5')->nullable();
            $table->string('sk6')->nullable();
            $table->string('sk7')->nullable();
            $table->string('sk8')->nullable();
            $table->string('sk9')->nullable();
            $table->string('sk10')->nullable();
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
        Schema::dropIfExists('s_k_s');
    }
}
