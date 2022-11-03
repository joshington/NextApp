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
        Schema::create('payment_links', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->string('link_address');
            $table->boolean('test_mode');
            $table->unsignedBigInteger('charge_amount')->default(0);
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade'); //we
            $table->string('link_name');
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
        Schema::dropIfExists('payment_links');
    }
};
