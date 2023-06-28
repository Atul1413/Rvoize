<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBcAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bc_advertisements', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('url');
            $table->unsignedBigInteger('banner');
            $table->unsignedBigInteger('company_id');
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->unsignedTinyInteger('position')->nullable();
            $table->unsignedTinyInteger('priority')->nullable();
            $table->string('status', 30)->nullable();
            $table->boolean('is_approved')->nullable();
            $table->integer('create_user')->nullable();
            $table->integer('update_user')->nullable();
            $table->timestamps();
        });

        Schema::create('bc_advertisement_country', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('origin_id');
            $table->string('country', 5);
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
        Schema::dropIfExists('bc_advertisements');
        
        
        Schema::dropIfExists('bc_advertisement_country');
      
    }
}
