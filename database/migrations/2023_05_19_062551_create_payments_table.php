<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('payment_ammount');
            $table->string('payment_mode',200);
            $table->string('for_month');
            $table->boolean('is_pending_payment')->default(false);
            $table->string('payment_description',200);
            $table->foreignId('user_id')->constrained();
            $table->foreignId('tenant_id')->constrained();
            $table->timestamp('payment_date');
            
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
        Schema::dropIfExists('payments');
    }
}
