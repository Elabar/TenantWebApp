<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name',20);
            $table->string('description',100);
            $table->string('lotNumber',20)->unique();
            $table->integer('zoneID')->unsigned();
            $table->integer('floorID')->unsigned();
            $table->integer('categoryID')->unsigned();
            $table->timestamps();
        });

        Schema::table('tenants',function (Blueprint $table){
            $table->foreign('zoneID')->references('id')->on('zones');
            $table->foreign('floorID')->references('id')->on('floors');
            $table->foreign('categoryID')->references('id')->on('categories');
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
