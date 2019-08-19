<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModifiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modifiers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');

            $table->unsignedBigInteger('operation_reference')->nullable();

            // BreakEven
            // operation_reference

            // CloseAll
            // NOT operation_reference
            $table->string('currency_pair')->nullable();

            // Cancel 
            //  operation_reference

            // MoveStopLoss
            // operation_reference
            $table->double('price', 15, 8)->nullable();	

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
        Schema::dropIfExists('modifiers');
    }
}
