<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->string('tenant_name');
            $table->string('tenant_nid',20);
            $table->string('father_name')->nullable();
            $table->string('father_nid',20)->nullable();
            $table->string('permanent_add',255)->nullable();
            $table->string('police_station',255)->nullable();
            $table->string('police_chowki',255)->nullable();
            $table->string('contact_no',11);
            $table->string('father_contact_no',11)->nullable();
            $table->string('emergency_contact_no',11);
            $table->string('institue',255)->nullable();
            $table->string('institue_role',255)->nullable();
            $table->string('duration',255)->nullable();
            $table->string('redg_no',255)->nullable();
            $table->string('living_before',255)->nullable();
            $table->string('reletive_name',255)->nullable();
            $table->string('relative_phone',255)->nullable();
            $table->string('image')->nullable();
            $table->foreignId('category_id')->constrained();
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
        Schema::dropIfExists('tenants');
    }
}
