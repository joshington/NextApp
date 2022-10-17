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
        Schema::create('nxt_business_kycs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('business_name');
            $table->string('business_address');
            $table->unsignedInteger('user_id')->nullable();
            //===now indicating the foreign key relationship here=====
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('business_phone');
            $table->string('nid_path')->nullable();
            $table->string('cic_path')->nullable();
            // $table->string('logo_path')->nullable();
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
        Schema::dropIfExists('nxt_business_kycs');
        // $table->dropForeign('lists_user_id_foreign');
        // $table->dropIndex('lists_user_id_index');
        // $table->dropColumn('user_id');
    }
};
