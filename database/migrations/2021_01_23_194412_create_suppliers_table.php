<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('f_name');
            $table->string('l_last');
            $table->string('national_id');
            $table->string('email')->unique();
            $table->string('post_code');
            $table->string('bio');
            $table->string('img_url');
            $table->string('category');
            $table->string('country');
            $table->char('password');
            $table->string('address');
            $table->char('phone');
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
        Schema::dropIfExists('suppliers');
    }
}
