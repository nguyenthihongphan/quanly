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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('note',200)->nullable(true);
            $table->bigInteger('created_by')->nullable(true);
            $table->timestamp('created_at')->nullable(true);
            $table->bigInteger('updated_by')->nullable(true);
            $table->timestamp('updated_at')->nullable(true);
            $table->bigInteger('deleted_by')->nullable(true);
            $table->timestamp('deleted_at')->nullable(true);
            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
