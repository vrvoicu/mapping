<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMappingFieldsValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('fields_values'))
        Schema::create('fields_values', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('mapping_id')->nullable();
            $table->integer('field_id')->nullable();
            $table->string('field_value',255)->nullable();
            $table->integer('group_id');

            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fields_values');
    }
}
