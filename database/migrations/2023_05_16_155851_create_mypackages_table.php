<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMypackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mypackages', function (Blueprint $table) {
            $table->id();
            $table->string('package_name');
            $table->string('package_price');
            //$table->bigInteger('package_price');
            $table->string('package_description',200);
            $table->foreignId('user_id')->constrained();
           
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
        Schema::dropIfExists('mypackages');
    }
}
