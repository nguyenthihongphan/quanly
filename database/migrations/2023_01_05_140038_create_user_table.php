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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname', 50)->nullable(true);
            $table->string('lastname', 25)->nullable(true);
            $table->tinyInteger('user_flg')->default(1)->comment('1:admin, 0:user')->value(1,0);
            $table->string('email', 75);
            $table->string('phone', 12)->nullable(true);
            $table->string('address', 50)->nullable(true);
            $table->date('birth')->nullable(true);
            $table->string('avatar', 200)->nullable(true);
            $table->string('information', 2000)->nullable(true);
            $table->string('password');
            $table->bigInteger('deleted_by')->nullable(true);
            $table->timestamp('deleted_at')->nullable(true);
            $table->bigInteger('created_by')->nullable(true); 
            $table->timestamp('updated_at')->nullable(true);   
            $table->timestamp('created_at')->nullable(true);             
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
