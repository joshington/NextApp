<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nxt_withdraws', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('withdrawed_amount')->default(0);
            $table->unsignedInteger('user_id');
            //above for the user that is collecting the amount
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade'); //we dont wanna delete collections cz we need data
            //also store the customer phone number
            $table->string('transaction_id');
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
        Schema::dropIfExists('nxt_withdraws');
    }
};
