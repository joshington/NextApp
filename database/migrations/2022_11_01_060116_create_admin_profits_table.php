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
        Schema::create('admin_profits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profit_amount')->default(0);
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade'); //we dont wanna delete collections cz we need data
            $table->string('transaction_id');
            $table->string('total_daily_collected')->default(0);
            $table->unsignedBigInteger('total_collected_profits')->default(0);
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
        Schema::dropIfExists('admin_profits');
    }
};
