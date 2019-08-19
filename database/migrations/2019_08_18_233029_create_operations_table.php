<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');
            $table->string('currency_pair');
            $table->double('price', 15, 8);	
            $table->double('stop_loss', 15, 8);	
            $table->double('take_profit_1', 15, 8);	
            $table->double('take_profit_2', 15, 8)->nullable();
            $table->double('take_profit_3', 15, 8)->nullable();
            $table->string('status')->default('open');
            $table->unsignedBigInteger('signal_id')->nullable();
            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('operations');
    }
}
